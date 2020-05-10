<?php
    require  "header.php";
?>

<main>
    <?php
        if(isset($_SESSION['userId'])){
            echo '<p> V-ati logat!</p>';
        }
        else{
            echo '<p> V-ati delogat!</p>';
        }
    ?>
</main>

<?php
    require "footer.php"
?>
