<?php
session_start();
include("includes/dbh.inc.php");
//daca e deja logat va fi trimis pe pagina home
//if (isset($_SESSION["userId"])) {
//    header("location: index.php");
//}
if (isset($_POST["log-in-submit"])) {
    if (!empty($_POST["remember"])) {
        //print_r("setting cookies");
        setcookie("uidmail", $_POST["uidmail"], time() + (10 * 365 * 24 * 60 * 60));
        setcookie("password_login", $_POST["password_login"], time() + (10 * 365 * 24 * 60 * 60));
        $_SESSION["userId"] = $_POST["uidmail"];
    } else {
        //print_r("not !setting cookies");
        if (isset($_COOKIE["uidmail"])) {
            setcookie("uidmail", "");
        }
        if (isset($_COOKIE["password_login"])) {
            setcookie("password_login", "");
        }
    }
    header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <script src="../JS/view_pwd.js"></script>
    <title>Logheaza-te</title>
</head>

<body>
<div class="main-content">
    <div class="container-login">
        <div class="wrap-login">
            <h2 class="form-title"> Logheaza-te </h2>
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
            <form class="form-login" method="POST" action="includes/login.inc.php">
                <span class="form-logo">
                    <img src="../CSS/logo2-dark.PNG" alt="logo-dark" class="img-logo"/>
                </span>
                <div class="group" data-validate="Introduceti numele de utilizator/email">
                    <input class="form-input" type="text" name="uidmail" placeholder="Nume utilizator/Email" value="<?php if (isset($_COOKIE["uidmail"])) {echo "bla".$_COOKIE["uidmail"];} ?>">
                    <span class="form-span" data-placeholder="🧛‍"> </span>
                </div>
                <div class="group" data-validate="Introduceti parola">
                    <input id="typepass" class="form-input" type="password" name="password_login" placeholder="Parola" value="<?php if (isset($_COOKIE["password_login"])) {echo $_COOKIE["password_login"];}?>">
                    <span class="form-span" data-placeholder="🧷"> </span>
                </div>
                <div class="form-login-show-pwd">
                    <label class="label-checkbox-show-pwd"> Arata parola
                        <input class="input-checkbox-show-pwd" name="remember" type="checkbox" onclick="view_pwd()"/>
                        <span class="checkmark-show-pwd"></span>
                    </label>
                </div>
                <div class="form-login-remember-me">
                    <label class="label-checkbox-remember-me">
                        Tine-ma minte
                        <input class="input-checkbox-remember-me" name="remember"
                               type="checkbox" checked="<?php if (isset($_COOKIE["uidmail"])) { ?> checked <?php } ?>"/>
                        <span class="checkmark-remember-me"></span>
                    </label>
                </div>
                <div class="row row-space">
                    <div class="col-2">
                        <div class="group">
                            <div class="form-login-button">
                                <button class="form-login-button-submit" type="submit" name="log-in-submit">
                                    Logare
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="group">
                            <div class="form-login-button">
                                <button class="form-login-button-submit" ><a href="signup.php" class="form-login-button-submit ">Inregistrare</a></button>
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
