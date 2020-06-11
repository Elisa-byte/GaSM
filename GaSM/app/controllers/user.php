<?php
class User extends Controller
{
    public function accountSettings()
    { // $stock = $this->model('Stock');
        if (isset($_SESSION['userId'])) {
            $currentUser = $this->model('User', array($_SESSION['userId']));
            $this->view('user/accountSettings', ['currentUser' => $currentUser]);
        } else $this->view('user/info', ['message' => 'Nu sunteți logat! Click <a href="home/login" style="color: #32b7f0">aici</a> pentru a vă înregistra!']);
    }

    public function formularCampanie()
    {
        if (isset($_SESSION['userId'])) {
            $this->view('user/formularCampanie', '');
        } else $this->view('user/info', ['message' => 'Nu sunteți logat! Click <a href="home/login" style="color: #32b7f0">aici</a> pentru a vă înregistra!']);
    }


    public function formularRaportare()
    {
        if (isset($_SESSION['userId'])) {
            $this->view('user/formularRaportare', '');
        } else $this->view('user/info', ['message' => 'Nu sunteți logat! Click <a href="home/login" style="color: #32b7f0">aici</a> pentru a vă înregistra!']);
    }

    public function verificareFormularCampanie()
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
        if (!empty($_POST["duration"])) {
            $duration = $_POST['duration'];
            $DURATION = $duration;
        } else {
            $duration = "-";
            $DURATION = "";
        }
        if (!empty($_POST["begining"])) {
            $begining = $_POST['begining'];
            $BEGINING = $begining;
        } else {
            $begining = "-";
            $BEGINING = "";
        }
        if (!empty($_POST["hour"])) {
            $HOUR = $_POST["hour"];
            if ($_POST["hour"] == 1) {
                $hour = "AM";
            } else {
                $hour = "PM";
            }
        } else {
            $hour = "-";
            $HOUR = "";
        }
        $TYPE = $_POST["type"];
        if ($_POST['type'] == 1) {
            $type = "Strangere de fonduri";
        } else {
            if ($_POST["type"] == 2) {
                $type = "Meeting";
            } else {
                $type = "Mesaj";
            }
        }
        $CATEGORY = $_POST['category'];
        if ($_POST['category'] == 1) {
            $category = "Cetateni";
        } else {
            if ($_POST["category"] == 2) {
                $category = "Personal autorizat";
            } else {
                $category = "Oricine";
            }
        }
        if (!empty($_POST["location"])) {
            switch ($_POST['location']) {
                case "42":
                    $location = "Alba";
                    break;
                case "1":
                    $location = "Arad";
                    break;
                case "2":
                    $location = "Arges";
                    break;
                case "3":
                    $location = "Bacau";
                    break;
                case "4":
                    $location = "Bihor";
                    break;
                case "5":
                    $location = "Bistrita-Nasaud";
                    break;
                case "6":
                    $location = "Botosani";
                    break;
                case "7":
                    $location = "Braila";
                    break;
                case "8":
                    $location = "Brasov";
                    break;
                case "9":
                    $location = "BUCURESTI";
                    break;
                case "10":
                    $location = "Buzau";
                    break;
                case "11":
                    $location = "Calarasi";
                    break;
                case "12":
                    $location = "Caras-Severin";
                    break;
                case "13":
                    $location = "Cluj";
                    break;
                case "14":
                    $location = "Constanta";
                    break;
                case "15":
                    $location = "Covasna";
                    break;
                case "16":
                    $location = "Dambovita";
                    break;
                case "17":
                    $location = "Dolj";
                    break;
                case "18":
                    $location = "Galati";
                    break;
                case "19":
                    $location = "Giurgiu";
                    break;
                case "20":
                    $location = "Gorj";
                    break;
                case "21":
                    $location = "Harghita";
                    break;
                case "22":
                    $location = "Hunedoara";
                    break;
                case "23":
                    $location = "Ialomita";
                    break;
                case "24":
                    $location = "Iasi";
                    break;
                case "25":
                    $location = "Ilfov";
                    break;
                case "26":
                    $location = "Maramures";
                    break;
                case "27":
                    $location = "Mehedinti";
                    break;
                case "28":
                    $location = "Mures";
                    break;
                case "29":
                    $location = "Neamt";
                    break;
                case "30":
                    $location = "Olt";
                    break;
                case "31":
                    $location = "Prahova";
                    break;
                case "32":
                    $location = "Salaj";
                    break;
                case "33":
                    $location = "Satu Mare";
                    break;
                case "34":
                    $location = "Sibiu";
                    break;
                case "35":
                    $location = "Suceava";
                    break;
                case "36":
                    $location = "Teleorman";
                    break;
                case "37":
                    $location = "Timis";
                    break;
                case "38":
                    $location = "Tulcea";
                    break;
                case "39":
                    $location = "Valcea";
                    break;
                case "40":
                    $location = "Vaslui";
                    break;
                case "41":
                    $location = "Vrancea";
                    break;
            }
            $LOCATION = $_POST['location'];
        } else {
            $location = "-";
            $LOCATION = "";
        }
        if (!empty($_POST["location-address"])) {
            $location_address = $_POST['location-address'];
            $LOCATION_ADDRESS = $location_address;
        } else {
            $location_address = "-";
            $LOCATION_ADDRESS = "";
        }
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        if (!empty($_POST["event-date"])) {
            $event_date = $_POST["event-date"];
            $EVENT_DATE = $event_date;
        } else {
            $event_date = "-";
            $EVENT_DATE = "";
        }

