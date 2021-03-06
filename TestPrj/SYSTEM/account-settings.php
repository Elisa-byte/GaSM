<?php
session_start();
include("includes/dbh.inc.php");
if (!isset($_SESSION['userId'])) {
    header("Location: login.php");//login.php//daca nu e logat nu intra in settings
} else {
} ?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

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
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'invalidfname') {
                        echo '<p class="help-block" > Nu ati completat corect prenumele dumneavoastra!</p> ';
                    } else if ($_GET['error'] == 'invalidlname') {
                        echo '<p class="help-block" > Nu ati completat corect numele dumneavoastra!</p> ';
                    } else if ($_GET['error'] == 'invalidphone') {
                        echo '<p class="help-block" > Nu ati completat corect numarul de telefon al dumneavoastra!</p> ';
                    } else if ($_GET['error'] == 'invalidmail') {
                        echo '<p class="help-block" > Nu ati completat corect e-mailul dumneavoastra!</p> ';
                    } else if ($_GET['error'] == 'invalidusername') {
                        echo '<p class="help-block" > Nu ati completat corect numele dumneavoastra de utilizator!</p> ';
                    } else if ($_GET['error'] == 'usertaken') {
                        echo '<p class="help-block" > Numele de utilizator dorit este luat de altcineva!</p> ';
                    }
                }
                ?>
                <form class="form-login" action="includes/account-settings.inc.php" method="POST"
                      enctype="multipart/form-data">
                    <fieldset class="fieldset-AS">
                        <legend class="form-title">Setari profil</legend>
                        <!-- <input type="file" name="profilImage" id="profileImage" onchange="displayImage(this)" style="{display: none;">-->
                        <?php
                        require "../SYSTEM/includes/dbh.inc.php";
                        $stmt = mysqli_stmt_init($conn);
                        $sql2 = "select * from gasm.usersv2 where idUsers='$idUsers';";
                        if (!$sql2) {
                            printf("Error: %s\n", mysqli_error($conn));
                            exit();
                        }
                        $run_get = mysqli_query($conn, $sql2);
                        $row = mysqli_fetch_array($run_get);
                        //print_r($row);
                        if($row['profileUsers'] != NULL ) {
                            echo '<img src="data:image;base64,' . base64_encode($row['profileUsers']) . '" id="profileDisplay" alt="Img Profil" style="vertical-align: middle;
                                width: 25%;
                                height: 25%;
                                border-radius: 50%;
                                margin:auto;
                                margin-bottom: 30px;">';
                        }
                        else{
                            echo '<img src="../images/generic_pic.png" ' . ' id="profileDisplay" alt="Img Profil" style="vertical-align: middle;
                                width: 25%;
                                height: 25%;
                                border-radius: 50%;
                                margin:auto;
                                margin-bottom: 30px;">';
                        }
                        ?>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" name="fname"
                                           placeholder="<?php echo $fname; ?>">
                                    <span class="form-span" data-placeholder="😃‍"></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" name="lname"
                                           placeholder="<?php echo $lname; ?>">
                                    <span class="form-span" data-placeholder="😃‍"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" name="phone"
                                           placeholder="<?php echo $phone; ?>">
                                    <span class="form-span" data-placeholder="📞‍"></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" name="mail"
                                           placeholder="<?php echo $mail; ?>">
                                    <span class="form-span" data-placeholder="📧‍"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" name="username"
                                           placeholder="<?php echo $username; ?>">
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
                                        <select name="category" tabindex="-1"
                                                class="selection-category-hidden-accessible" aria-hidden="true">
                                            <option disabled="disabled"
                                                    selected="selected"><?php echo $category; ?></option>
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
                                        <select name="location" tabindex="-1"
                                                class="selection-location-hidden-accessible" aria-hidden="true">
                                            <option disabled="disabled"
                                                    selected="selected"><?php echo $location; ?></option>
                                            <option value="Alba">Alba</option>
                                            <option value="Arad">Arad</option>
                                            <option value="Arges">Arges</option>
                                            <option value="Bacau">Bacau</option>
                                            <option value="Bihor">Bihor</option>
                                            <option value="Bistrita-Nasaud">Bistrita-Nasaud</option>
                                            <option value="Botosani">Botosani</option>
                                            <option value="Braila">Braila</option>
                                            <option value="Brasov">Brasov</option>
                                            <option value="Bucuresti">BUCURESTI</option>
                                            <option value="Buzau">Buzau</option>
                                            <option value="Calarasi">Calarasi</option>
                                            <option value="Caras-Severin">Caras-Severin</option>
                                            <option value="Cluj">Cluj</option>
                                            <option value="Constanta">Constanta</option>
                                            <option value="Covasna">Covasna</option>
                                            <option value="Dambovita">Dambovita</option>
                                            <option value="Dolj">Dolj</option>
                                            <option value="Galati">Galati</option>
                                            <option value="Giurgiu">Giurgiu</option>
                                            <option value="Gorj">Gorj</option>
                                            <option value="Harghita">Harghita</option>
                                            <option value="Hunedoara">Hunedoara</option>
                                            <option value="Ialomita">Ialomita</option>
                                            <option value="Iasi">Iasi</option>
                                            <option value="Ilfov">Ilfov</option>
                                            <option value="Maramures">Maramures</option>
                                            <option value="Mehedinti">Mehedinti</option>
                                            <option value="Mures">Mures</option>
                                            <option value="Neamt">Neamt</option>
                                            <option value="Olt">Olt</option>
                                            <option value="Prahova">Prahova</option>
                                            <option value="Salaj">Salaj</option>
                                            <option value="Satu Mare">Satu Mare</option>
                                            <option value="Sibiu">Sibiu</option>
                                            <option value="Suceava">Suceava</option>
                                            <option value="Teleorman">Teleorman</option>
                                            <option value="Timis">Timis</option>
                                            <option value="Tulcea">Tulcea</option>
                                            <option value="Valcea">Valcea</option>
                                            <option value="Vaslui">Vaslui</option>
                                            <option value="Vrancea">Vrancea</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="group">
                                    <div class="upload-btn-wrapper">
                                        <?php
                                        if (isset($_GET["newpwd"])) {
                                            if ($_GET["newpwd"] == "passwordupdated") {
                                                echo '<p class="help-block">Parola dumneavoastra a fost resetata!</p>';
                                            }
                                        }
                                        ?>
                                        <a href="reset-password.php" class="form-signup-button-submit">Resetare
                                            parola</a>
                                    </div>
                                    <div class="upload-btn-wrapper">
                                        <input type="file" accept="image/*" name="img"
                                               class="form-upload-image"/>
                                        <label for="file" style="cursor: pointer;"
                                               class="form-signup-button-submit">Incarcati o poza de profil</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="group">
                                    <div class="btn-already">
                                        <!-- pop up pentru parola dinaintea eventualei schimbari de mai sus -->
                                        <div class="form-signup-button">
                                            <button class="form-signup-button-submit" type="submit" name="as-submit">
                                                Salvare modificari
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-login-forgot-password">
                            <a href="index.php" class="form-back"> << Inapoi Acasa</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>