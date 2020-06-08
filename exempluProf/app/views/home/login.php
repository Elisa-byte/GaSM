<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href = "<?php echo $base_location ?>" />
    <link rel="stylesheet" href="public/stylesheets/login.css">
    <script src="JavaScript/viewPassword.js"></script>
    <title>Logheaza-te</title>
</head>

<body>
    <div class="main-content">
        <div class="container-login">
            <div class="wrap-login">
                <h2 class="form-title"> Inregistreaza-te </h2>
                <form class="form-login" method="POST">
                    <span class="form-logo">
                        <i class="form-logo-img"></i>
                    </span>
                    <div class="form-input" data-validate="Introduceti numele de utilizator">
                        <input class="form-input" type="text" name="username" placeholder="Nume utilizator">
                        <span class="form-span" data-placeholder="🧛‍♂️‍">

                        </span>
                    </div>
                    <div class="form-input" data-validate="Introduceti parola">
                        <input class="form-input" type="password" name="password" placeholder="Parola">
                        <span class="form-span" data-placeholder="🧷">

                        </span>
                    </div>
                    <div class="form-login-remember-me">
                        <input class="input-checkbox-remember-me" id="login-chk" type="checkbox" name="Tine-ma minte">
                        <label class="label-checkbox-remember-me" for="login-chk">
                            Tine-ma minte
                        </label>
                    </div>
                    <div class="form-login-button">
                        <button class="form-login-button-submit" type="submit">
                            Inregistrati-va
                        </button>
                    </div>
                    <div class="form-login-forgot-password">
                        <a class="forgot-password" href="#">
                            V-ati uitat parola?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>