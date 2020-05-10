<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
    <link rel="stylesheet" type="text/css" href="../SYSTEM/login.css">
<!--    <script src="/GaSM/JavaScript/viewPassword.js"></script>-->
    <title>Inregistreaza_te</title>
</head>

<body>
<div class="main-content">
    <div class="container-signup">
        <div class="card-4">
            <div class="wrap-signup">
                <!-- adaug logo-->
                <h2 class="form-title">Formular de inregistrare</h2>
                <form class="form-login" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <span class="form-logo">
                            <i class="form-logo-img"></i>
                        </span>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="group">
                                <input class="form-input" type="text" name="fname" placeholder="Nume">
                                <span class="form-span" data-placeholder="😃‍"></span>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="group">
                                <input class="form-input" type="text" name="lname" placeholder="Prenume">
                                <span class="form-span" data-placeholder="😃‍"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="group">
                                <input class="form-input" type="text" name="phone" placeholder="Numarul de telefon">
                                <span class="form-span" data-placeholder="📞‍"></span>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="group">
                                <input class="form-input" type="text" name="phone" placeholder="Email">
                                <span class="form-span" data-placeholder="📩"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <input class="form-input" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
                                <span class="form-span" data-placeholder="🤩‍"></span>
                                <span class="help-block-"><?php echo $username_err; ?></span>
                            </div>
                        </div>

                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <input class="form-input" type="password" name="password" placeholder="Parola" value="<?php echo $password; ?>">
                                <span class="form-span" data-placeholder="🧷"></span>
                                <span class="help-block-"><?php echo $password_err; ?></span>
                            </div>
                            <div class="group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                <input class="form-input" type="password" name="password-confirmed" placeholder="Confirmare parola" value="<?php echo $confirm_password; ?>">
                                <span class="form-span" data-placeholder="🧷"></span>
                                <span class="help-block-"><?php echo $confirm_password_err; ?></span>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="group">
                                <div class="form-signup-respectare" data-validate="Respectati">
                                    <span><br></span><span><br></span><span><br></span>
                                    <span>Respectati la scrierea parolei!</span>
                                    <ul class="requests">
                                        <li>Minimumul lungimii parolei de 8 caractere</li>
                                        <li>Macar o litere mare</li>
                                        <li>Macar o litere mica</li>
                                        <li>Macar o cifra</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- de pus "show password"-->
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="group">
                                <label class="label">Categorie</label>
                                <div class="selection-category-person">
                                    <select name="category" tabindex="-1" class="selection-category-hidden-accessible" aria-hidden="true">
                                        <option disabled="disabled" selected="selected">Alegeti o optiune</option>
                                        <option value="1">Cetatean</option>
                                        <option value="2">Personal autorizat</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="group">
                                <label class="label">Locatie</label>
                                <div class="selection-location-person">
                                    <select name="location" tabindex="-1" class="selection-location-hidden-accessible" aria-hidden="true">
                                        <option disabled="disabled" selected="selected">Alegeti o optiune</option>
                                        <option value="42">Alba</option> <option value="1">Arad</option> <option value="2">Arges</option> <option value="3">Bacau</option> <option value="4">Bihor</option> <option value="5">Bistrita-Nasaud</option> <option value="6">Botosani</option> <option value="7">Braila</option> <option value="8">Brasov</option> <option value="9">BUCURESTI</option> <option value="10">Buzau</option> <option value="11">Calarasi</option> <option value="12">Caras-Severin</option> <option value="13">Cluj</option> <option value="14">Constanta</option> <option value="15">Covasna</option> <option value="16">Dambovita</option> <option value="17">Dolj</option> <option value="18">Galati</option> <option value="19">Giurgiu</option> <option value="20">Gorj</option> <option value="21">Harghita</option> <option value="22">Hunedoara</option> <option value="23">Ialomita</option> <option value="24">Iasi</option> <option value="25">Ilfov</option> <option value="26">Maramures</option> <option value="27">Mehedinti</option> <option value="28">Mures</option> <option value="29">Neamt</option> <option value="30">Olt</option> <option value="31">Prahova</option> <option value="32">Salaj</option> <option value="33">Satu Mare</option> <option value="34">Sibiu</option> <option value="35">Suceava</option> <option value="36">Teleorman</option> <option value="37">Timis</option> <option value="38">Tulcea</option> <option value="39">Valcea</option> <option value="40">Vaslui</option> <option value="41">Vrancea</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="btn-already">
                        <div class="form-signup-button">
                            <button class="form-signup-button-submit" type="submit">Inregistrati-va</button>
                        </div>
                        <div class="form-signup-already-a-user">
                            <button class="already-a-user" type="submit"  ><a href="login.php">Aveti deja cont?</a></button>
                        </div>
                    </div>
                    <div class="accept-all" data-validate="accept-all">
                        <label class="accept-all-attention">Prin apasarea butonul "Inregistrati-va", sunteti
                            de acord cu crearea unui cont GaSM si sunteti de acord cu <a class="termeni-conditii" href="#">Termeni si conditii</a> si
                            <a class="politica-de-confidentialitate" href="#">Politica de confidentialitate</a></label>
                        <p class="accept-all-copy-rights">&copy; 2020 GaSM.com</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>
