<?php

    if(isset($_POST["reset-password-submit"])){

        $selector = $_POST["selector"];
        $validator= $_POST["validator"];
        $password = $_POST["pwd"];
        $passwordRepeat = $_POST["pwd-repeat"];

        if(empty($password) || empty($passwordRepeat)){
            header("Location: ../create-new-password.php?newpwd=empty");
            exit();
        }else if($password != $passwordRepeat){
            header("Location: ..create-new-password.php?newpwd=pwdnotsame");
            exit();
        }

        $currentDate = date("U");
        require 'dbh.inc.php';

        $sql="SELECT * FROM gasm.pwdReset WHERE pwdResetSelctor=? AND pwdResetExpires >=? ;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "There was an error";
            exit();
        } else {//success
            mysqli_stmt_bind_param($stmt, "sd", $selector, $currentDate);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result();
            if(!$row = mysqli_fetch_assoc()){
                echo "Trebuie sa retrimiteti cererea de resetarea a parolei!";
                exit();
            } else{
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]); //true or false statement

                if($tokenCheck == false){
                    echo "Trebuie sa retrimiteti cererea de resetarea a parolei!";
                    exit();
                } elseif($tokenCheck == true){
                    $tokenEmail = $row['pwdResetEmail'];

                    $sql = "SELECT * FROM gasm.usersv2 WHERE emailUsers=?;";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        echo "There was an error";
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result();
                        if(!$row = mysqli_fetch_assoc()){
                            echo "A aparut o eroare in reset-password.inc.php";
                            exit();
                        } else{
                            $sql="UPDATE gasm.usersv2 SET pwdUsers=? WHERE emailUsers=?;";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                echo "There was an error";
                                exit();
                            } else {
                                $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt, "ss", $tokenEmail, $newPwdHash);
                                mysqli_stmt_execute($stmt);

                                $sql = "DELETE FROM gasm.pwdReset WHERE pwdResetEmail=?;";
                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt, $sql)){
                                    echo "A aparut o eroare!";
                                    exit();
                                }else{
                                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                    mysqli_stmt_execute($stmt);
                                    header("Location: ../login.php?newpwd=passwordupdated");
                                }
                            }
                        }
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }else{
        header("Location: ../index.php");
    }