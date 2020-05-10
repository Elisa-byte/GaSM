<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <script src="/GaSM/JavaScript/viewPassword.js"></script>
    <title>Logheaza-te</title>
</head>

<body>
<?php
//        if(isset($_SESSION['userId'])){
//            echo '<p> V-ati logat!</p>';
//        }
//        else{
//            echo '<p> V-ati delogat!</p>';
//        }
?>
<div class="main-content">
    <div class="container-login">
        <div class="wrap-login">
            <?php
                $selector = $_GET["selector"];
                $validator= $_GET["validator"];

                if(empty($selector) || empty($validator)){
                    echo "Nu am putut sa validam cererea!";
                }else{
                    if(ctype_xdigit($selector) !==false && ctype_xdigit($validator) !== false){

                    }
                }
            ?>
            <form action="includes/reset-password.inc.php" method="post">
                <input type="hidden" name="selector" value="<?php echo $selector?>">
                <input type="hidden" name="validator" value="<?php echo $validator?>">
                <input type="password" name="pwd" placeholder="Noua parola..">
                <input type="password" name="pwd-repeat" placeholder="Repetati noua parola..">
                <button type="submit" name="reset-password-submit">Resetare parola</button>
            </form>

        </div>
    </div>
</div>
</body>

</html>
<?php
