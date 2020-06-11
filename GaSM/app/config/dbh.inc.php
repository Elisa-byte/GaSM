<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "gasm";//users

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("Conexiune esuata: " . mysqli_connect_error());
}
