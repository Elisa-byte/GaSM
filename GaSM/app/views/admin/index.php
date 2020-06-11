<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <base href="<?php echo $base_location ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/stylesheets/styles.css">
    <script src="public/JavaScript/fetchUser.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="public/JavaScript/loadMoreCampaignsAdmin.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.delete_user', function() {
                var ID = $(this).attr('id');
                $.ajax({
                    type: 'POST',
                    url: 'admin/deleteUser',
                    data: 'id=' + ID,
                    success: function(data) {
                        document.getElementById('userSpot').innerHTML = data;
                    }
                });
            });

            $(document).on('click', '.delete_campaign', function() {
                var ID = $(this).attr('id');
                $.ajax({
                    type: 'POST',
                    url: 'admin/deleteCampaign',
                    data: 'name=' + ID,
                    success: function(data) {
                        var newId = "q".concat(ID);
                        console.log('newId');
                        document.getElementById('campaignSpot').innerHTML = data;
                        document.getElementById("q".concat(ID)).style.display = "none";
                    }
                });
            });
        });
    </script>
    <title>Logare admin</title>
</head>

<body>

    <main class="main-content">
        <h1>Dashboard</h1>
        <a href="admin/logout" style="color:brown; text-decoration: underline; font-weight: 700;">Logout</a>
        <section>
            <h2>Utilizatorii site-ului</h2>
            <h3>Utilizatorii actuali</h3>

            <form action="">
                <input id="username" type="text" placeholder="Caută un utilizator">
                <button onclick="getUserInfo(document.getElementById('username').value);" type="button">Caută</button>
            </form>

            <!-- getUserInfo(document.getElementById('username')) -->
            <div id="userSpot">

            </div>
            <h3>Adaugă un utilizator</h3>
            <?php
            if (isset($data['error'])) {
                if ($data['error'] == 'emptyfields') {
                    echo '<p class="help-block" > Nu ati completat tot formularul!</p> ';
                } else if ($data['error'] == 'invalidfname') {
                    echo '<p class="help-block" > Nu ati completat corect prenumele utilizatorului!</p> ';
                } else if ($data['error'] == 'invalidlname') {
                    echo '<p class="help-block" > Nu ati completat corect numele utilizatorului!</p> ';
                } else if ($data['error'] == 'invalidphone') {
                    echo '<p class="help-block" > Nu ati completat corect numarul de telefon al utilizatorului!</p> ';
                } else if ($data['error'] == 'invalidmail') {
                    echo '<p class="help-block" > Nu ati completat corect e-mailul utilizatorului!</p> ';
                } else if ($data['error'] == 'invalidusername') {
                    echo '<p class="help-block" > Nu ati completat corect numele utilizatorului!</p> ';
                } else if ($data['error'] == 'invalidpwd') {
                    echo '<p class="help-block" > Parola invalida! Respectati cerintele parolei!</p> ';
                } else if ($data['error'] == 'pwdTooSmall') {
                    echo '<p class="help-block" > Parola trebuie sa contina macar 8 caractere</p> ';
                } else if ($data['error'] == 'passwordCheck') {
                    echo '<p class="help-block" > Parolele nu corespund!</p> ';
                } else if ($data['error'] == 'usertaken') {
                    echo '<p class="help-block" > Numele de utilizator dorit este luat de altcineva!</p> ';
                }
            }
            ?>
            <form class="form-signup" method="POST" action="admin/addUser">

                <div class="row row-space">
                    <div class="col-2">
                        <div class="group">
                            <table class="campaign-info">
                                <tr>
                                    <td><input class="form-input-admin" type="text" name="fname" placeholder="Nume" required>
                                    <td><input class="form-input-admin" type="text" name="lname" placeholder="Prenume" required></td>
                                </tr>
                                <tr>
                                    <td><input class="form-input-admin" type="text" name="username" placeholder="Username" required>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><input class="form-input-admin" type="text" name="phone" pattern="\+?[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]*" placeholder="Telefon" required></td>
                                    <td><input class="form-input-admin" type="text" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email" required></td>
                                </tr>
                                <tr>
                                    <td><input class="form-input-admin" type="password" name="password" placeholder="Parola" required></td>
                                    <td><input class="form-input-admin" type="password" name="password-repeat" placeholder="Confirmare parola" required></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="selection-category-person">
                                            <select name="category" tabindex="-1" class="selection-category-hidden-accessible" aria-hidden="true" required>
                                                <option disabled="disabled" selected="selected">Alegeti o categorie</option>
                                                <option value="Cetatean">Cetatean</option>
                                                <option value="Personal autorizat">Personal autorizat</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="selection-location-person">
                                            <select name="location" tabindex="-1" class="selection-location-hidden-accessible" aria-hidden="true" required>
                                                <option disabled="disabled" selected="selected">Alegeti un judet</option>
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
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="group">
                            <div class="form-add-user-button">
                                <button class="form-login-button-submit" type="submit" name="add-user-submit">
                                    Adauga user
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </section>

        <section>
            <h2>Administratorii site-ului</h2>
            <h3>Administratori curenți</h3>
            <?php
            if (isset($data['error'])) {
                if ($data['error'] == 'emptyfieldsadmin') {
                    echo '<p class="help-block" > Nu ati completat tot formularul!</p> ';
                } else if ($data['error'] == 'invalidfnameadmin') {
                    echo '<p class="help-block" > Nu ati completat corect prenumele administratorului!</p> ';
                } else if ($data['error'] == 'invalidlnameadmin') {
                    echo '<p class="help-block" > Nu ati completat corect numele administratorului!</p> ';
                } else if ($data['error'] == 'invalidphoneadmin') {
                    echo '<p class="help-block" > Nu ati completat corect numarul de telefon al administratorului!</p> ';
                } else if ($data['error'] == 'invalidmailadmin') {
                    echo '<p class="help-block" > Nu ati completat corect e-mailul administratorului!</p> ';
                } else if ($data['error'] == 'invalidusernameadmin') {
                    echo '<p class="help-block" > Nu ati completat corect numele administratorului!</p> ';
                } else if ($data['error'] == 'invalidpwdadmin') {
                    echo '<p class="help-block" > Parola invalida! Respectati cerintele parolei!</p> ';
                } else if ($data['error'] == 'pwdTooSmalladmin') {
                    echo '<p class="help-block" > Parola trebuie sa contina macar 8 caractere</p> ';
                } else if ($data['error'] == 'passwordCheckadmin') {
                    echo '<p class="help-block" > Parolele nu corespund!</p> ';
                } else if ($data['error'] == 'usertakenadmin') {
                    echo '<p class="help-block" > Numele de utilizator dorit este luat de altcineva!</p> ';
                }
            }
            if (isset($data['addadmin'])) {
                if ($data['addadmin'] == 'success') {
                    echo '<p class="help-block" > Admin adaugat!</p> ';
                }
            }
            ?>

