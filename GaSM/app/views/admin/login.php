<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $base_location ?>" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/stylesheets/login.css">
    <script src="public/JavaScript/view_pwd.js"></script>
    <title>Logare admin</title>
</head>

<body>

        <div class="container-login dark-mode">
            <div class="wrap-login dark-mode-wrap">
                <h2 class="form-title dark-mode-text">Logare admin</h2>
                <?php
                if (isset($data['error'])) {
                    if ($data['error'] == 'emptyfields') {
                        echo '<p class="help-block" > Nu ati completat tot formularul!</p> ';
                    } else if ($data['error'] == 'wrongpwd') {
                        echo '<p class="help-block" > Parola gresita!</p> ';
                    } else if ($data['error'] == 'nouser') {
                        echo '<p class="help-block" > Acest user nu este inregistrat!</p> ';
                    }
                } else if (isset($data['login'])) {
                    if ($data['login'] == 'login-success') {
                        echo '<p class="help-block" > Logare reusita! </p>';
                    }
                }
                ?>
                <form class="form-login" method="POST" action="admin/checkUser">
                    <span class="form-logo">
                        <img src="public/img/logo2-white.PNG" alt="logo-dark" class="img-logo" />
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
                        <label class="label-checkbox-show-pwd dark-mode-text"> Arata parola
                            <input class="input-checkbox-show-pwd" name="remember" type="checkbox" onclick="view_pwd()" />
                            <span class="checkmark-show-pwd"></span>
                        </label>
                    </div>
                    <div class="form-login-forgot-password">

                                    <button class="form-login-admin-button-submit" type="submit" name="log-in-admin-submit">
                                        Logare administrator
                                    </button>

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
 </div> </form> </div> </div>  </body> </html>