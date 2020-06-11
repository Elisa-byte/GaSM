<!-- <?php
// session_start();
// include("includes/dbh.inc.php");
// if (!isset($_SESSION['userId'])) {
//     header("Location: login.php");//login.php//daca nu e logat nu intra in settings
// } else {
// } ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href = "<?php echo $base_location ?>" />
    <link rel="stylesheet" type="text/css" href="public/stylesheets/login.css">
    <link rel="stylesheet" type="text/css" href="public/stylesheets/styles.css">
    <script src="https://use.fontawesome.com/9366a1d005.js"></script>

    <title>Profilul tau</title>
</head>

<body>
<?php require_once 'app/views/includes/topnav.php' ?>

<div class="main-conten">
    <div class="container-account-settings">
        <div class="wrap-account-settings">
            <div class="card-4 ">
                <!-- <form class="form-login" action="user/manageUserSettings" method="POST" enctype="multipart/form-data"> -->
                <form class="form-login"  method="POST" enctype="multipart/form-data">

                    <fieldset class="fieldset-AS">
                        <legend class="form-title">Profil</legend>
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
                                    <input class="form-input-profile" type="text" name="fname"
                                           placeholder="<?php echo $data['currentUser']->fname; ?>" disabled>
                                    <span class="form-span" data-placeholder="😃‍"></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input-profile" type="text" name="lname"
                                           placeholder="<?php echo $data['currentUser']->lname; ?>" disabled>
                                    <span class="form-span" data-placeholder="😃‍"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input-profile" type="text" name="phone"
                                           placeholder="<?php echo $data['currentUser']->phone; ?>" disabled>
                                    <span class="form-span" data-placeholder="📞‍"></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input-profile" type="text" name="mail" placeholder="<?php echo $data['currentUser']->mail; ?>"
                                           disabled>
                                    <span class="form-span" data-placeholder="📧‍"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="group">
                                    <input class="form-input-profile" type="text" name="username"
                                           placeholder="<?php echo $data['currentUser']->username; ?>" disabled>
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
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-already">
                            <!-- pop up pentru parola dinaintea eventualei schimbari de mai sus -->
                            <div class="form-login-forgot-password">
                                <a href="home" class="form-back"> << Inapoi Acasa</a>
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