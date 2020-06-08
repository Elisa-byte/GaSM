<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/GaSM/JavaScript/viewPassword.js"></script>
    <base href = "http://localhost:1234/exempluProf/" />
    <link rel="stylesheet" type="text/css" href="public/stylesheets/login.css">
    <link rel="stylesheet" href="public/stylesheets/styles.css">
    <title>AccountSettings</title>
</head>

<?php require_once 'app/views/includes/topnav.php' ?>

<body>
    <div id="main-content">
        <div class="container-signup">
            <div class="card-4">
                <div class="wrap-signup">
                    <form class="form-signup" action="/my-account-settings-page" method="post">
                        <fieldset class="fieldset-AS">
                            <legend class="form-title">Setari profil</legend>
                            <p class="profile_settings_avatar_image">
                                <img src="https://www.publicdomainpictures.net/pictures/270000/nahled/avatar-people-person-business-u.jpg" alt="Avatar" class="image_avatar_settings_profile" style="width:10vw">
                                <!-- link catre fisiere -->
                                <!-- <input type="file" id="profile_settings_avatar_image" name="profile_settings_avatar_image" accept="image/*"> -->
                            </p>
                            <label class="profile_settings_avatar_image">Schimba-ti imaginea de profil</label>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="group">
                                        <input class="form-input" type="text" name="name" placeholder="Nume">
                                        <span class="form-span" data-placeholder="😃‍"></span>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="group">
                                        <input class="form-input" type="text" name="prename" placeholder="Prenume">
                                        <span class="form-span" data-placeholder="😃‍"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="group">
                                        <input class="form-input" type="password" name="parola" placeholder="Parola">
                                        <span class="form-span" data-placeholder="‍🔗"></span>
                                        <input type="checkbox" onclick="myFunction()">Arata parola<br>
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
                                        <input class="form-input" type="text" name="Nume de utilizator" placeholder="Nume de utilizator">
                                        <span class="form-span" data-placeholder="😃‍"></span>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="group">
                                        <input class="form-input" type="text" name="company" placeholder="Numele companiei">
                                        <span class="form-span" data-placeholder="‍🏗"></span>
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
                                        <input class="form-input" type="text" name="Email" placeholder="Email">
                                        <span class="form-span" data-placeholder="‍📧"></span>
                                    </div>
                                </div>
                            </div>
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
                            <div class="btn-already">
                                <!-- pop up pentru parola dinaintea eventualei schimbari de mai sus -->
                                <div class="form-signup-button confirmation_settings_profile">
                                    <button class="form-signup-button-submit" type="submit">Salvare modificari</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'app/views/includes/footer.php' ?>

</body>

</html>