<?php
$file = $_FILES['file'];
$name_pic = $_POST['profileImage'];

$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg', 'jpeg', 'png');

if(in_array($fileActualExt, $allowed)){
    if($fileError === 0){
        if($fileSize < 1000000){
            $fileNameNew = "profile".$idUsers.".".$fileActualExt;
            $fileDestination = '../images/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);

            $sql = "UPDATE gasm.usersv2 SET profileUsers=? WHERE idUsers=?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../account-settings.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "si", $fileNameNew, $idUsers);
                mysqli_stmt_execute($stmt);
            }
            header("Location: account-settings?uploadsuccess");
        }else{
            echo "Fisier prea mare!";
        }
    }else {
        echo "Eroare la incarcare imagine!";
    }
} else{
    echo "Nu puteti incarca acest tip de fisier!";
}