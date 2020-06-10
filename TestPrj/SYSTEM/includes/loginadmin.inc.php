<?php
if(isset($_POST['log-in-admin-submit'])){
    require 'dbh.inc.php';
    $uidmail = $_POST['uidmail'];
    $password_login= $_POST['password_login'];

    if(empty($uidmail) || empty($password_login)){
        header("location: ../loginadmin.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM gasm.admin WHERE uidAdmin=? OR emailAdmin=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            die("<pre>Prepare failed:\n".mysqli_error($conn)."\n$sql</pre>");
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss",$uidmail, $uidmail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $hashed = password_hash($password_login, PASSWORD_DEFAULT);
                $pwdCheck = password_verify($password_login, $row['pwdAdmin']);
                if($pwdCheck == false){
                    header("location: ../loginadmin.php?error=wrongpwd");
                    echo $row['pwdAdmin'];
                    exit();
                }
                else if($pwdCheck == true){
                    session_start();
                    $_SESSION['userId'] = $row['idAdmin'];
                    $_SESSION['userUid'] = $row['uidAdmin'];
                   header("Location: ../controlpanel.php");
                    exit();
                }
                else{
                    header("location: ../loginadmin.php?error=wrongpwd");
                    exit();
                }
            }
            else{
                header("location: ../loginadmin.php?error=nouser");
                exit();
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}
else{
    header("Location: ../loginadmin.php");
    exit();
}
