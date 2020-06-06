<?php
if(isset($_POST['log-in-submit'])){
    require 'dbh.inc.php';
    $uidmail = $_POST['uidmail'];
    $password_login= $_POST['password_login'];

    if(empty($uidmail) || empty($password_login)){
        header("location: ../login.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM gasm.usersv2 WHERE uidUsers=? OR emailUsers=?;";
        //$stmt = mysqli_stmt_init($conn);
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt == false) {
            // just for debugging for now:
            die("<pre>Prepare failed:\n".mysqli_error($conn)."\n$sql</pre>");
        }
//        if(!mysqli_stmt_prepare($stmt)){
//            header("location: ../login.php?error=sqlerror");
//            exit();
//        }
        else{
            mysqli_stmt_bind_param($stmt, "ss",$uidmail, $uidmail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){
               // $pwdCheck = password_verify($password_login, $row['pwdUsers']);
                $pwdCheck = $row['pwdUsers'];
                //die("pwdCheck: ".$pwdCheck . "password_login: ".$password_login);
                if($pwdCheck == null){
                    header("location: ../login.php?error=wrongpwd");
                    exit();
                }
                else if($pwdCheck != null){
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];
                   // header("location: ../login.php?login=login-success");
                    header("Location: ../index.php");
                    exit();
                }
                else{
                    header("location: ../login.php?error=wrongpwd");
                    exit();
                }
            }
            else{
                header("location: ../login.php?error=nouser");
                exit();
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}
else{
    header("Location: ../login.php");
    exit();
}
