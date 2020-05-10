<?php

if (isset($_POST["reset-request-submit"])){

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://localhost/TestPrj/SYSTEM/create-new-password.php?selector=".$selector."&validator=". bin2hex($token);//URL bun?? ex : www.dns.com/create-new-password

    $expires = date("U") + 1800;

    require 'dbh.inc.php';

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM gasm.pwdReset WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error";
        exit();
    } else {//success
        mysqli_stmt_bind_param($stmt, "s",$userEmail);
        mysqli_stmt_execute($stmt);
    }
    $sql = "INSERT INTO gasm.pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There was an error";
        exit();
    } else {//success
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss",$userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;
    $subject = 'Reset your password for GaSM';
    $message = '<p>Am primit o cerere de resetare a parolei dumneavoastra</p><p>Link-ul pentru resetarea parolei este: </br><a href="'.$url.'">'.$url.'</ahref></p>';

    $headers = "From: mmtuts <usermmutus@gmail.com>\r\n";
    $headers .= "Reply-To: usermmutus@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: ../reset-password.php?reset=success");
} else{
    header("Location: ../index.php");
}
