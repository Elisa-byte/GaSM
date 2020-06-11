<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <base href = "<?php echo $base_location ?>" />
    <link rel="stylesheet" href="public/stylesheets/styles.css">

    <script src="https://use.fontawesome.com/9366a1d005.js"></script>
    <script src="public/JavaScript/disableScroll.js"></script>
</head>

<body>


  <?php require_once 'app/views/includes/topnav.php' ?> 

    <main class="main-content" id="main-cont">
        <section id="home-intro">
            <img id="home-intro__image" src="public/img/logo2-dark.PNG" alt="Some image for now">
            <div>
                <h1>Împreună pentru un viitor mai bun!</h1>
                <p>
                    Bine ați venit pe website-ul Garbage Smart Monitor - ați făcut un prim pas către crearea unei societăți mai curate!
                    Proiectul Gasm se bazează pe puterea colectivă a societății în a raporta zone în care s-a acumulat o cantitate mare de gunoi. Noi prelucrăm datele și creem hărți interactive pentru a evidenția județele cu poluarea cea mai mare, ajutănd astfel factorii decizionali să ofere un buget mai mare salubrizării zonelor care au nevoie! 
                </p>
                <p>
                    Totodată, GaSM oferă utilizatorilor posibilitatea de a crea campanii de sinsibilizare a populației în ceea ce privește igienizarea locurilor publice, salubrizarea instituțiilor și îngrijirea naturii!
                </p>
            </div>
        </section>
        <h2 class="center-text">Aspirațiile noastre</h2>
        <hr class="divider">
        <section id="home-qa">
            
            <div>
                <img class="home-qa__image" src="public/img/tree-icon.png" alt="some img alt">
                <div>
                    <h1>Îngrijirea naturii</h1>
                    <p>Natura este cea care suferă cel mai tare în urma ignoranței cetățenilor si a entităților ierarhice superioare. Prin acest proiect, urmărim in primul rand colectarea deșeurilor din spațiile verzi!</p>
                </div>
            </div>
            <div>
                <img class="home-qa__image" src="public/img/recycle-icon.png" alt="some img alt">
                <div>
                    <h1>Reciclarea abundentă</h1>
                    <p>Anual, mii de tone de materiale reciclabile sunt arse sau aruncate prin răuri, mari sau oceane. Reciclarea materialelor reduce poluarea și totodată poate produce elemente adjuvante economiei, precum energie electrică, alte produse, etc!</p>
                </div>
            </div>
            <div>
                <img class="home-qa__image" src="public/img/happyman-icon.png" alt="some img alt">
                <div>
                    <h1>Bunăstarea ta și a tuturor</h1>
                    <p>Nimănui nu-i place să umble pe stradă sau prin parc și să vadă aruncate gunoaie prin aceste spații publice. Din acest motiv, GaSM luptă pentru o lume mai ecologică, care va duce garantat la bunăstarea tuturor!</p>
                </div>
            </div>
        </section>
        <section id="campaigns-preview">
            <h1 class="section-title">Campaniile noastre</h1>

            <?php

            foreach ($data['campanii']->campanii as $campanie) {
                $nume = $campanie->nume;
                $descriere = $campanie->descriere;
                $id  = str_replace(' ', '-', strtolower($nume));
            ?>
                <div class="campanie__preview" style="background-image: url(<?php echo $campanie->imagine ?>);">
                    <!-- <img src="https://picsum.photos/150/150" alt="some img alt"> -->
                    <h2><?php echo $nume; ?></h2>
                    <div class="overlay"></div>
                    <p><?php echo substr($descriere, 0, 100); ?>...</p>
                    <a href="campanie/id/<?php echo $id; ?>">Citește mai multe...</a>
                </div>
            <?php
            }
            ?>

        </section>
    </main>

 <?php require_once 'app/views/includes/footer.php'?>

</body>

</html>