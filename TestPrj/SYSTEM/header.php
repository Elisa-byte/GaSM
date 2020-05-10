<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example">
    <meta name="viewport" content=""width="device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <script src="https://use.fontawesome.com/9366a1d005.js"></script>
    <title>Home page</title>
</head>
<body>
<input type="checkbox" id="overlay-checkbox" />
<div id="overlay-menu">
    <ul class="top-nav--overlayed">
        <li class="top-nav__link--overlayed"><a href="index.html">Home</a></li>
        <li class="top-nav__link--overlayed"><a href="FormularRaportare.html">Raporteaza o zona</a></li>
        <li class="top-nav__link--overlayed"><a href="#statistici">Statistici</a></li>
        <li class="top-nav__link--overlayed"><a href="FormularCampanie.html">Creeaza o campanie</a></li>
        <li class="top-nav__link--overlayed"><a href="#campaniiform.html">Campanii</a></li>
        <li class="top-nav__link--overlayed"><a href="#">View User Profile</a></li>
        <li class="top-nav__link--overlayed"><a href="#">Config Account</a></li>
        <li class="top-nav__link--overlayed"><a href="login.php">Logare</a></li>
        <li class="top-nav__link--overlayed"><a href="signup.php">Inregistrare</a></li>
        <li class="top-nav__link--overlayed"><a href="index.php" name=logout-submit">Delogare
<!--                --><?php
//                    session_start();
//                    session_unset();
//                    session_destroy();
//                    header("Location: ../index.php");
//                ?>
            </a></li>
    </ul>
</div>
<header class="top-bar">

    <a href="index.html" id="top-bar__logo-container"><img src="img/logo-white.PNG" alt="GaSM Logo" id="top-bar__logo"></a>
    <ul class="top-nav">
        <li class="top-nav__link"><a href="index.html">Home</a></li>
        <li class="top-nav__link"><a href="FormularRaportare.html">Raporteaza o zona</a></li>
        <li class="top-nav__link"><a href="#statistici">Statistici</a></li>
        <li class="top-nav__link"><a href="FormularCampanie.html">Creeaza o campanie</a></li>
        <li class="top-nav__link"><a href="#campaniiform.html">Campanii</a></li>
    </ul>
    <?php
    if(isset($_SESSION['userId'])){
//        echo '<form action="includes/logout.inc.php" method="Post">
//        <button type = "submit" name="logout-submit"> Logout"</button>
//        </form>';
        echo '<p> V-ati logat!</p>';
    }
    else{
        echo '<p> V-ati delogat!</p>';
    }
    ?>
    <div class="user-profile">
        <label for="overlay-checkbox" id="mobile-menu"><i class="fa fa-bars"></i></label>
        <label id="profile-button"><i class="fa fa-user-circle"></i></label>
        <ul class="user-options">
            <div id="arrowup"></div>
            <li class="user__option"><a href="#">View User Profile</a></li>
            <li class="user__option"><a href="#">Config Account</a></li>
            <li class="user__option"><a href="login.php">Login</a></li>
            <li class="user__option"><a href="signup.php">SignUp</a></li>
            <li class="user__option"><a href="logout.inc.php" name=logout-submit">Log Out</a></li>
        </ul>
    </div>
</header>


