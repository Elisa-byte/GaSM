<?php

class CampanieModel {
    public $name = null;
    public $description;
    public $type;
    public $category;
    public $duration;
    public $begining;
    public $location;
    public $location_address;
    public $phone;
    public $email;
    public $event_date;
    public $image;

    function __construct($name)
    {

        require "app/config/dbh.inc.php";
        $query = "SELECT * FROM `campanii` WHERE REPLACE(lower(name), ' ', '-') = '$name'";
        if ($result1 = mysqli_query($conn, $query)) {
            if (mysqli_num_rows($result1) > 0) {
                $result = mysqli_fetch_assoc($result1);

                $this->name = $result['name'];
                $this->description = $result['description'];
                $this->type = $result['type'] == 1 ? 'Străngere de fonduri' : ($result['type'] == 2 ? 'Meeting' : 'Mesah');
                $this->category = $result['category'] == 1 ? 'Cetățeni' : ($result['category'] == 2 ? 'Personal autorizat' : 'Oricine');
                $this->duration = empty($result['duration']) ? '-' : $result['duration'];
                $this->begining = empty($result['begining']) ? '-' : $result['begining'];
                $this->location_address = empty($result['location_address']) ? '-' : $result['location_address'];
                $this->phone = $result['phone'];
                $this->email = $result['email'];
                $this->event_date = $result['event_date'];
    
    
                if ($result['imageId'] != 0 && $result['imageId'] != null) {
                    $imgq = "select imageData from campanii_images where imageId = ".$result['imageId'];
                    $iresult = mysqli_query($conn, $imgq);
                    $tmp = mysqli_fetch_assoc($iresult);
                    $this->image = 'data:image;base64,'.base64_encode($tmp['imageData']);
                }
                else {
                    $this->image = 'public/img/campanie1.jpg';
                }
    
    
                switch ($result['location']) {
                    case "42":
                        $this->location = "Alba";
                        break;
                    case "1":
                        $this->location = "Arad";
                        break;
                    case "2":
                        $this->location = "Arges";
                        break;
                    case "3":
                        $this->location = "Bacau";
                        break;
                    case "4":
                        $this->location = "Bihor";
                        break;
                    case "5":
                        $this->location = "Bistrita-Nasaud";
                        break;
                    case "6":
                        $this->location = "Botosani";
                        break;
                    case "7":
                        $this->location = "Braila";
                        break;
                    case "8":
                        $this->location = "Brasov";
                        break;
                    case "9":
                        $this->location = "BUCURESTI";
                        break;
                    case "10":
                        $this->location = "Buzau";
                        break;
                    case "11":
                        $this->location = "Calarasi";
                        break;
                    case "12":
                        $this->location = "Caras-Severin";
                        break;
                    case "13":
                        $this->location = "Cluj";
                        break;
                    case "14":
                        $this->location = "Constanta";
                        break;
                    case "15":
                        $this->location = "Covasna";
                        break;
                    case "16":
                        $this->location = "Dambovita";
                        break;
                    case "17":
                        $this->location = "Dolj";
                        break;
                    case "18":
                        $this->location = "Galati";
                        break;
                    case "19":
                        $this->location = "Giurgiu";
                        break;
                    case "20":
                        $this->location = "Gorj";
                        break;
                    case "21":
                        $this->location = "Harghita";
                        break;
                    case "22":
                        $this->location = "Hunedoara";
                        break;
                    case "23":
                        $this->location = "Ialomita";
                        break;
                    case "24":
                        $this->location = "Iasi";
                        break;
                    case "25":
                        $this->location = "Ilfov";
                        break;
                    case "26":
                        $this->location = "Maramures";
                        break;
                    case "27":
                        $this->location = "Mehedinti";
                        break;
                    case "28":
                        $this->location = "Mures";
                        break;
                    case "29":
                        $this->location = "Neamt";
                        break;
                    case "30":
                        $this->location = "Olt";
                        break;
                    case "31":
                        $this->location = "Prahova";
                        break;
                    case "32":
                        $this->location = "Salaj";
                        break;
                    case "33":
                        $this->location = "Satu Mare";
                        break;
                    case "34":
                        $this->location = "Sibiu";
                        break;
                    case "35":
                        $this->location = "Suceava";
                        break;
                    case "36":
                        $this->location = "Teleorman";
                        break;
                    case "37":
                        $this->location = "Timis";
                        break;
                    case "38":
                        $this->location = "Tulcea";
                        break;
                    case "39":
                        $this->location = "Valcea";
                        break;
                    case "40":
                        $this->location = "Vaslui";
                        break;
                    case "41":
                        $this->location = "Vrancea";
                        break;
                }
                $conn->close();
            }
           
        }      
    }

}