<?php

if(isset($_POST['signup-submit'])){

    require "dbh.inc.php";
    //declararea tuturor variabilelor din signup

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $mail  = $_POST['mail'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password-repeat'];
    $category = $_POST['category'];
    $location = $_POST['location'];

    //echo $_POST["fname"] . $_POST["lname"] . $_POST["phone"] . $_POST["mail"] . $_POST["username"] . $_POST["password"] . $_POST["category"] . $_POST["location"];

    if(empty($fname) || empty($lname) || empty($phone) || empty($mail) || empty($username) || empty($password) || empty($passwordRepeat) || empty($category) || empty($location)){
        header("Location: ../signup.php?error=emptyfields&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
        exit();
    }//"/^[A-Za-z]+$/u ")
    else if(!preg_match("/^[A-Za-z]+$/", $fname)){
        header("Location: ../signup.php?error=invalidfname&lname=".$lname."&phone=".$phone."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
        exit();
    }
    else if(!preg_match("/^[A-Za-z]+$/", $lname)){
        header("Location: ../signup.php?error=invalidlname&fname=".$fname."&phone=".$phone."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
        exit();
    }
    else if(!preg_match("/^(\+4|)?(07[0-8]{1}[0-9]{1}|02[0-9]{2}|03[0-9]{2}){1}?(\s|\.|\-)?([0-9]{3}(\s|\.|\-|)){2}$/", $phone)){
        header("Location: ../signup.php?error=invalidphone&fname=".$fname."&lname=".$lname."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
        exit();
    }
    else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidmail&fname=".$fname."&lname=".$lname."&phone=".$phone."&username=".$username."&category=".$category."&location=".$location);
        exit();
    }
    else if(!filter_var($password, FILTER_VALIDATE_REGEXP,
        array( "options"=> array( "regexp" => "/.{8,25}/")))){
        header("Location: ../signup.php?error=invalidpwd&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../signup.php?error=invalidusername&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&category=".$category."&location=".$location);
        exit();
    }
    else if(strlen(trim($_POST["password"])) < 8){
        header("Location: ../signup.php?error=pwdTooSmall&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&category=".$category."&location=".$location);
        exit();
    }

    else if($password !== $passwordRepeat){
        header("Location: ../signup.php?error=passwordCheck&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
        exit();
    }
    else{
        $sql = "SELECT uidUsers FROM gasm.usersv2 WHERE uidUsers=?;";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0){
                header("Location: ../signup.php?error=usertaken&mail=".$mail);//nu am mai pus toate datele
                exit();
            }
            else{
                $sql = "INSERT INTO gasm.usersv2(uidUsers, fnUsers, lnUsers, emailUsers, pwdUsers, phnUsers, categoryUsers, locationUsers) VALUES (?,?,?,?,?,?,?,?);";
                $stmt = mysqli_prepare($conn, $sql);
                if($stmt == false) {
                    // just for debugging for now:
                    die("<pre>Prepare failed:\n".mysqli_error($conn)."\n$sql </pre>");
                }
//                $stmt = mysqli_stmt_init($conn);
//                if(!mysqli_stmt_prepare($stmt, $sql)){
//                    header("Location: ../signup.php?error=sqlerror");
//                    exit();
 //                }
                else{
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssssiss", $username, $fname, $lname, $mail, $hashedPwd, $phone, $category, $location);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);

                    header("Location: ../login.php");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{
    header("Location: ../signup.php");
    exit();
}