<div class="postList">
                    <table class='campaign-info'>
                        <tr>
                            <td>Nume</td>
                            <td>Prenume</td>
                            <td>Nume Utilizator</td>
                            <td>Email</td>
                        </tr>
                        <?php

                        // Get records from the database
                        if (mysqli_num_rows($data['query']) > 0) {
                            while ($row = $data['query']->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?php echo $row['lnameAdmin']; ?></td>
                                    <td><?php echo $row['fnameAdmin']; ?></td>
                                    <td><?php echo $row['uidAdmin']; ?></td>
                                    <td><?php echo $row['emailAdmin']; ?></td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </table>
                </div>
            <h3>Adaugă un administrator</h3>

            <form class="form-signup" method="POST" action="admin/addAdmin">

                
                <div class="row row-space">
                    <div class="col-2">
                        <div class="group">
                            <table class='campaign-info'>
                                <tr>
                                    <td><input class="form-input-admin" type="text" name="fname" placeholder="Nume" required>
                                    <td><input class="form-input-admin" type="text" name="lname" placeholder="Prenume" required></td>
                                </tr>
                                <tr>
                                    <td><input class="form-input-admin" type="text" name="username" placeholder="Username" required>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><input class="form-input-admin" type="text" name="phone" pattern="\+?[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]*" placeholder="Telefon" required></td>
                                    <td><input class="form-input-admin" type="text" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email" required></td>
                                </tr>
                                <tr>
                                    <td><input class="form-input-admin" type="password" name="password" placeholder="Parola" required></td>
                                    <td><input class="form-input-admin" type="password" name="password-repeat" placeholder="Confirmare parola" required></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="group">
                            <div class="form-add-user-button">
                                <button class="form-login-button-submit" type="submit" name="add-admin-submit">
                                    Adauga admin
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>

        <section>
            <h2>Campanii</h2>
            <div id="campaignSpot">



            </div>
            <table class='campaign-info'>
                <tr>
                    <td>Nume Campanie</td>
                    <td>Descriere Campanie</td>
                    <td></td>
                </tr>


                <?php

                foreach ($data['campanii']->campanii as $campanie) {
                    $nume = $campanie->nume;
                    $descriere = $campanie->descriere;
                    $id  = str_replace(' ', '-', strtolower($nume));
                ?>
                    <tr class="checkpoint" id="q<?php echo $id; ?>">
                        <td><?php echo $nume; ?></td>
                        <td><?php echo $descriere; ?></td>
                        <td><span id="<?php echo $id ?>" class='delete_campaign'>Sterge Campanie</span> </td>
                    </tr>
                <?php
                }
                ?>

            </table>
            <button class="load-more">Load More</button>
            <input type="hidden" id="row" value="0">
            <input type="hidden" id="all" value="<?php echo $data['allcount']; ?>">

        </section>
    </main>

</body>

</html>