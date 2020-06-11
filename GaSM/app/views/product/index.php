<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/app.css" />
    <title><?php echo $data['product'] -> name; ?> | Product page</title>
</head>
<body class="product-page">
    <header>
        <a href="/"> Home </a>
        <h1> <?php echo $data['product'] -> name; ?> </h1>
    </header>
    <main>
        <img src="<?php echo $data['product'] -> image ?>" alt="<?php echo $data['product'] -> name?> picture"/>
        <h3> Only <?php echo $data['product'] -> stock ?> left in stock </h3>
    </main>
</body>
</html>