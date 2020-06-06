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
        <li class="top-nav__link--overlayed"><a href="#">Profil</a></li>
        <li class="top-nav__link--overlayed"><a href="#">Setari Cont</a></li>
        <li class="top-nav__link--overlayed"><a href="login.php">Logare</a></li>
        <li class="top-nav__link--overlayed"><a href="signup.php">Inregistrare</a></li>
        <li class="top-nav__link--overlayed"><a href="logout.php">Delogare</a></li>
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

    <div class="user-profile">
        <label for="overlay-checkbox" id="mobile-menu"><i class="fa fa-bars"></i></label>
        <label id="profile-button"><i class="fa fa-user-circle"></i></label>
        <ul class="user-options">
            <div id="arrowup"></div>
            <li class="user__option"><a href="account.php">Profil</a></li>
            <li class="user__option"><a href="account-settings.php">Setari Cont</a></li>
            <li class="user__option"><a href="login.php">Logare</a></li>
            <li class="user__option"><a href="signup.php">Inregistrare</a></li>
            <li class="user__option"><a href="logout.php">Delogare</a></li>
        </ul>
    </div>
</header>


