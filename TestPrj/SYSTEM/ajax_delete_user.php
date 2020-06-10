<?php
if (!empty($_POST['id'])) {

    // Include the database configuration file
    include 'includes/dbh.inc.php';

    $query = $conn->query("DELETE FROM gasm.usersv2 WHERE idUsers=" . $_POST['id']);
    $result = $conn->query("DELETE FROM gasm.usersv2 WHERE idUsers=" . $_POST['id']) or die($conn->error);

}
