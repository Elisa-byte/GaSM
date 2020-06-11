<?php

class UserModel {
    public $id;
    public $fname;
    public $lname;
    public $phone;
    public $mail;
    public $username;
    public $category;
    public $location;
    public $passwd;
    public $profilePic;

    public function __construct($id)
    {
        
        require_once "app/config/dbh.inc.php";

        $getUserInfo = '';
        if (gettype($id[0]) == 'integer') {
            $this->id = $id[0];
            $getUserInfo = "SELECT * FROM gasm.usersv2 WHERE idUsers='$this->id';";
        }
        else {
            $this->username = $id[0];
            $getUserInfo = "SELECT * FROM gasm.usersv2 WHERE uidUsers='$this->username';";
        }
        
        if (!$getUserInfo) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }
        $rundata = mysqli_query($conn, $getUserInfo);
        $row = mysqli_fetch_array($rundata);
        if ($row != null) {
            $this->id = $row['idUsers'];
            $this->fname = $row['fnUsers'];
            $this->lname = $row['lnUsers'];
            $this->phone = $row['phnUsers'];
            $this->mail = $row['emailUsers'];
            $this->username = $row['uidUsers'];
            $this->category = $row['categoryUsers'];
            $this->location = $row['locationUsers'];
            $this->profilePic = $row['profileUsers'] != NULL ? 'data:image;base64,' . base64_encode($row['profileUsers']) : 'public/img/generic_pic.png';
        }
        mysqli_close($conn);
    }
}