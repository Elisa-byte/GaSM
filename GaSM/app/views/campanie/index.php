<!doctype html>
<html>

<head>
    <base href="<?php echo $base_location ?>" />
    <title>Campaniile noastre</title>
    <link href="public/stylesheets/styles.css" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.0.min.js" integrity="sha256-Xxq2X+KtazgaGuA2cWR1v3jJsuMJUozyIXDB3e793L8=" crossorigin="anonymous"></script>
    <script src="public/JavaScript/loadMoreCampaigns.js"></script>
    <script src="https://use.fontawesome.com/9366a1d005.js"></script>
</head>

<body>
    <?php require_once 'app/views/includes/topnav.php' ?>

    <main class="main-content" id="main-cont">

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
        <div class="centering-container">
            <button class="load-more shadow-button">Load More</button>
        </div>
        <input type="hidden" id="row" value="0">
        <input type="hidden" id="all" value="<?php echo $data['allcount']; ?>">

    </main>

    <?php require_once 'app/views/includes/footer.php' ?>

</body>

</html>