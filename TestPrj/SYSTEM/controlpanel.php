<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.show_more', function () {
                var ID = $(this).attr('id');
                $('.show_more').hide();
                $('.loading').show();
                $.ajax({
                    type: 'POST',
                    url: 'ajax_more.php',
                    data: 'id=' + ID,
                    success: function (html) {
                        $('#show_more_main' + ID).remove();
                        $('.postList').append(html);
                    }
                });
            });
        });
        $(document).ready(function () {
            $(document).on('click', '.delete_user', function () {
                var ID = $(this).attr('id');
                $.ajax({
                    type: 'POST',
                    url: 'ajax_delete_user.php',
                    data: 'id=' + ID,
                    success: function (data) {
                        location.reload();
                    }
                });
            });
        });
    </script>
    <title>Logare admin</title>
</head>

<body>
<div class="container-report">
    <div class="wrap-report">
        <div class="card-4 ">
            <div class="testbox">
                <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == 'emptyfields'){
                        echo '<p class="help-block" > Nu ati completat tot formularul!</p> ';
                    }
                    else if ($_GET['error'] == 'invalidfname'){
                        echo '<p class="help-block" > Nu ati completat corect prenumele utilizatorului!</p> ';
                    }
                    else if ($_GET['error'] == 'invalidlname'){
                        echo '<p class="help-block" > Nu ati completat corect numele utilizatorului!</p> ';
                    }
                    else if ($_GET['error'] == 'invalidphone'){
                        echo '<p class="help-block" > Nu ati completat corect numarul de telefon al utilizatorului!</p> ';
                    }
                    else if ($_GET['error'] == 'invalidmail'){
                        echo '<p class="help-block" > Nu ati completat corect e-mailul utilizatorului!</p> ';
                    }
                    else if ($_GET['error'] == 'invalidusername'){
                        echo '<p class="help-block" > Nu ati completat corect numele utilizatorului!</p> ';
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
                ?>
                <form class="form-signup" method="POST" action="includes/adduser.inc.php">
                <span class="form-logo">
                    <img src="../CSS/logo2-dark.PNG" alt="logo-dark" class="img-logo"/>
                </span>
                    <div class="postList">
                        <table>
                            <tr>
                                <td>Nume</td>
                                <td>Prenume</td>
                                <td>Nume Utilizator</td>
                                <td>Email</td>
                                <td></td>
                            </tr>
                            <?php
                            include 'includes/dbh.inc.php';
                            // Get records from the database
                            $query = $conn->query("SELECT * FROM gasm.usersv2 ORDER BY idUsers ASC LIMIT 6");

                            if ($query->num_rows > 0) {
                                while ($row = $query->fetch_assoc()) {
                                    $postID = $row['idUsers'];
                                    //echo $postID;
                                    ?>
                                    <tr>
                                        <td><?php echo $row['lnUsers']; ?></td>
                                        <td><?php echo $row['fnUsers']; ?></td>
                                        <td><?php echo $row['uidUsers']; ?></td>
                                        <td><?php echo $row['emailUsers']; ?></td>
                                        <td>
                                            <span id="<?php echo $postID; ?>" class="delete_user"
                                                  title="Sterge user">Sterge user</span>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <div class="show_more_main" id="show_more_main<?php echo $postID; ?>">
                                    <span id="<?php echo $postID; ?>" class="show_more"
                                        title="Load more posts">Arata mai mult</span>
                                    <span class="loading" style="display: none;">
                                    <span class="loading_txt">Incarcare...</span></span>
                                </div>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="group">
                                <table>
                                    <tr>
                                        <td><input class="form-input-admin" type="text" name="fname" placeholder="Nume">
                                        <td><input class="form-input-admin" type="text" name="lname" placeholder="Prenume"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-input-admin" type="text" name="phone" placeholder="Telefon"></td>
                                        <td><input class="form-input-admin" type="text" name="mail" placeholder="Email"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-input-admin" type="password" name="password" placeholder="Parola"></td>
                                        <td><input class="form-input-admin" type="password" name="password-repeat" placeholder="Confirmare parola"></td>
                                    </tr>
                                    <tr>
                                        <td><div class="selection-category-person">
                                                <select name="category" tabindex="-1" class="selection-category-hidden-accessible" aria-hidden="true">
                                                    <option disabled="disabled" selected="selected">Alegeti o categorie</option>
                                                    <option value="Cetatean">Cetatean</option>
                                                    <option value="Personal autorizat">Personal autorizat</option>
                                                </select>
                                            </div></td>
                                        <td><div class="selection-location-person">
                                                <select name="location" tabindex="-1" class="selection-location-hidden-accessible" aria-hidden="true">
                                                    <option disabled="disabled" selected="selected">Alegeti un judet</option>
                                                    <option value="Alba">Alba</option> <option value="Arad">Arad</option> <option value="Arges">Arges</option> <option value="Bacau">Bacau</option> <option value="Bihor">Bihor</option> <option value="Bistrita-Nasaud">Bistrita-Nasaud</option> <option value="Botosani">Botosani</option> <option value="Braila">Braila</option> <option value="Brasov">Brasov</option> <option value="Bucuresti">BUCURESTI</option> <option value="Buzau">Buzau</option> <option value="Calarasi">Calarasi</option> <option value="Caras-Severin">Caras-Severin</option> <option value="Cluj">Cluj</option> <option value="Constanta">Constanta</option> <option value="Covasna">Covasna</option> <option value="Dambovita">Dambovita</option> <option value="Dolj">Dolj</option> <option value="Galati">Galati</option> <option value="Giurgiu">Giurgiu</option> <option value="Gorj">Gorj</option> <option value="Harghita">Harghita</option> <option value="Hunedoara">Hunedoara</option> <option value="Ialomita">Ialomita</option> <option value="Iasi">Iasi</option> <option value="Ilfov">Ilfov</option> <option value="Maramures">Maramures</option> <option value="Mehedinti">Mehedinti</option> <option value="Mures">Mures</option> <option value="Neamt">Neamt</option> <option value="Olt">Olt</option> <option value="Prahova">Prahova</option> <option value="Salaj">Salaj</option> <option value="Satu Mare">Satu Mare</option> <option value="Sibiu">Sibiu</option> <option value="Suceava">Suceava</option> <option value="Teleorman">Teleorman</option> <option value="Timis">Timis</option> <option value="Tulcea">Tulcea</option> <option value="Valcea">Valcea</option> <option value="Vaslui">Vaslui</option> <option value="Vrancea">Vrancea</option>
                                                </select>
                                            </div></td>
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

                <?php
                if(isset($_GET['error'])){
                    if($_GET['error'] == 'emptyfieldsadmin'){
                        echo '<p class="help-block" > Nu ati completat tot formularul!</p> ';
                    }
                    else if ($_GET['error'] == 'invalidfnameadmin'){
                        echo '<p class="help-block" > Nu ati completat corect prenumele administratorului!</p> ';
                    }
                    else if ($_GET['error'] == 'invalidlnameadmin'){
                        echo '<p class="help-block" > Nu ati completat corect numele administratorului!</p> ';
                    }
                    else if ($_GET['error'] == 'invalidphoneadmin'){
                        echo '<p class="help-block" > Nu ati completat corect numarul de telefon al administratorului!</p> ';
                    }
                    else if ($_GET['error'] == 'invalidmailadmin'){
                        echo '<p class="help-block" > Nu ati completat corect e-mailul administratorului!</p> ';
                    }
                    else if ($_GET['error'] == 'invalidusernameadmin'){
                        echo '<p class="help-block" > Nu ati completat corect numele administratorului!</p> ';
                    }
                    else if ($_GET['error'] == 'invalidpwdadmin'){
                        echo '<p class="help-block" > Parola invalida! Respectati cerintele parolei!</p> ';
                    }
                    else if ($_GET['error'] == 'pwdTooSmalladmin'){
                        echo '<p class="help-block" > Parola trebuie sa contina macar 8 caractere</p> ';
                    }
                    else if ($_GET['error'] == 'passwordCheckadmin'){
                        echo '<p class="help-block" > Parolele nu corespund!</p> ';
                    }
                    else if ($_GET['error'] == 'usertakenadmin'){
                        echo '<p class="help-block" > Numele de utilizator dorit este luat de altcineva!</p> ';
                    }
                }
                if (isset($_GET['addadmin'])){
                    if($_GET['addadmin'] == 'success'){
                        echo '<p class="help-block" > Admin adaugat!</p> ';
                    }
                }
                ?>
                <form class="form-signup" method="POST" action="includes/addadmin.inc.php">
                <span class="form-logo">
                    <img src="../CSS/logo2-dark.PNG" alt="logo-dark" class="img-logo"/>
                </span>
                    <div class="postList">
                        <table>
                            <tr>
                                <td>Nume</td>
                                <td>Prenume</td>
                                <td>Nume Utilizator</td>
                                <td>Email</td>
                            </tr>
                            <?php
                            include 'includes/dbh.inc.php';
                            $sql = $conn->query("SELECT COUNT(*) as num_rows FROM gasm.admin ");
                            $row = $sql->fetch_assoc();
                            $totalRowCount = $row['num_rows'];
                            // Get records from the database
                            $query = $conn->query("SELECT * FROM gasm.admin ORDER BY idUsers ASC LIMIT " . $totalRowCount);
                            if ($query->num_rows > 0) {
                                while ($row = $query->fetch_assoc()) {
                                    $postID = $row['idUsers'];
                                    //echo $postID;
                                    ?>
                                    <tr>
                                        <td><?php echo $row['lnUsers']; ?></td>
                                        <td><?php echo $row['fnUsers']; ?></td>
                                        <td><?php echo $row['uidUsers']; ?></td>
                                        <td><?php echo $row['emailUsers']; ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="group">
                                <table>
                                    <tr>
                                        <td><input class="form-input-admin" type="text" name="fname" placeholder="Nume">
                                        <td><input class="form-input-admin" type="text" name="lname" placeholder="Prenume"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-input-admin" type="text" name="mail" placeholder="Email"></td>
                                        <td><input class="form-input-admin" type="text" name="phone" placeholder="Telefon"></td>
                                    </tr>
                                    <tr>
                                        <td><input class="form-input-admin" type="password" name="password" placeholder="Parola"></td>
                                        <td><input class="form-input-admin" type="password" name="password-repeat" placeholder="Confirmare parola"></td>
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
            </div>
        </div>
    </div>
</div>
</body>

</html>