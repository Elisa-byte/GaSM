<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info</title>
    <base href = "<?php echo $base_location ?>" />
    <link rel="stylesheet" href="public/stylesheets/styles.css">

    <script src="https://use.fontawesome.com/9366a1d005.js"></script>
    <script src="public/JavaScript/disableScroll.js"></script>
</head>

<body>


  <?php require_once 'app/views/includes/topnav.php' ?> 

    <main class="main-content" id="main-cont">
        <p class="center-text" style="height: 70vh;font-weight: 700; font-size: 2em;"><?php echo $data['message']; ?></p>
    </main>

 <?php require_once 'app/views/includes/footer.php'?>

</body>

</html>