
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
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
                <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] == 'emptyfields'){
                            echo '<p class="help-block" > Nu ati completat tot formularul!</p> ';
                        }
                        else if ($_GET['error'] == 'invalidfname'){
                            echo '<p class="help-block" > Nu ati completat corect prenumele dumneavoastra!</p> ';
                        }
                        else if ($_GET['error'] == 'invalidlname'){
                            echo '<p class="help-block" > Nu ati completat corect numele dumneavoastra!</p> ';
                        }
                        else if ($_GET['error'] == 'invalidphone'){
                            echo '<p class="help-block" > Nu ati completat corect numarul de telefon al dumneavoastra!</p> ';
                        }
                        else if ($_GET['error'] == 'invalidmail'){
                            echo '<p class="help-block" > Nu ati completat corect e-mailul dumneavoastra!</p> ';
                        }
                        else if ($_GET['error'] == 'invalidusername'){
                            echo '<p class="help-block" > Nu ati completat corect numele dumneavoastra de utilizator!</p> ';
                        }
                        else if ($_GET['error'] == 'invalidpwd'){
                            echo '<p class="help-block" > Parola invalida! Respectati cerintele parolei!</p> ';
                        }
                        else if ($_GET['error'] == 'pwdTooSmall'){
                            echo '<p class="help-block" > Parola trebuie sa contina macar 8 caractere</p> ';
                        }
                        else if ($_GET['error'] == 'passwordCheck'){
                            echo '<p class="help-block" > Parolele nu corespund!</p> ';
                        }
                        else if ($_GET['error'] == 'usertaken'){
                            echo '<p class="help-block" > Numele de utilizator dorit este luat de altcineva!</p> ';
                        }
                    }
//                    else if(isset($_GET['signup'])){
//                        if($_GET['signup'] == 'success') {
//                            //echo '<p class="help-block" > Inregistrare reusita! </p>';
//                           // header("Location: /index.php");
//                           // header("Location: C:\Users\Eli\PhpstormProjects\TestPrj\SYSTEM\index.php");
//                        }
//                    }
                ?>
                <form class="form-login" method="POST" action="includes/signup.inc.php">
                        <span class="form-logo"><img src="../CSS/logo2-white.PNG" alt="logo-dark" class="img-logo"/></span>
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
                                <input class="form-input" type="text" name="phone" placeholder="Numarul de telefon : 07xx xxx xxx">
                                <span class="form-span" data-placeholder="📞‍"></span>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="group">
                                <input class="form-input" type="text" name="mail" placeholder="Email">
                                <span class="form-span" data-placeholder="📩"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="group">
                                <input class="form-input" type="text" name="username" placeholder="Username">
                                <span class="form-span" data-placeholder="🤩‍"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="group">
                                <input class="form-input" type="password" name="password" placeholder="Parola">
                                <span class="form-span" data-placeholder="🧷"></span>
                            </div>
                            <div class="group">
                                <input class="form-input" type="password" name="password-repeat" placeholder="Confirmare parola">
                                <span class="form-span" data-placeholder="🧷"></span>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="group">
                                <div class="form-signup-respectare" data-validate="Respectati">
                                    <span>Respectati la scrierea parolei!</span>
                                    <ul class="requests">
                                        <li class="requests">Minimumul lungimii parolei de 8 caractere</li>
                                        <li class="requests">Macar o litere mare</li>
                                        <li class="requests">Macar o litere mica</li>
                                        <li class="requests">Macar o cifra</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- de pus "show password"-->
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="group">
                                <label class="form-selected-input">Categorie</label>
                                <div class="selection-category-person">
                                    <select name="category" tabindex="-1" class="selection-category-hidden-accessible" aria-hidden="true">
                                        <option disabled="disabled" selected="selected">Alegeti o optiune</option>
                                        <option value="Cetatean">Cetatean</option>
                                        <option value="Personal autorizat">Personal autorizat</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="group">
                                <label class="form-selected-input">Locatie</label>
                                <div class="selection-location-person">
                                    <select name="location" tabindex="-1" class="selection-location-hidden-accessible" aria-hidden="true">
                                        <option disabled="disabled" selected="selected">Alegeti o optiune</option>
                                        <option value="Alba">Alba</option> <option value="Arad">Arad</option> <option value="Arges">Arges</option> <option value="Bacau">Bacau</option> <option value="Bihor">Bihor</option> <option value="Bistrita-Nasaud">Bistrita-Nasaud</option> <option value="Botosani">Botosani</option> <option value="Braila">Braila</option> <option value="Brasov">Brasov</option> <option value="Bucuresti">BUCURESTI</option> <option value="Buzau">Buzau</option> <option value="Calarasi">Calarasi</option> <option value="Caras-Severin">Caras-Severin</option> <option value="Cluj">Cluj</option> <option value="Constanta">Constanta</option> <option value="Covasna">Covasna</option> <option value="Dambovita">Dambovita</option> <option value="Dolj">Dolj</option> <option value="Galati">Galati</option> <option value="Giurgiu">Giurgiu</option> <option value="Gorj">Gorj</option> <option value="Harghita">Harghita</option> <option value="Hunedoara">Hunedoara</option> <option value="Ialomita">Ialomita</option> <option value="Iasi">Iasi</option> <option value="Ilfov">Ilfov</option> <option value="Maramures">Maramures</option> <option value="Mehedinti">Mehedinti</option> <option value="Mures">Mures</option> <option value="Neamt">Neamt</option> <option value="Olt">Olt</option> <option value="Prahova">Prahova</option> <option value="Salaj">Salaj</option> <option value="Satu Mare">Satu Mare</option> <option value="Sibiu">Sibiu</option> <option value="Suceava">Suceava</option> <option value="Teleorman">Teleorman</option> <option value="Timis">Timis</option> <option value="Tulcea">Tulcea</option> <option value="Valcea">Valcea</option> <option value="Vaslui">Vaslui</option> <option value="Vrancea">Vrancea</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row row-space">
                <div class="col-2">
                    <div class="group">
                        <div class="form-signup-button">
                            <button class="form-signup-button-submit" type="submit" name="signup-submit">
                                Inregistrare
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="group">
                        <div class="form-signup-button">
                            <button class="form-signup-button-submit" ><a href="login.php" class="form-signup-button-submit ">Aveti deja cont?</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accept-all" data-validate="accept-all">
                <label class="accept-all-attention">Prin apasarea butonul "Inregistrati-va", sunteti
                    de acord cu crearea unui cont GaSM si sunteti de acord cu <a class="termeni-conditii" href="#">Termeni si conditii</a> si
                    <a class="politica-de-confidentialitate" href="#">Politica de confidentialitate</a></label>
                <p class="accept-all-copy-rights">&copy; 2020 GaSM.com</p>

                <a href="index.php" class="form-back"> << Inapoi Acasa</a>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</body>

</html>