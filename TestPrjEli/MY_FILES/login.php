<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">
<!--    <script src="/GaSM/JavaScript/viewPassword.js"></script>-->
    <title>Logheaza-te</title>
</head>

<body>
<div class="main-content">
    <div class="container-login">
        <div class="wrap-login">
            <h2 class="form-title"> Inregistreaza-te </h2>
            <form class="form-login" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <span class="form-logo">
                        <i class="form-logo-img"></i>
                    </span>
                <div class="form-input" data-validate="Introduceti numele de utilizator" <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <input class="form-input-" type="text" name="username" placeholder="Nume utilizator" value="<?php echo $username; ?>">
                    <span class="form-span" data-placeholder="🧛‍‍"></span>
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-input" data-validate="Introduceti parola" <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <input class="form-input-" type="password" name="password" placeholder="Parola">
                    <span class="form-span" data-placeholder="🧷"></span>
                    <span class="help-block"><?php echo $password_err; ?></span>
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


