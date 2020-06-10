<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <script src="../JS/view_pwd.js"></script>
    <title>Logare admin</title>
</head>

<body>
<div class="main-content">
    <div class="container-login">
        <div class="wrap-login">
            <h2 class="form-title">Logare admin</h2>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'emptyfields') {
                    echo '<p class="help-block" > Nu ati completat tot formularul!</p> ';
                } else if ($_GET['error'] == 'wrongpwd') {
                    echo '<p class="help-block" > Parola gresita!</p> ';
                } else if ($_GET['error'] == 'nouser') {
                    echo '<p class="help-block" > Acest user nu este inregistrat!</p> ';
                }
            } else if (isset($_GET['login'])) {
                if ($_GET['login'] == 'login-success') {
                    echo '<p class="help-block" > Logare reusita! </p>';
                }
            }
            ?>
            <form class="form-login" method="POST" action="includes/loginadmin.inc.php">
                <span class="form-logo">
                    <img src="../CSS/logo2-dark.PNG" alt="logo-dark" class="img-logo"/>
                </span>
                <div class="group" data-validate="Introduceti numele de utilizator/email">
                    <input class="form-input" type="text" name="uidmail" placeholder="Nume utilizator/Email">
                    <span class="form-span" data-placeholder="👨🏻‍🔧‍"> </span>
                </div>
                <div class="group" data-validate="Introduceti parola">
                    <input id="typepass" class="form-input" type="password" name="password_login" placeholder="Parola">
                    <span class="form-span" data-placeholder="🧷"> </span>
                </div>
                <div class="form-login-show-pwd">
                    <label class="label-checkbox-show-pwd"> Arata parola
                        <input class="input-checkbox-show-pwd" name="remember" type="checkbox" onclick="view_pwd()"/>
                        <span class="checkmark-show-pwd"></span>
                    </label>
                </div>
                <div class="row row-space">
                    <div class="col-2">
                        <div class="group">
                            <div class="form-login-admin-button">
                                <button class="form-login-admin-button-submit" type="submit" name="log-in-admin-submit">
                                    Logare administrator
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-login-forgot-password">
                    <?php
                    if (isset($_GET["newpwd"])) {
                        if ($_GET["newpwd"] == "passwordupdated") {
                            echo '<p class="help-block">Parola dumneavoastra a fost resetata!</p>';
                        }
                    }
                    ?>
                    <a class="forgot-password" href="reset-password.php">
                        V-ati uitat parola?
                    </a>
                    <a href="index.php" class="form-back"> << Inapoi Acasa</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
