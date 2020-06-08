<input type="checkbox" id="overlay-checkbox" onclick="myFunction()"/>
    <div id="overlay-menu">
        <ul class="top-nav--overlayed">
            <li class="top-nav__link--overlayed"><a href="/exempluProf">Home</a></li>
            <li class="top-nav__link--overlayed"><a href="user/formularRaportare">Raporteaza o zona</a></li>
            <li class="top-nav__link--overlayed"><a href="home/statistics">Statistici</a></li>
            <li class="top-nav__link--overlayed"><a href="user/formularCampanie">Creeaza o campanie</a></li>
            <li class="top-nav__link--overlayed"><a href="#campaniiform.html">Campanii</a></li>
            <li class="top-nav__link--overlayed"><a href="#">View User Profile</a></li>
            <li class="top-nav__link--overlayed"><a href="user/accountSettings">Config Account</a></li>
            <li class="top-nav__link--overlayed"><a href="#">Log Out</a></li>
            <li class="top-nav__link--overlayed"><a href="home/login">Login</a></li>
            <li class="top-nav__link--overlayed"><a href="home/signup">SignUp</a></li>
        </ul>
    </div>
    <header class="top-bar">
        <a href="/exempluProf" id="top-bar__logo-container"><img src="public/img/logo-white.PNG" alt="GaSM Logo" id="top-bar__logo"></a>
        <ul class="top-nav">
            <li class="top-nav__link"><a href="/exempluProf">Home</a></li>
            <li class="top-nav__link"><a href="user/formularRaportare">Raporteaza o zona</a></li>
            <li class="top-nav__link"><a href="home/statistics">Statistici</a></li>
            <li class="top-nav__link"><a href="user/formularCampanie">Creeaza o campanie</a></li>
            <li class="top-nav__link"><a href="#campaniiform.html">Campanii</a></li>
        </ul>
        <form class="top-nav__login">
            <label>
                <!-- <span>Username</span> -->
                <br>
                <input class="top-nav__text" type="text" name="username" placeholder="Username or email">
            </label>
            <label>
                <!-- <span>Password</span> -->
                <br>
                <input class="top-nav__text" type="password" name="password" placeholder="Password">
            </label>
            <button type="submit" hidden>LogIn</button>
        </form>
        <div class="user-profile">

            <label for="overlay-checkbox" id="mobile-menu"><i class="fa fa-bars"></i></label>
            <label id="profile-button"><i class="fa fa-user-circle"></i></label>
            <ul class="user-options">
                <div id="arrowup"></div>
                <li class="user__option"><a href="#">View User Profile</a></li>
                <li class="user__option"><a href="user/accountSettings">Config Account</a></li>
                <li class="user__option"><a href="#">Log Out</a></li>
                <li class="user__option"><a href="home/login">Login</a></li>
                <li class="user__option"><a href="home/signup">SignUp</a></li>
            </ul>
        </div>
    </header>