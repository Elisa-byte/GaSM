<?php
class Admin extends Controller
{
    public function index()
    {
        if (isset($_SESSION['adminId'])) {
            require("app/config/dbh.inc.php");
            $rowperpage = 4;
            // counting total number of posts
            $allcount_query = "SELECT count(*) as allcount FROM campanii";
            $allcount_result = mysqli_query($conn, $allcount_query);
            $allcount_fetch = mysqli_fetch_array($allcount_result);
            $allcount = $allcount_fetch['allcount'];

            $query = mysqli_query($conn, "SELECT * FROM gasm.admin ORDER BY idAdmin ASC");

            $conn->close();
    
            $toPass = array($rowperpage, 0);
            $latestCampaigns = $this->model('Campanii', $toPass);
            $this->view('admin/index', ['allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
        } else $this->view('admin/login', '');
    }

    public function checkUser()
    {

        if (isset($_POST['log-in-admin-submit'])) {
            require_once "app/config/dbh.inc.php";
            $uidmail = $_POST['uidmail'];

            $password_login = $_POST['password_login'];
            if (empty($uidmail) || empty($password_login)) {
                $this->view('admin/login', ['error' => 'emptyfields']);
                exit();
            } else {
                $sql = "SELECT * FROM gasm.admin WHERE uidAdmin=? OR emailAdmin=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    die("<pre>Prepare failed:\n" . mysqli_error($conn) . "\n$sql</pre>");
                } else {
                    mysqli_stmt_bind_param($stmt, "ss", $uidmail, $uidmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if ($row = mysqli_fetch_assoc($result)) {
                        // $hashed = password_hash($password_login, PASSWORD_DEFAULT);
                        $pwdCheck = password_verify($password_login, $row['pwdAdmin']);
                        if ($pwdCheck == false) {
                            $this->view('admin/login', ['error' => 'wrongpwd']);
                            exit();
                        } else if ($pwdCheck == true) {
                            // session_start();
                            $_SESSION['adminId'] = $row['idAdmin'];
                            $_SESSION['adminUid'] = $row['uidAdmin'];
                            header("Location: index");
                            exit();
                        } else {
                            $this->view('admin/login', ['error' => 'wrongpwd']);
                            exit();
                        }
                    } else {
                        $this->view('admin/login', ['error' => 'nouser']);
                        exit();
                    }
                }
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
            }
        } else {
            $this->view('admin/login', '');
            exit();
        }
    }

    public function deleteUser()
    {
        if (!empty($_POST['id'])) {

            // Include the database configuration file
            include 'app/config/dbh.inc.php';

            $result = $conn->query("DELETE FROM gasm.usersv2 WHERE idUsers=" . $_POST['id']) or die($conn->error);

            mysqli_close($conn);

            echo 'Utilizatorul a fost sters!';
        }
    }

    public function deleteCampaign()
    {
        if (!empty($_POST['name'])) {

            // Include the database configuration file
            include 'app/config/dbh.inc.php';

            $query = $conn->query("select imageId from gasm.campanii where lower(replace(name, ' ', '-')) = '" . $_POST['name']."'");
            $result = mysqli_fetch_array($query);
            $imageId = $result['imageId'];
            if (!empty($imageId))
                $query = $conn->query("DELETE FROM gasm.campanii_images WHERE imageId=" . $imageId);

            echo $_POST['name'];
            $query = $conn->query("DELETE FROM gasm.campanii WHERE lower(replace(name, ' ', '-')) = '" . $_POST['name'] . "'") or die($conn->error);

            mysqli_close($conn);

            echo 'Campania a fost stearsa!';
        }
    }

    public function moreCampaigns()
    {

        require("app/config/dbh.inc.php");
        $row = $_POST['row'];
        $rowperpage = 4;

        $latestCampaigns = $this->model('Campanii', array($rowperpage, $row));
        // selecting posts
        $html = '';

        foreach ($latestCampaigns->campanii as $campanie) {
            $nume = $campanie->nume;
            $descriere = $campanie->descriere;
            $id  = str_replace(' ', '-', strtolower($nume));
        
            // Creating HTML structure
            $html .= '<tr class="checkpoint" id = "q'.$id.'">';
            $html .= '<td>'.$nume.'</td>';
            $html .= '<td>' . $descriere . '</td>';
            $html .= '<td><span id="'. $id . '" class="delete_campaign">Sterge Campania</span></td></tr>';

        }

        echo $html;
    }

    public function getUser()
    {
        if (isset($_GET['username'])) {
            $user = $this->model('User', array($_GET['username']));
            if (empty($user->fname)) {
                echo '<p>Nu exista acest utilizator</p>';
                return;
            }
            $response = '<table class="campaign-info"> <tr> <td>Nume</td><td>Prenume</td><td>Nume Utilizator</td><td>Email</td><td></td></tr>';
            $response .= "<tr><td> $user->lname</td>";
            $response .= "<td>$user->fname</td>";
            $response .= "<td>$user->username</td>";
            $response .= "<td>$user->mail</td>";
            $response .= "<td><span id='$user->id' class='delete_user'>Sterge user</span> </td></tr></table>";

            echo $response;

        }

        else echo "nope";
    }

    public function addUser() {
        if (isset($_POST['add-user-submit'])) {


            require_once "app/config/dbh.inc.php";

            $rowperpage = 4;
            // counting total number of posts
            $allcount_query = "SELECT count(*) as allcount FROM campanii";
            $allcount_result = mysqli_query($conn, $allcount_query);
            $allcount_fetch = mysqli_fetch_array($allcount_result);
            $allcount = $allcount_fetch['allcount'];

            $query = mysqli_query($conn, "SELECT * FROM gasm.admin ORDER BY idAdmin ASC");

            $toPass = array($rowperpage, 0);
            $latestCampaigns = $this->model('Campanii', $toPass);
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
                $this->view('admin/index', ['error' => 'emptyfields','allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                exit();
            } //"/^[A-Za-z]+$/u ")
            else if (!preg_match("/^[A-Za-z]+$/", $fname)) {
                // header("Location: ../signup.php?error=invalidfname&lname=".$lname."&phone=".$phone."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
                $this->view('admin/index', ['error' => 'invalidfname','allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                exit();
            } else if (!preg_match("/^[A-Za-z]+$/", $lname)) {
                // header("Location: ../signup.php?error=invalidlname&fname=".$fname."&phone=".$phone."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
                $this->view('admin/index', ['error' => 'invalidlname','allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                exit();
            } else if (!preg_match("/^(\+4|)?(07[0-8]{1}[0-9]{1}|02[0-9]{2}|03[0-9]{2}){1}?(\s|\.|\-)?([0-9]{3}(\s|\.|\-|)){2}$/", $phone)) {
                // header("Location: ../signup.php?error=invalidphone&fname=".$fname."&lname=".$lname."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
                $this->view('admin/index', ['error' => 'invalidphone','allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                exit();
            } else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                // header("Location: ../signup.php?error=invalidmail&fname=".$fname."&lname=".$lname."&phone=".$phone."&username=".$username."&category=".$category."&location=".$location);
                $this->view('admin/index', ['error' => 'invalidmail','allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                exit();
            } else if (!filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/.{8,25}/")))) {
                // header("Location: ../signup.php?error=invalidpwd&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
                $this->view('admin/index', ['error' => 'invalidpwd','allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                exit();
            } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                // header("Location: ../signup.php?error=invalidusername&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&category=".$category."&location=".$location);
                $this->view('admin/index', ['error' => 'invalidusername','allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                exit();
            } else if (strlen(trim($_POST["password"])) < 8) {
                // header("Location: ../signup.php?error=pwdTooSmall&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&category=".$category."&location=".$location);
                $this->view('admin/index', ['error' => 'pwdTooSmall','allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                exit();
            } else if ($password !== $passwordRepeat) {
                // header("Location: ../signup.php?error=passwordCheck&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
                $this->view('admin/index', ['error' => 'passwordCheck','allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                exit();
            } else {
                $sql = "SELECT uidUsers FROM gasm.usersv2 WHERE uidUsers=?;";

                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    // header("Location: ../signup.php?error=sqlerror");
                    $this->view('admin/index', ['error' => 'sqlerror','allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $username);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $resultCheck = mysqli_stmt_num_rows($stmt);
                    if ($resultCheck > 0) {
                        // header("Location: ../signup.php?error=usertaken&mail=".$mail);//nu am mai pus toate datele
                        $this->view('admin/index', ['error' => 'usertaken','allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
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
                            
                            $this->view('admin/index', ['allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                            exit();
                        }
                    }
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        } else {
            // header("Location: ../signup.php");
            $this->view('admin/index', ['allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
            exit();
        }
    }

    public function addAdmin() {
        if (isset($_POST['add-admin-submit'])) {

            require_once "app/config/dbh.inc.php";

            $rowperpage = 4;
            // counting total number of posts
            $allcount_query = "SELECT count(*) as allcount FROM campanii";
            $allcount_result = mysqli_query($conn, $allcount_query);
            $allcount_fetch = mysqli_fetch_array($allcount_result);
            $allcount = $allcount_fetch['allcount'];

            $query = mysqli_query($conn, "SELECT * FROM gasm.admin ORDER BY idAdmin ASC");

            $toPass = array($rowperpage, 0);
            $latestCampaigns = $this->model('Campanii', $toPass);
            //declararea tuturor variabilelor din signup

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $phone = $_POST['phone'];
            $mail  = $_POST['mail'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordRepeat = $_POST['password-repeat'];

            //echo $_POST["fname"] . $_POST["lname"] . $_POST["phone"] . $_POST["mail"] . $_POST["username"] . $_POST["password"] . $_POST["category"] . $_POST["location"];

            if (empty($fname) || empty($lname) || empty($phone) || empty($mail) || empty($username) || empty($password) || empty($passwordRepeat)) {
                // header("Location: ../signup.php?error=emptyfields&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
                $this->view('admin/index', ['error' => 'emptyfieldsadmin','allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                exit();
            } //"/^[A-Za-z]+$/u ")
            else if (!preg_match("/^[A-Za-z]+$/", $fname)) {
                // header("Location: ../signup.php?error=invalidfname&lname=".$lname."&phone=".$phone."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
                $this->view('admin/index', ['error' => 'invalidfnameadmin', 'allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                exit();
            } else if (!preg_match("/^[A-Za-z]+$/", $lname)) {
                // header("Location: ../signup.php?error=invalidlname&fname=".$fname."&phone=".$phone."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
                $this->view('admin/index', ['error' => 'invalidlnameadmin', 'allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                exit();
            } else if (!preg_match("/^(\+4|)?(07[0-8]{1}[0-9]{1}|02[0-9]{2}|03[0-9]{2}){1}?(\s|\.|\-)?([0-9]{3}(\s|\.|\-|)){2}$/", $phone)) {
                // header("Location: ../signup.php?error=invalidphone&fname=".$fname."&lname=".$lname."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
                $this->view('admin/index', ['error' => 'invalidphoneadmin', 'allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                exit();
            } else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                // header("Location: ../signup.php?error=invalidmail&fname=".$fname."&lname=".$lname."&phone=".$phone."&username=".$username."&category=".$category."&location=".$location);
                $this->view('admin/index', ['error' => 'invalidmailadmin', 'allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                exit();
            } else if (!filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/.{8,25}/")))) {
                // header("Location: ../signup.php?error=invalidpwd&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
                $this->view('admin/index', ['error' => 'invalidpwdadmin','allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                exit();
            } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                // header("Location: ../signup.php?error=invalidusername&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&category=".$category."&location=".$location);
                $this->view('admin/index', ['error' => 'invalidusernameadmin', 'allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                exit();
            } else if (strlen(trim($_POST["password"])) < 8) {
                // header("Location: ../signup.php?error=pwdTooSmall&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&category=".$category."&location=".$location);
                $this->view('admin/index', ['error' => 'pwdTooSmalladmin', 'allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                exit();
            } else if ($password !== $passwordRepeat) {
                // header("Location: ../signup.php?error=passwordCheck&fname=".$fname."&lname=".$lname."&phone=".$phone."&mail=".$mail."&username=".$username."&category=".$category."&location=".$location);
                $this->view('admin/index', ['error' => 'passwordCheckadmin', 'allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                exit();
            } else {
                $sql = "SELECT uidAdmin FROM gasm.admin WHERE uidAdmin=?;";

                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    // header("Location: ../signup.php?error=sqlerror");
                    $this->view('admin/index', ['error' => 'sqlerror', 'allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $username);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $resultCheck = mysqli_stmt_num_rows($stmt);
                    if ($resultCheck > 0) {
                        // header("Location: ../signup.php?error=usertaken&mail=".$mail);//nu am mai pus toate datele
                        $this->view('admin/index', ['error' => 'usertaken', 'allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                        exit();
                    } else {
                        $sql = "INSERT INTO gasm.admin (uidAdmin, fnameAdmin, lnameAdmin, emailAdmin, pwdAdmin, phnAdmin) VALUES (?,?,?,?,?,?);";
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

                            mysqli_stmt_bind_param($stmt, "ssssss", $username, $fname, $lname, $mail, $hashedPwd, $phone);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);
                            // header("Location: ../login.php");
                            $this->view('admin/index', ['addadmin' => 'success', 'allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
                            exit();
                        }
                    }
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        } else {
            // header("Location: ../signup.php");
            $this->view('admin/index', ['allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage, 'query' => $query]);
            exit();
        }
    }

    public function logout() {
        if (isset($_SESSION['adminId'])) {
            unset($_SESSION['adminId']);
            $this->view('admin/login', '');
        }
    }
}
