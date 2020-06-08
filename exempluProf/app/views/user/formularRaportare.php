<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <base href = "http://localhost:1234/exempluProf/" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="public/JavaScript/viewPassword.js"></script>
    <link rel="stylesheet" type="text/css" href="public/stylesheets/login.css">
    <link rel="stylesheet" type="text/css" href="public/stylesheets/styles.css">
    <script src="https://use.fontawesome.com/9366a1d005.js"></script>
    <script src="public/JavaScript/viewMap.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <title>FormularRaportare</title>

</head>

<body>

<?php require_once 'app/views/includes/topnav.php' ?> 


    <div class="main-content">
        <div class="container-report">
            <div class="wrap-report">
                <div class="card-4 ">
                    <div class="testbox">
                        <!-- <form onsubmit="return validateForm()> -->
                        <form class="form-login" action="/" name="FormularRaportare" method="POST">
                            <h1 class="h1-report">Raportare a depozitului ilegal de gunoi</h1>
                            <div>
                                <h4 class="h4-report">Ati observat dumneavoastra acest incident?</h4>
                                <div class="question-answer">
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="using" />Yes</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="using" />No</label>
                                </div>
                            </div>
                            <div>
                                <h4 class="h4-report">Cunoasteti persoana care a depozitat deseurile?</h4>
                                <div class="question-answer">
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="using" />Yes</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="using" />No</label>
                                </div>
                            </div>
                            <div>
                                <h4 class="h4-report">Ce ati vazut depozitat ilegal?</h4>
                                <div class="question-answer">
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="satisfied" />Mucuri de tigara</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="satisfied" />Muc de tigara inca aprins</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="satisfied" />Muc de tigara inca aprins aruncat pe iarba uscata</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="satisfied" />Pubele ce depasesc 200kg</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="satisfied" />Medicamente aruncate</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="satisfied" />Electrocasnice</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="satisfied" />Hartie</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="satisfied" />Metale</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="satisfied" />Sticla</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="satisfied" />Plastic</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="satisfied" />Gunoi menajer</label>
                                </div>
                            </div>
                            <div>
                                <h4 class="h4-report">Va rugam sa ne indicati cum ati vazut materialele depozitate</h4>
                                <div class="question-answer">
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="impressed" />Dupa iesirea dintr-o masina</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="impressed" />Inaite de iesirea dintr-o masina</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="impressed" />Aruncate deja pana la ajungerea la locul incidentului</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="impressed" />Aruncate din masina</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="impressed" />Aruncate din masini de mare tonaj</label>
                                </div>
                            </div>
                            <div>
                                <h4 class="h4-report">Va rugam completati cu informatii referitoare la persoana incriminata</h4>
                                <div class="question-answer">
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="impressed" />Masina</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="impressed" />Remorca</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="impressed" />Aruncate din masini de mare tonaj</label></br>
                                    <label class="box-message">Placutele de inmatriculare ale masinii/remorcii<input class="box-message" type="text" placeholder="ex: VS123AAA" name="impressed" /></label>
                                </div>
                            </div>
                            <div>
                                <h4 class="h4-report">What disappointed you most about the product / service ?</h4>
                                <div class="question-answer">
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="disappointed" />Quality</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="disappointed" />Price</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="disappointed" />Shopping Experience</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="disappointed" />Installation or First Use Experience</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="disappointed" />Usability</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="disappointed" />Customer Service</label>
                                </div>
                            </div>
                            <div>
                                <h4 class="h4-report">What do you like about the product / service?</h4>
                                <div class="question-answer">
                                    <textarea class="textarea-report" rows="3"></textarea>
                                </div>
                            </div>
                            <div>
                                <h4 class="h4-report">What do you like about the product / service?</h4>
                                <div class="question-answer">
                                    <textarea class="textarea-report" rows="3"></textarea>
                                </div>
                            </div>
                            <div>
                                <h4 class="h4-report">Compared to similar products offered by other companies, how do you consider our product?</h4>
                                <div class="question-answer">
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="offered" />Much Better</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="offered" />Somewhat Better</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="offered" />About the Same</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="offered" />Somewhat Worse</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="offered" />Much Worse</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="offered" />Don't Know</label>
                                </div>
                            </div>
                            <div>
                                <h4 class="h4-report">Would you use our product / service in the future?</h4>
                                <div class="question-answer">
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="future" />Definitely</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="future" />Probably</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="future" />Not Sure</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="future" />Probably Not</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="future" />Definitely Not</label>
                                </div>
                            </div>
                            <div>
                                <h4 class="h4-report">Would you recommend our product / service to other people?</h4>
                                <div class="question-answer">
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="recommend" />Definitely</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="recommend" />Probably</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="recommend" />Not Sure</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="recommend" />Probably Not</label>
                                    <label class="label-report"><input class="input-report-login-signup-AS" type="radio" value="none" name="recommend" />Definitely Not</label>
                                </div>
                            </div>
                            <div>
                                <div class="question-answer">
                                    <div id="map"></div>
                                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkUOdZ5y7hMm0yrcCQoCvLwzdM6M8s5qk&callback=initMap "></script>
                                </div>
                            </div>
                            <div class="question-answer">
                                <div class="btn-block">
                                    <button class="button-report-login-signup-AS" type="submit">Trimiteti formularul</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once 'app/views/includes/footer.php' ?> 

</body>

</html>