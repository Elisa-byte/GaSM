
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href = "<?php echo $base_location ?>" />
    <link rel="stylesheet" type="text/css" href="public/stylesheets/login.css">
    <link rel="stylesheet" href="public/stylesheets/styles.css">
    <script src="https://use.fontawesome.com/9366a1d005.js"></script>

    <title>AccountSettings</title>
</head>


<body>
<?php require_once 'app/views/includes/topnav.php' ?>



    <div class="container-account-settings">
        <div class="wrap-account-settings">
            <div class="card-4 ">
                <?php
                if (isset($data['error'])) {
                    if ($data['error'] == 'invalidfname') {
                        echo '<p class="help-block" > Nu ati completat corect prenumele dumneavoastra!</p> ';
                    } else if ($data['error'] == 'invalidlname') {
                        echo '<p class="help-block" > Nu ati completat corect numele dumneavoastra!</p> ';
                    } else if ($data['error'] == 'invalidphone') {
                        echo '<p class="help-block" > Nu ati completat corect numarul de telefon al dumneavoastra!</p> ';
                    } else if ($data['error'] == 'invalidmail') {
                        echo '<p class="help-block" > Nu ati completat corect e-mailul dumneavoastra!</p> ';
                    } else if ($data['error'] == 'invalidusername') {
                        echo '<p class="help-block" > Nu ati completat corect numele dumneavoastra de utilizator!</p> ';
                    } else if ($data['error'] == 'usertaken') {
                        echo '<p class="help-block" > Numele de utilizator dorit este luat de altcineva!</p> ';
                    }
                }
                ?>
                <form class="form-login" action="user/manageUserSettings" method="POST"
                      enctype="multipart/form-data">
                    <fieldset class="fieldset-AS">
                        <legend class="form-title">Setari profil</legend>
                        <!-- <input type="file" name="profilImage" id="profileImage" onchange="displayImage(this)" style="{display: none;">-->
                        <?php                        
                            echo '<img src="'.$data['currentUser']->profilePic.'" id="profileDisplay" alt="Img Profil" style="vertical-align: middle;
                                width: 25%;
                                height: 25%;
                                border-radius: 50%;
                                margin:auto;
                                margin-bottom: 30px;">';
                        
                        ?>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" name="fname"
                                           placeholder="<?php echo $data['currentUser']->fname; ?>">
                                    <span class="form-span" data-placeholder="😃‍"></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" name="lname"
                                           placeholder="<?php echo $data['currentUser']->lname; ?>">
                                    <span class="form-span" data-placeholder="😃‍"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" pattern="\+?[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]*" name="phone"
                                           placeholder="<?php echo $data['currentUser']->phone; ?>">
                                    <span class="form-span" data-placeholder="📞‍"></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                           placeholder="<?php echo $data['currentUser']->mail; ?>">
                                    <span class="form-span" data-placeholder="📧‍"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" name="username"
                                           placeholder="<?php echo $data['currentUser']->username; ?>">
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
                                                    selected="selected"><?php echo $data['currentUser']->category; ?></option>
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
                                                    selected="selected"><?php echo $data['currentUser']->location; ?></option>
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
                                        if (isset($data['currentUser']->newpwd)) {
                                            if ($data['currentUser']->newpwd == "passwordupdated") {
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
                                    
                                        <!-- pop up pentru parola dinaintea eventualei schimbari de mai sus -->
    
                                            <button class="form-signup-button-submit" type="submit" name="as-submit">
                                                Salvare modificari
                                            </button>

                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-login-forgot-password">
                            <a href="home" class="form-back"> << Inapoi Acasa</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>


<?php require_once 'app/views/includes/footer.php' ?>

</body>

</html>