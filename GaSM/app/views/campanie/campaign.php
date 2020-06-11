<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['campanie']->name ?> | O campanie GaSM</title>
    <base href="<?php echo $base_location ?>" />
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
                <h1><?php echo $data['campanie']->name ?></h1>
                <p>
                    <?php echo $data['campanie']->description ?> 
                </p>
            </div>
        </section>
        <h2 class="center-text">Detalii</h2>
        <hr class="divider">
        <section>

            <div>
                <h3>Locație:</h3>
                <div style="display: flex; justify-content: center;"><img class="max-width" src="<?php echo $data['campanie']->image ?>"></div>
                

            </div>
            <div class="campaign-details">
                <div id="table-container">

                    <table class="campaign-info spacing">
                        <tr>
                            <td>Data evenimentului:</td>
                            <td><?php echo $data['campanie']->event_date; ?></td>
                        </tr>
                        <tr>
                            <td>Durată:</td>
                            <td><?php echo $data['campanie']->duration; ?></td>
                        </tr>
                        <tr>
                            <td>Ora la care începe:</td>
                            <td><?php echo $data['campanie']->begining; ?></td>
                        </tr>
                        <tr>
                            <td>Ora:</td>
                            <td><?php echo $data['campanie']->begining; ?></td>
                        </tr>
                        <tr>
                            <td>Tipul campaniei:</td>
                            <td> <?php echo $data['campanie']->type; ?></td>
                        </tr>
                        <tr>
                            <td>Categorie:</td>
                            <td><?php echo $data['campanie']->category; ?></td>
                        </tr>
                        <tr>
                            <td>Locație:</td>
                            <td><?php echo $data['campanie']->location; ?></td>
                        </tr>
                        <tr>
                            <td>Adresa locației:</td>
                            <td><?php echo $data['campanie']->location_address; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="contact-details">
                    <h3 class="center-text">Detalii contact</h3>
                    <p>📧 Email: <?php echo $data['campanie']->phone; ?></p>
                    <p>📱 Phone: <?php echo $data['campanie']->email; ?></p>
                </div>
            </div>

        </section>

    </main>

    <?php require_once 'app/views/includes/footer.php' ?>

</body>

</html>