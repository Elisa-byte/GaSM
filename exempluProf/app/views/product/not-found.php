<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/app.css" />
    <title>Product not found</title>
</head>

<body class="not-found-page">
    <div>
        <h1> Oops... 😞 </h1>
        <h3>
            Looks like the product with id <span class="underline"><?php echo $data['productId']; ?></span> does not exist.

        </h3>
        
        <a href="/"> Navigate home </a>
    </div>
</body>

</html>