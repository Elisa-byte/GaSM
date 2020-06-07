<?php
session_start();
include("includes/dbh.inc.php");
if (!isset($_SESSION['userId'])) {
    header("Location: login.php");//login.php//daca nu e logat nu intra in settings
} else {
} ?>
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
                <form class="form-login" action="includes/account-settings.inc.php" method="POST"
                      enctype="multipart/form-data">
                    <fieldset class="fieldset-AS">
                        <legend class="form-title">Profil</legend>
                        <p class="profile_settings_avatar_image">
                            <img src="profile.png" alt="Avatar" class="image_avatar_settings_profile"
                                 style="width:10vw">
                            <!-- link catre fisiere -->
                            <!-- <input type="file" id="profile_settings_avatar_image" name="profile_settings_avatar_image" accept="image/*"> -->
                        </p>
                        <label class="profile_settings_avatar_image">Schimba-ti imaginea de profil</label>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" name="fname"
                                           placeholder="<?php echo $fname; ?>" disabled>
                                    <span class="form-span" data-placeholder="😃‍"></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" name="lname"
                                           placeholder="<?php echo $lname; ?>" disabled>
                                    <span class="form-span" data-placeholder="😃‍"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" name="phone"
                                           placeholder="<?php echo $phone; ?>" disabled>
                                    <span class="form-span" data-placeholder="☎‍"></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" name="mail" placeholder="<?php echo $mail; ?>"
                                           disabled>
                                    <span class="form-span" data-placeholder="📧‍"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input" type="text" name="username"
                                           placeholder="<?php echo $username; ?>" disabled>
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
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-already">
                            <!-- pop up pentru parola dinaintea eventualei schimbari de mai sus -->
                            <div class="form-login-forgot-password">
                                <a href="index.php" class="form-back"> << Inapoi Acasa</a>
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