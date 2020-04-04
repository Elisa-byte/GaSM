<?php

    $user = 'root';
    $pass = '';
    $db = 'Users';

    $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");

    echo "great work!";
?>