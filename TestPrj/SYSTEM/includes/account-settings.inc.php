<?php
session_start();
if (isset($_POST['as-submit'])) {
    require "dbh.inc.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $username = $_POST['username'];
//    $category = $_POST['category'];
//    $location = $_POST['location'];

    $idUsers = $_SESSION['userId'];
    if (empty($fname) != 1) {
        if (!preg_match("/^[A-Za-z]+$/", $fname)) {
            header("Location: ../account-settings.php?error=invalidfname&lname=" . $lname . "&phone=" . $phone . "&mail=" . $mail . "&username=" . $username . "&category=" . $category . "&location=" . $location);
            exit();
        } else {
            $sql = "UPDATE gasm.usersv2 SET fnUsers=? WHERE idUsers=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../account-settings.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "si", $fname, $idUsers);
                mysqli_stmt_execute($stmt);
            }
        }
    }
    if (empty($lname) != 1) {
        if (!preg_match("/^[A-Za-z]+$/", $lname)) {
            header("Location: ../account-settings.php?error=invalidlname&fname=" . $fname . "&phone=" . $phone . "&mail=" . $mail . "&username=" . $username . "&category=" . $category . "&location=" . $location);
            exit();
        } else {
            $sql = "UPDATE gasm.usersv2 SET lnUsers=? WHERE idUsers=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../account-settings.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "si", $lname, $idUsers);
                mysqli_stmt_execute($stmt);
            }
        }
    }
    if (empty($phone) != 1) {
        if (!preg_match("/^(\+4|)?(07[0-8]{1}[0-9]{1}|02[0-9]{2}|03[0-9]{2}){1}?(\s|\.|\-)?([0-9]{3}(\s|\.|\-|)){2}$/", $phone)) {
            header("Location: ../account-settings.php?error=invalidphone&fname=" . $fname . "&lname=" . $lname . "&mail=" . $mail . "&username=" . $username . "&category=" . $category . "&location=" . $location);
            exit();
        } else {
            $sql = "UPDATE gasm.usersv2 SET phnUsers=? WHERE idUsers=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../account-settings.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "si", $phone, $idUsers);
                mysqli_stmt_execute($stmt);
            }
        }
    }
    if (empty($mail) != 1) {
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../account-settings.php?error=invalidmail&fname=" . $fname . "&lname=" . $lname . "&phone=" . $phone . "&username=" . $username . "&category=" . $category . "&location=" . $location);
            exit();
        } else {
            $sql = "UPDATE gasm.usersv2 SET emailUsers=? WHERE idUsers=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../account-settings.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "si", $mail, $idUsers);
                mysqli_stmt_execute($stmt);
            }
        }
    }
    if (empty($username) != 1) {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ../account-settings.php?error=invalidusername&fname=" . $fname . "&lname=" . $lname . "&phone=" . $phone . "&mail=" . $mail . "&category=" . $category . "&location=" . $location);
            exit();
        } else {
            $sql = "UPDATE gasm.usersv2 SET uidlUsers=? WHERE idUsers=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../account-settings.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "si", $username, $idUsers);
                mysqli_stmt_execute($stmt);
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../account-settings.php");
    exit();
}