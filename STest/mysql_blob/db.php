<?php 
// $conn = mysqli_connect("localhost", "root", "test", "blog_samples");
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "gasm";//users

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("Conexiune esuata: " . mysqli_connect_error());
}
?>