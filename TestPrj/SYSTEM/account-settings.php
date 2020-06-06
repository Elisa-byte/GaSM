<?php
    session_start();
    include("includes/dbh.inc.php");
    if(!isset($_SESSION['userId'])){
        header("Location: login.php");//login.php//daca nu e logat nu intra in settings
    }
    else {}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--    <script src="/GaSM/JavaScript/viewPassword.js"></script>-->
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>AccountSettings</title>
</head>

<body>
<div class="main-content">
    <div class="container-account-settings">
        <div class="wrap-account-settings">
            <div class="card-4 ">
                <?php
                    $idUsers = $_SESSION['userId'];
                    $getUserInfo = "SELECT * FROM gasm.usersv2 WHERE idUsers='$idUsers';";
                    if (!$getUserInfo) {
                        printf("Error: %s\n", mysqli_error($conn));
                        exit();
                    }
                    $run_get = mysqli_query($conn, $getUserInfo);
                    $row = mysqli_fetch_array($run_get);

                    $fname = $row['fnUsers'];
                    //print_r($fname);
                    $lname = $row['lnUsers'];
                    //print_r($lname);
                    $phone = $row['phnUsers'];
                    //print_r($phone);
                    $mail = $row['emailUsers'];
                    //print_r($mail);
                    $username = $row['uidUsers'];
                    //print_r($username);

                    $category = $row['categoryUsers'];
                    $location = $row['locationUsers'];

                    mysqli_close($conn);
                ?>
                <?php
                if(isset($_GET['error'])){
                    if ($_GET['error'] == 'invalidfname'){
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
                    else if ($_GET['error'] == 'usertaken'){
                        echo '<p class="help-block" > Numele de utilizator dorit este luat de altcineva!</p> ';
                    }
                }
                ?>
                <form class="form-login" action="includes/account-settings.inc.php" method="POST" enctype="multipart/form-data">
                    <fieldset class="fieldset-AS">
                        <legend class="form-title">Setari profil</legend>
                        <p class="profile_settings_avatar_image">
                            <img src="profile.png" alt="Avatar" class="image_avatar_settings_profile" style="width:10vw">
                            <!-- link catre fisiere -->
                            <!-- <input type="file" id="profile_settings_avatar_image" name="profile_settings_avatar_image" accept="image/*"> -->
                        </p>
                        <label class="profile_settings_avatar_image">Schimba-ti imaginea de profil</label>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" name="fname" placeholder="<?php echo $fname;?>">
                                    <span class="form-span" data-placeholder="😃‍"></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" name="lname" placeholder="<?php echo $lname;?>">
                                    <span class="form-span" data-placeholder="😃‍"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" name="phone" placeholder="<?php echo $phone;?>">
                                    <span class="form-span" data-placeholder="☎‍"></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" name="mail" placeholder="<?php echo $mail;?>">
                                    <span class="form-span" data-placeholder="📧‍"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" name="username" placeholder="<?php echo $username;?>">
                                    <span class="form-span" data-placeholder="🙋🏻‍‍"></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="group">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="group">
                                    <label class="label">Categorie</label>
                                    <div class="selection-category-person">
                                        <select name="category" tabindex="-1" class="selection-category-hidden-accessible" aria-hidden="true">
                                            <option disabled="disabled" selected="selected"><?php echo $category;?></option>
                                            <option value="Cetatean">Cetatean</option>
                                            <option value="Personal autorizat">Personal autorizat</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="group">
                                    <label class="label">Locatie</label>
                                    <div class="selection-location-person">
                                        <select name="location" tabindex="-1" class="selection-location-hidden-accessible" aria-hidden="true">
                                            <option disabled="disabled" selected="selected"><?php echo $location;?></option>
                                            <option value="Alba">Alba</option> <option value="Arad">Arad</option> <option value="Arges">Arges</option> <option value="Bacau">Bacau</option> <option value="Bihor">Bihor</option> <option value="Bistrita-Nasaud">Bistrita-Nasaud</option> <option value="Botosani">Botosani</option> <option value="Braila">Braila</option> <option value="Brasov">Brasov</option> <option value="Bucuresti">BUCURESTI</option> <option value="Buzau">Buzau</option> <option value="Calarasi">Calarasi</option> <option value="Caras-Severin">Caras-Severin</option> <option value="Cluj">Cluj</option> <option value="Constanta">Constanta</option> <option value="Covasna">Covasna</option> <option value="Dambovita">Dambovita</option> <option value="Dolj">Dolj</option> <option value="Galati">Galati</option> <option value="Giurgiu">Giurgiu</option> <option value="Gorj">Gorj</option> <option value="Harghita">Harghita</option> <option value="Hunedoara">Hunedoara</option> <option value="Ialomita">Ialomita</option> <option value="Iasi">Iasi</option> <option value="Ilfov">Ilfov</option> <option value="Maramures">Maramures</option> <option value="Mehedinti">Mehedinti</option> <option value="Mures">Mures</option> <option value="Neamt">Neamt</option> <option value="Olt">Olt</option> <option value="Prahova">Prahova</option> <option value="Salaj">Salaj</option> <option value="Satu Mare">Satu Mare</option> <option value="Sibiu">Sibiu</option> <option value="Suceava">Suceava</option> <option value="Teleorman">Teleorman</option> <option value="Timis">Timis</option> <option value="Tulcea">Tulcea</option> <option value="Valcea">Valcea</option> <option value="Vaslui">Vaslui</option> <option value="Vrancea">Vrancea</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="group">
                                    <div class="form-login-forgot-password">
                                        <?php
                                        if (isset($_GET["newpwd"])) {
                                            if ($_GET["newpwd"] == "passwordupdated") {
                                                echo '<p class="help-block">Parola dumneavoastra a fost resetata!</p>';
                                            }
                                        }
                                        ?>
                                        <a class="forgot-password" href="reset-password.php">
                                                Resetare parola
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="group">
                                    <div class="btn-already">
                                        <!-- pop up pentru parola dinaintea eventualei schimbari de mai sus -->
                                        <div class="form-signup-button confirmation_settings_profile">
                                            <button class="form-signup-button-submit" type="submit" name="as-submit">Salvare modificari</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>