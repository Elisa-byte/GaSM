<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <script src="/GaSM/JavaScript/viewPassword.js"></script>
    <title>Logheaza-te</title>
</head>

<body>
<?php
//        if(isset($_SESSION['userId'])){
//            echo '<p> V-ati logat!</p>';
//        }
//        else{
//            echo '<p> V-ati delogat!</p>';
//        }
       ?>
<div class="main-content">
    <div class="container-login">
        <div class="wrap-login">
            <h2 class="form-title"> Resetare parola </h2>
            <p>Vezi primi un e-mail cu instructiuni pentru a va putea reseta parola</p>
            <form class="form-login" action="includes/reset-request.inc.php" method="post">
                <input class="form-input" type="text" name="email" placeholder="Introdu adresa de email..">
                <button class="button-reset-pwd" type="submit" name="reset-request-submit">
                    Trimite noua parola prin email
                </button>
            </form>
            <?php
            if(isset($_GET["reset"])){
                if($_GET["reset"]=="success"){
                    echo '<p class="loginsuccess">Verifica-ti emailul!</php>';
                }
            }
            ?>
        </div>
    </div>
</div>
</body>

</html>
