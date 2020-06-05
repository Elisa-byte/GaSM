<?php

if (isset($_POST['raport-submit'])) {

    require "dbh.inc.php";
    //declararea tuturor variabilelor din signup

    $observeIncident = $_POST['observeIncident'];// *
    $recognizePerson = $_POST['recognizePerson'];// *
    $typeLitter = $_POST['typeLitter'];// *
    $quantity = $_POST['quantity'];// *
    $companyName = $_POST['companyName'];
    $carType = $_POST['carType'];
    $licensePlate = $_POST['licensePlate'];
    $colorCar = $_POST['colorCar'];
    $modelCar = $_POST['modelCar'];
    $judet = $_POST['judet'];// *
    $localitate = $_POST['localitate'];// *
    $street = $_POST['street'];// *
    $dateReport = $_POST['dateReport'];// *
    $details = $_POST['details'];
    $imageReport = $_POST['imageReport'];

    if (empty($observeIncident)) {
        header("Location: ../form-raport.php?error=emptyObserve&recognizePerson=" . $recognizePerson . "&typeLitter=" . $typeLitter . "&quantity=" . $quantity . "&judet=" . $judet . "&localitate=" . $localitate . "&street=" . $street . "&dateReport=" . $dateReport);
        exit();
    } else if (empty($recognizePerson)) {
        header("Location: ../form-raport.php?error=emptyRecognize&observerIncident=" . $observeIncident . "&typeLitter=" . $typeLitter . "&quantity=" . $quantity . "&judet=" . $judet . "&localitate=" . $localitate . "&street=" . $street . "&dateReport=" . $dateReport);
        exit();
    } else if (empty($typeLitter)) {
        header("Location: ../form-raport.php?error=emptyType&observerIncident=" . $observeIncident . "&recognizePerson=" . $recognizePerson . "&quantity=" . $quantity . "&judet=" . $judet . "&localitate=" . $localitate . "&street=" . $street . "&dateReport=" . $dateReport);
        exit();
    } else if (empty($quantity)) {
        header("Location: ../form-raport.php?error=emptyQuantity&observerIncident=" . $observeIncident . "&recognizePerson=" . $recognizePerson . "&typeLitter=" . $typeLitter . "&judet=" . $judet . "&localitate=" . $localitate . "&street=" . $street . "&dateReport=" . $dateReport);
        exit();
    } else if (empty($judet)) {
        header("Location: ../form-raport.php?error=emptyJudet&observerIncident=" . $observeIncident . "&recognizePerson=" . $recognizePerson . "&typeLitter=" . $typeLitter . "&quantity=" . $quantity . "&localitate=" . $localitate . "&street=" . $street . "&dateReport=" . $dateReport);
        exit();
    } else if (!preg_match("/^[A-Za-z ]+$/", $localitate)) {
        header("Location: ../form-raport.php?error=emptyLocalitate&observerIncident=" . $observeIncident . "&recognizePerson=" . $recognizePerson . "&typeLitter=" . $typeLitter . "&quantity=" . $quantity . "&judet=" . $judet . "&street=" . $street . "&dateReport=" . $dateReport);
        exit();
    } else if (!preg_match("/^[A-Za-z ]+$/", $street)) {
        header("Location: ../form-raport.php?error=emptyStreet&observerIncident=" . $observeIncident . "&recognizePerson=" . $recognizePerson . "&typeLitter=" . $typeLitter . "&quantity=" . $quantity . "&judet=" . $judet . "&dateReport=" . $dateReport);
        exit();
    } else if (empty($dateReport)) {
        header("Location: ../form-raport.php?error=emptyDate&observerIncident=" . $observeIncident . "&recognizePerson=" . $recognizePerson . "&typeLitter=" . $typeLitter . "&quantity=" . $quantity . "&judet=" . $judet . "&localitate=" . $localitate . "&street=" . $street);
        exit();
    } else {
        $sql = "INSERT INTO gasm.report(obsIncReport, recogPersReport, typeLiReport, quantityReport, companyReport, carTypeReport, licensePlateReport,carModelReport, carColorReport,judetReport, localitateReport, streetReport,dateReport, detailsReport, imageReport) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt == false) {
            // just for debugging for now:
            die("<pre>Prepare failed:\n" . mysqli_error($conn) . "\n$sql </pre>");
        }
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../form-raport.php?error=sqlerror");
                    exit();
                }
        else {
            mysqli_stmt_bind_param($stmt, "ssssssssssssssb", $observeIncident, $recognizePerson, $typeLitter, $quantity, $companyName, $carType, $licensePlate, $modelCar, $colorCar, $judet, $localitate, $street, $dateReport, $details, $imageReport);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../index.php");
            exit();
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}
else{
    header("Location: ../form-raport.php");
    exit();
}