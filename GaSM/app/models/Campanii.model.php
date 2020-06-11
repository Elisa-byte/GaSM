<?php 
class CampaniiModel {

    public $campanii = [];

    public function __construct(array $details)
    {
        require "app/config/dbh.inc.php";
        $query = "select * from campanii order by date desc limit ".$details[1].",".$details[0];
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result)) {
            $irow = '';
            if ($row['imageId'] != 0 && $row['imageId'] != null) {
                $imgq = "select imageData from campanii_images where imageId = ".$row['imageId'];
                $iresult = mysqli_query($conn, $imgq);
                $tmp = mysqli_fetch_assoc($iresult);
                $irow = 'data:image;base64,'.base64_encode($tmp['imageData']);
            }
            else {
                $irow = 'public/img/campanie1.jpg';
            }

            array_push($this->campanii, (object)['nume' => $row['name'], 'descriere'=>$row['description'], 'imagine' => $irow]);
        }

        $conn->close();
    }
}