        // require_once('includes/formularCampanie.inc.php');
        if (!empty($_FILES)) {
            $IM = "YES";
        } else {
            $IM = "NO";
        }

        require_once "app/config/dbh.inc.php";
        $current_id = "";
        if (!empty($_FILES)) {
            if (count($_FILES) > 0) {
                if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
                    // require_once "dbh.inc.php";
                    $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
                    $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);

                    $sql = "INSERT INTO campanii_images(imageType ,imageData)
                        VALUES('{$imageProperties['mime']}', '{$imgData}')";
                    $runQuery = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
                    $runQuery = mysqli_query($conn, 'Select max(imageId) as id from campanii_images');
                    $current_id = mysqli_fetch_assoc($runQuery)['id'];
                }
            }
        }

        mysqli_close($conn);


        $this->view('user/verificareFormularCampanie', ['name' => $name, 'description' => $description, 'event_date' => $event_date, 'duration' => $duration, 'begining' => $begining, 'hour' => $hour, 'type' => $type, 'category' => $category, 'location' => $location, 'location_address' => $location_address, 'IM' => $IM, 'phone' => $phone, 'email' => $email, 'event_datedb' => $EVENT_DATE, 'durationdb' => $DURATION, 'beginingdb' => $BEGINING, 'hourdb' => $HOUR, 'typedb' => $TYPE, 'categorydb' => $CATEGORY, 'locationdb' => $LOCATION, 'location_addressdb' => $LOCATION_ADDRESS, 'current_id' => $current_id]);
    }

    public function profile()
    {
        if (isset($_SESSION['userId'])) {
            $currentUser = $this->model('User', [$_SESSION['userId']]);
            $this->view('user/profile', ['currentUser' => $currentUser]);
        } else $this->view('user/info', ['message' => 'Nu sunteți logat! Click <a href="home/login" style="color: #32b7f0">aici</a> pentru a vă înregistra!']);
    }

    public function createNewCampaign()
    {
        require "app/config/dbh.inc.php";
        $name = $_GET['name'];
        $description =  $_GET['description'];
        $type = $_GET['type'];
        $category =  $_GET['category'];
        $begining = $_GET['begining'];
        $duration =  $_GET['duration'];
        $hour = $_GET['hour'];
        $location = $_GET['location'];
        $location_address = $_GET['location_address'];
        $phone = $_GET['phone'];
        $email = $_GET['email'];
        $event_date = $_GET['event_date'];
        $imageId = $_GET['imageId'];
        $date = (new \DateTime())->format('Y-m-d H:i:s');
        $sql = "INSERT INTO campanii (name, description, type, category, duration, begining, hour, 
        location, location_address, phone, email, date, event_date, imageId)
        VALUES ('$name',
        '$description',
        '$type',
        '$category','$duration','$begining','$hour',
        '$location','$location_address','$phone','$email','$date','$event_date','$imageId')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            if (strstr($conn->error, 'Duplicate')) {
                echo "Numele campaniei coincide cu alt nume de campanie,va rugam sa introduceti altul!";
            } else
                echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    public function signUpUser()
    {
        if (isset($_POST['signup-submit'])) {

            require_once "app/config/dbh.inc.php";
            //declararea tuturor variabilelor din signup

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $phone = $_POST['phone'];
            $mail  = $_POST['mail'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordRepeat = $_POST['password-repeat'];
            $category = $_POST['category'];
            $location = $_POST['location'];

            //echo $_POST["fname"] . $_POST["lname"] . $_POST["phone"] . $_POST["mail"] . $_POST["username"] . $_POST["password"] . $_POST["category"] . $_POST["location"];

            if (empty($fname) || empty($lname) || empty($phone) || empty($mail) || empty($username) || empty($password) || empty($passwordRepeat) || empty($category) || empty($location)) {
                // header("Location: ../signup.php?error=emptyfields&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
                $this->view('home/signup', ['error' => 'emptyfields']);
                exit();
            } //"/^[A-Za-z]+$/u ")
            else if (!preg_match("/^[A-Za-z]+$/", $fname)) {
                // header("Location: ../signup.php?error=invalidfname&lname=".$lname."&phone=".$phone."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
                $this->view('home/signup', ['error' => 'invalidfname']);
                exit();
            } else if (!preg_match("/^[A-Za-z]+$/", $lname)) {
                // header("Location: ../signup.php?error=invalidlname&fname=".$fname."&phone=".$phone."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
                $this->view('home/signup', ['error' => 'invalidlname']);
                exit();
            } else if (!preg_match("/^(\+4|)?(07[0-8]{1}[0-9]{1}|02[0-9]{2}|03[0-9]{2}){1}?(\s|\.|\-)?([0-9]{3}(\s|\.|\-|)){2}$/", $phone)) {
                // header("Location: ../signup.php?error=invalidphone&fname=".$fname."&lname=".$lname."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
                $this->view('home/signup', ['error' => 'invalidphone']);
                exit();
            } else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                // header("Location: ../signup.php?error=invalidmail&fname=".$fname."&lname=".$lname."&phone=".$phone."&username=".$username."&category=".$category."&location=".$location);
                $this->view('home/signup', ['error' => 'invalidmail']);
                exit();
            } else if (!filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/.{8,25}/")))) {
                // header("Location: ../signup.php?error=invalidpwd&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
                $this->view('home/signup', ['error' => 'invalidpwd']);
                exit();
            } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                // header("Location: ../signup.php?error=invalidusername&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&category=".$category."&location=".$location);
                $this->view('home/signup', ['error' => 'invalidusername']);
                exit();
            } else if (strlen(trim($_POST["password"])) < 8) {
                // header("Location: ../signup.php?error=pwdTooSmall&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&category=".$category."&location=".$location);
                $this->view('home/signup', ['error' => 'pwdTooSmall']);
                exit();
            } else if ($password !== $passwordRepeat) {
                // header("Location: ../signup.php?error=passwordCheck&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
                $this->view('home/signup', ['error' => 'passwordCheck']);
                exit();
            } else {
                $sql = "SELECT uidUsers FROM gasm.usersv2 WHERE uidUsers=?;";

                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    // header("Location: ../signup.php?error=sqlerror");
                    $this->view('home/signup', ['error' => 'sqlerror']);
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $username);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $resultCheck = mysqli_stmt_num_rows($stmt);
                    if ($resultCheck > 0) {
                        // header("Location: ../signup.php?error=usertaken&mail=".$mail);//nu am mai pus toate datele
                        $this->view('home/signup', ['error' => 'usertaken']);
                        exit();
                    } else {
                        $sql = "INSERT INTO gasm.usersv2(uidUsers, fnUsers, lnUsers, emailUsers, pwdUsers, phnUsers, categoryUsers, locationUsers) VALUES (?,?,?,?,?,?,?,?);";
                        $stmt = mysqli_prepare($conn, $sql);
                        if ($stmt == false) {
                            // just for debugging for now:
                            die("<pre>Prepare failed:\n" . mysqli_error($conn) . "\n$sql </pre>");
                        }
                        //                $stmt = mysqli_stmt_init($conn);
                        //                if(!mysqli_stmt_prepare($stmt, $sql)){
                        //                    header("Location: ../signup.php?error=sqlerror");
                        //                    exit();
                        //                }
                        else {
                            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                            mysqli_stmt_bind_param($stmt, "sssssiss", $username, $fname, $lname, $mail, $hashedPwd, $phone, $category, $location);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);
                            // header("Location: ../login.php");
                            $this->view('home/login', '');
                            exit();
                        }
                    }
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        } else {
            // header("Location: ../signup.php");
            $this->view('home/signup', '');
            exit();
        }
    }

    public function checkUser()
    {

        if (isset($_POST['log-in-submit'])) {
            require_once "app/config/dbh.inc.php";
            $uidmail = $_POST['uidmail'];

            $password_login = $_POST['password_login'];
            if (empty($uidmail) || empty($password_login)) {
                $this->view('home/login', ['error' => 'emptyfields']);
                exit();
            } else {
                $sql = "SELECT * FROM gasm.usersv2 WHERE uidUsers=? OR emailUsers=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    die("<pre>Prepare failed:\n" . mysqli_error($conn) . "\n$sql</pre>");
                } else {
                    mysqli_stmt_bind_param($stmt, "ss", $uidmail, $uidmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if ($row = mysqli_fetch_assoc($result)) {
                        $pwdCheck = password_verify($password_login, $row['pwdUsers']);
                        if ($pwdCheck == false) {
                            $this->view('home/login', ['error' => 'wrongpwd']);
                            exit();
                        } else if ($pwdCheck == true) {
                            // session_start();
                            $_SESSION['userId'] = $row['idUsers'];
                            $_SESSION['userUid'] = $row['uidUsers'];
                            $this->view('user/info', ['message' => 'Ați fost logat cu success!']);
                            exit();
                        } else {
                            $this->view('home/login', ['error' => 'wrongpwd']);
                            exit();
                        }
                    } else {
                        $this->view('home/login', ['error' => 'nouser']);
                        exit();
                    }
                }
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
            }
        } else {
            $this->view('home/index', '');
            exit();
        }
    }

    public function sendReport()
    {
        if (isset($_POST['raport-submit'])) {

            require_once "app/config/dbh.inc.php";
            //declararea tuturor variabilelor din signup

            $observeIncident = isset($_POST['observeIncident']) ? $_POST['observeIncident'] : null; // *
            $recognizePerson = isset($_POST['recognizePerson']) ? $_POST['recognizePerson'] : null; // *
            $typeLitter = isset($_POST['typeLitter']) ? $_POST['typeLitter'] : null; // *
            $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : null; // *
            $companyName = isset($_POST['companyName']) ? $_POST['companyName'] : null;
            $carType = isset($_POST['carType']) ? $_POST['carType'] : null;
            $licensePlate = isset($_POST['licensePlate']) ? $_POST['licensePlate'] : null;
            $colorCar = isset($_POST['colorCar']) ? $_POST['colorCar'] : null;
            $modelCar = isset($_POST['modelCar']) ? $_POST['modelCar'] : null;
            $judet = isset($_POST['judet']) ? $_POST['judet'] : null; // *
            $localitate = isset($_POST['localitate']) ? $_POST['localitate'] : null; // *
            $street = isset($_POST['street']) ? $_POST['street'] : null; // *
            $dateReport = isset($_POST['dateReport']) ? $_POST['dateReport'] : null; // *
            $details = isset($_POST['details']) ? $_POST['details'] : null;
            $imageReport = isset($_POST['imageReport']) ? $_POST['imageReport'] : null;

            if (empty($observeIncident)) {
                // header("Location: ../form-raport.php?error=emptyObserve&recognizePerson=" . $recognizePerson . "&typeLitter=" . $typeLitter . "&quantity=" . $quantity . "&judet=" . $judet . "&localitate=" . $localitate . "&street=" . $street . "&dateReport=" . $dateReport);
                $this->view('user/formularRaportare', ['error' => 'emptyObserve']);
                exit();
            } else if (empty($recognizePerson)) {
                // header("Location: ../form-raport.php?error=emptyRecognize&observerIncident=" . $observeIncident . "&typeLitter=" . $typeLitter . "&quantity=" . $quantity . "&judet=" . $judet . "&localitate=" . $localitate . "&street=" . $street . "&dateReport=" . $dateReport);
                $this->view('user/formularRaportare', ['error' => 'emptyRecognize']);

                exit();
            } else if (empty($typeLitter)) {
                // header("Location: ../form-raport.php?error=emptyType&observerIncident=" . $observeIncident . "&recognizePerson=" . $recognizePerson . "&quantity=" . $quantity . "&judet=" . $judet . "&localitate=" . $localitate . "&street=" . $street . "&dateReport=" . $dateReport);
                $this->view('user/formularRaportare', ['error' => 'emptyType']);
                exit();
            } else if (empty($quantity)) {
                // header("Location: ../form-raport.php?error=emptyQuantity&observerIncident=" . $observeIncident . "&recognizePerson=" . $recognizePerson . "&typeLitter=" . $typeLitter . "&judet=" . $judet . "&localitate=" . $localitate . "&street=" . $street . "&dateReport=" . $dateReport);
                $this->view('user/formularRaportare', ['error' => 'emptyQuantity']);
                exit();
            } else if (empty($judet)) {
                // header("Location: ../form-raport.php?error=emptyJudet&observerIncident=" . $observeIncident . "&recognizePerson=" . $recognizePerson . "&typeLitter=" . $typeLitter . "&quantity=" . $quantity . "&localitate=" . $localitate . "&street=" . $street . "&dateReport=" . $dateReport);
                $this->view('user/formularRaportare', ['error' => 'emptyJudet']);
                exit();
            } else if (!preg_match("/^[A-Za-z ]+$/", $localitate)) {
                // header("Location: ../form-raport.php?error=emptyLocalitate&observerIncident=" . $observeIncident . "&recognizePerson=" . $recognizePerson . "&typeLitter=" . $typeLitter . "&quantity=" . $quantity . "&judet=" . $judet . "&street=" . $street . "&dateReport=" . $dateReport);
                $this->view('user/formularRaportare', ['error' => 'emptyLocalitate']);
                exit();
            } else if (!preg_match("/^[A-Za-z ]+$/", $street)) {
                // header("Location: ../form-raport.php?error=emptyStreet&observerIncident=" . $observeIncident . "&recognizePerson=" . $recognizePerson . "&typeLitter=" . $typeLitter . "&quantity=" . $quantity . "&judet=" . $judet . "&dateReport=" . $dateReport);
                $this->view('user/formularRaportare', ['error' => 'emptyStreet']);
                exit();
            } else if (empty($dateReport)) {
                // header("Location: ../form-raport.php?error=emptyDate&observerIncident=" . $observeIncident . "&recognizePerson=" . $recognizePerson . "&typeLitter=" . $typeLitter . "&quantity=" . $quantity . "&judet=" . $judet . "&localitate=" . $localitate . "&street=" . $street);
                $this->view('user/formularRaportare', ['error' => 'emptyDate']);
                exit();
            } else {
                $sql = "INSERT INTO gasm.report(obsIncReport, recogPersReport, typeLiReport, quantityReport, companyReport, carTypeReport, licensePlateReport,carModelReport, carColorReport,judetReport, localitateReport, streetReport,dateReport, detailsReport, imageReport) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
                $stmt = mysqli_prepare($conn, $sql);
                if ($stmt == false) {
                    // just for debugging for now:
                    die("<pre>Prepare failed:\n" . mysqli_error($conn) . "\n$sql </pre>");
                }
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    // header("Location: ../form-raport.php?error=sqlerror");
                    $this->view('user/formularRaportare', ['error' => 'sqlerror']);
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ssssssssssssssb", $observeIncident, $recognizePerson, $typeLitter, $quantity, $companyName, $carType, $licensePlate, $modelCar, $colorCar, $judet, $localitate, $street, $dateReport, $details, $imageReport);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);


                    if ($_FILES['img']['tmp_name'] != null) {
                        $tmpname = $_FILES['img']['tmp_name'];
                        $tmp = addslashes(file_get_contents($tmpname));
                        $lastIdReport = "Select idReport from gasm.report where rownum <=1 order by idReport desc;";
                        mysqli_stmt_prepare($stmt, $lastIdReport);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_store_result($stmt);
                        print_r($result);
                        $sql = "update gasm.report set imageReport='$tmp' where idReport='$result';";
                        mysqli_stmt_prepare($stmt, $sql);
                        mysqli_stmt_execute($stmt);
                    }
                    //header("Location: ../index.php");
                }
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                $this->view('user/info', ['message' => 'Formularul a fost Înregistrat. Vă mulțumim!']);
            }
        } else {
            // header("Location: ../form-raport.php");
            $this->view('user/formularRaportare', '');
            exit();
        }
    }

    public function sendCampanie()
    {
    }


    public function newCampaign()
    {
        require "app/config/dbh.inc.php";
        $name = $_GET['name'];
        $description =  $_GET['description'];
        $type = $_GET['type'];
        $category =  $_GET['category'];
        $begining = $_GET['begining'];
        $duration =  $_GET['duration'];
        $hour = $_GET['hour'];
        $location = $_GET['location'];
        $location_address = $_GET['location_address'];
        $phone = $_GET['phone'];
        $email = $_GET['email'];
        $event_date = $_GET['event_date'];
        $imageId = $_GET['imageId'];
        $date = (new \DateTime())->format('Y-m-d H:i:s');
        $sql = "INSERT INTO campanii (name, description, type, category, duration, begining, hour, 
        location, location_address, phone, email, date, event_date, imageId)
        VALUES ('$name',
        '$description',
        '$type',
        '$category','$duration','$begining','$hour',
        '$location','$location_address','$phone','$email','$date','$event_date','$imageId')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            if (strstr($conn->error, 'Duplicate')) {
                echo "Numele campaniei coincide cu alt nume de campanie,va rugam sa introduceti altul!";
            } else
                echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }


    public function manageUserSettings()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $currentUser = $this->model('User', [$_SESSION['userId']]);
        if (isset($_POST['as-submit'])) {
            require "app/config/dbh.inc.php";
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $phone = $_POST['phone'];
            $mail = $_POST['mail'];
            $username = $_POST['username'];
            $location = "";
            $category = "";
            //    $category = $_POST['category'];
            //    $location = $_POST['location'];

            $idUsers = $_SESSION['userId'];
            $stmt = mysqli_stmt_init($conn);
            if (empty($fname) != 1) {
                if (!preg_match("/^[A-Za-z]+$/", $fname)) {
                    // header("Location: ../account-settings.php?error=invalidfname&lname=" . $lname . "&phone=" . $phone . "&mail=" . $mail . "&username=" . $username . "&category=" . $category . "&location=" . $location);
                    $this->view('user/accountSettings', ['error' => 'invalidfname', 'currentUser' => $currentUser]);
                    exit();
                } else {
                    $sql = "UPDATE gasm.usersv2 SET fnUsers=? WHERE idUsers=?;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        // header("Location: ../account-settings.php?error=sqlerror");
                        $this->view('user/accountSettings', ['error' => 'sqlerror', 'currentUser' => $currentUser]);
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "si", $fname, $idUsers);
                        mysqli_stmt_execute($stmt);
                        $currentUser->fname = $fname;
                    }
                }
            }
            if (empty($lname) != 1) {
                if (!preg_match("/^[A-Za-z]+$/", $lname)) {
                    // header("Location: ../account-settings.php?error=invalidlname&fname=" . $fname . "&phone=" . $phone . "&mail=" . $mail . "&username=" . $username . "&category=" . $category . "&location=" . $location);
                    $this->view('user/accountSettings', ['error' => 'invalidlname', 'currentUser' => $currentUser]);
                    exit();
                } else {
                    $sql = "UPDATE gasm.usersv2 SET lnUsers=? WHERE idUsers=?;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        // header("Location: ../account-settings.php?error=sqlerror");
                        $this->view('user/accountSettings', ['error' => 'sqlerror', 'currentUser' => $currentUser]);
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "si", $lname, $idUsers);
                        mysqli_stmt_execute($stmt);
                        $currentUser->lname = $lname;
                    }
                }
            }
            if (empty($phone) != 1) {
                if (!preg_match("/^(\+4|)?(07[0-8]{1}[0-9]{1}|02[0-9]{2}|03[0-9]{2}){1}?(\s|\.|\-)?([0-9]{3}(\s|\.|\-|)){2}$/", $phone)) {
                    // header("Location: ../account-settings.php?error=invalidphone&fname=" . $fname . "&lname=" . $lname . "&mail=" . $mail . "&username=" . $username . "&category=" . $category . "&location=" . $location);
                    $this->view('user/accountSettings', ['error' => 'invalidphone', 'currentUser' => $currentUser]);
                    exit();
                } else {
                    $sql = "UPDATE gasm.usersv2 SET phnUsers=? WHERE idUsers=?;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        // header("Location: ../account-settings.php?error=sqlerror");
                        $this->view('user/accountSettings', ['error' => 'sqlerror', 'currentUser' => $currentUser]);
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "si", $phone, $idUsers);
                        mysqli_stmt_execute($stmt);
                        $currentUser->phone = $phone;
                    }
                }
            }
            if (empty($mail) != 1) {
                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    // header("Location: ../account-settings.php?error=invalidmail&fname=" . $fname . "&lname=" . $lname . "&phone=" . $phone . "&username=" . $username . "&category=" . $category . "&location=" . $location);
                    $this->view('user/accountSettings', ['error' => 'invalidmail', 'currentUser' => $currentUser]);
                    exit();
                } else {
                    $sql = "UPDATE gasm.usersv2 SET emailUsers=? WHERE idUsers=?;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        // header("Location: ../account-settings.php?error=sqlerror");
                        $this->view('user/accountSettings', ['error' => 'sqlerror', 'currentUser' => $currentUser]);

                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "si", $mail, $idUsers);
                        mysqli_stmt_execute($stmt);
                        $currentUser->mail = $mail;
                    }
                }
            }
            if (empty($username) != 1) {
                if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                    // header("Location: ../account-settings.php?error=invalidusername&fname=" . $fname . "&lname=" . $lname . "&phone=" . $phone . "&mail=" . $mail . "&category=" . $category . "&location=" . $location);
                    $this->view('user/accountSettings', ['error' => 'invalidusername', 'currentUser' => $currentUser]);
                    exit();
                } else {
                    $sql = "UPDATE gasm.usersv2 SET uidUsers=? WHERE idUsers=?;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        // header("Location: ../account-settings.php?error=sqlerror");
                        $this->view('user/accountSettings', ['error' => 'sqlerror', 'currentUser' => $currentUser]);
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "si", $username, $idUsers);
                        mysqli_stmt_execute($stmt);
                        $currentUser->username = $username;
                    }
                }
            }
            if (empty($location) != 1) {
                $sql = "UPDATE gasm.usersv2 SET locationUsers=? WHERE idUsers=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    // header("Location: ../account-settings.php?error=sqlerror");
                    $this->view('user/accountSettings', ['error' => 'sqlerror', 'currentUser' => $currentUser]);

                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "si", $location, $idUsers);
                    mysqli_stmt_execute($stmt);
                    $currentUser->location = $location;
                }
            }
            if (empty($location) != 1) {
                $sql = "UPDATE gasm.usersv2 SET categoryUsers=? WHERE idUsers=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    // header("Location: ../account-settings.php?error=sqlerror");
                    $this->view('user/accountSettings', ['error' => 'sqlerror', 'currentUser' => $currentUser]);

                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "si", $category, $idUsers);
                    mysqli_stmt_execute($stmt);
                    $currentUser->category = $category;
                }
            }

            if ($_FILES['img']['name'] != null && $_FILES['img']['tmp_name'] != null) {
                $stmt = mysqli_stmt_init($conn);
                $tmpname = $_FILES['img']['tmp_name'];
                $tmp = addslashes(file_get_contents($tmpname));
                $sql = "update gasm.usersv2 set profileUsers='$tmp' where idusers='$idUsers';";
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_execute($stmt);


                $getUserInfo = "SELECT profileUsers FROM gasm.usersv2 WHERE idUsers='$idUsers';";
                if (!$getUserInfo) {
                    printf("Error: %s\n", mysqli_error($conn));
                    exit();
                }
                $rundata = mysqli_query($conn, $getUserInfo);
                $row = mysqli_fetch_array($rundata);

                $currentUser->profilePic = 'data:image;base64,' . base64_encode($row['profileUsers']);
            }

            //  echo $tmp;
            //display
            //echo $idUsers;
            // mysqli_stmt_close($stmt);
            mysqli_close($conn);
            // header("Location: ../account-settings.php");
            $this->view('user/accountSettings', ['currentUser' => $currentUser]);
        } else {
            // header("Location: ../account-settings.php");
            $this->view('user/accountSettings', ['currentUser' => $currentUser]);
            exit();
        }
    }
}
