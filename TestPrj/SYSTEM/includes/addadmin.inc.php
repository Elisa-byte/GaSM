<?php

if(isset($_POST['add-admin-submit'])){

    require "dbh.inc.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mail  = $_POST['mail'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password-repeat'];

    //echo $_POST["fname"] . $_POST["lname"] . $_POST["mail"] . $_POST["username"] . $_POST["password"];

    if(empty($fname) || empty($lname) || empty($phone) || empty($mail) || empty($username) || empty($password) || empty($passwordRepeat)){
        header("Location: ../controlpanel.php?error=emptyfieldsadmin&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&username=".$username);
        exit();
    }//"/^[A-Za-z]+$/u ")
    else if(!preg_match("/^[A-Za-z]+$/", $fname)){
        header("Location: ../controlpanel.php?error=invalidfnameadmin&lname=".$lname."&phone=".$phone."&mail=".$mail."&username=".$username);
        exit();
    }
    else if(!preg_match("/^[A-Za-z]+$/", $lname)){
        header("Location: ../controlpanel.php?error=invalidlnameadmin&fname=".$fname."&phone=".$phone."&mail=".$mail."&username=".$username);
        exit();
    }
    else if(!preg_match("/^(\+4|)?(07[0-8]{1}[0-9]{1}|02[0-9]{2}|03[0-9]{2}){1}?(\s|\.|\-)?([0-9]{3}(\s|\.|\-|)){2}$/", $phone)){
        header("Location: ../controlpanel.php?error=invalidphoneadmin&fname=".$fname."&lname=".$lname."&mail=".$mail."&username=".$username);
        exit();
    }
    else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        header("Location: ../controlpanel.php?error=invalidmailadmin&fname=".$fname."&lname=".$lname."&phone=".$phone."&username=".$username);
        exit();
    }
    else if(!filter_var($password, FILTER_VALIDATE_REGEXP,
        array( "options"=> array( "regexp" => "/.{8,25}/")))){
        header("Location: ../controlpanel.php?error=invalidpwdadmin&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&username=".$username);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../controlpanel.php?error=invalidusernameadmin&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail);
        exit();
    }
    else if(strlen(trim($_POST["password"])) < 8){
        header("Location: ../controlpanel.php?error=pwdTooSmalladmin&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail);
        exit();
    }

    else if($password !== $passwordRepeat){
        header("Location: ../controlpanel.php?error=passwordCheckadmin&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&username=".$username);
        exit();
    }
    else{
        $sql = "SELECT uidAdmin FROM gasm.admin WHERE uidAdmin=?;";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../controlpanel.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0){
                header("Location: ../controlpanel.php?error=usertaken&mail=".$mail);//nu am mai pus toate datele
                exit();
            }
            else{
                $sql = "INSERT INTO gasm.admin (uidAdmin, fnAdmin, lnAdmin, emailAdmin, pwdAdmin, phnAdmin) VALUES (?,?,?,?,?,?);";
                $stmt = mysqli_prepare($conn, $sql);
                if($stmt == false) {
                    // just for debugging for now:
                    die("<pre>Prepare failed:\n".mysqli_error($conn)."\n$sql </pre>");
                }
                else{
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssssiss", $username, $fname, $lname, $mail, $hashedPwd, $phone, $category, $location);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);

                    header("Location: ../controlpanel.php?addadmin=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{
    header("Location: ../controlpanel.php");
    exit();
}