<?php


class PostSignUpForm
{
    private $conn;
    private $table = 'usersv2';
    private $uidUsers;
    public $fnUsers;
    public $lnUsers;
    public $emailUsers;
    public $pwdUsers;
    public $phnUsers;
    public $categoryUsers;
    public $locationUsers;
    public $profileUsers;

    public function __construct($db){
        $this->conn=$db;
    }
    //get post
    public function insert()
    {
        //create query
        $query = 'INSERT INTO ' . $this->table . '
        SET
            uidUsers=:uidUsers,
            fnUsers=:fnUsers,
            lnUsers=:lnUsers,
            emailUsers=:emailUsers,
            pwdUsers=:pwdUsers,
            phnUsers=:phnUsers,
            categoryUsers=:categoryUsers,
            locationUsers=:locationUsers,
            profileUsers=:profileUsers';
        //prepared statement
        $pstmt = $this->conn->prepare($query);

        //clean data
        $this->uidUsers = htmlspecialchars(strip_tags($this->uidUsers));
        $this->fnUsers = htmlspecialchars(strip_tags($this->fnUsers));
        $this->lnUsers = htmlspecialchars(strip_tags($this->lnUsers));
        $this->emailUsers = htmlspecialchars(strip_tags($this->emailUsers));
        $this->pwdUsers = htmlspecialchars(strip_tags($this->pwdUsers));
        $this->phnUsers= htmlspecialchars(strip_tags($this->phnUsers));
        $this->categoryUsers = htmlspecialchars(strip_tags($this->categoryUsers));
        $this->locationUsers= htmlspecialchars(strip_tags($this->locationUsers));
        $this->profileUsers= htmlspecialchars(strip_tags($this->profileUsers));

        //bind parameters
        $pstmt->bindParam(':uidUsers',$this->uidUsers);
        $pstmt->bindParam(':fnUsers',$this->fnUsers);
        $pstmt->bindParam(':lnUsers',$this->lnUsers);
        $pstmt->bindParam(':emailUsers',$this->emailUsers);
        $this->pwdUsers=password_hash($this->pwdUsers,PASSWORD_BCRYPT);
        $pstmt->bindParam(':pwdUsers',$this->pwdUsers);
        $pstmt->bindParam(':phnUsers',$this->phnUsers);
        $pstmt->bindParam(':categoryUsers',$this->categoryUsers);
        $pstmt->bindParam(':locationUsers',$this->locationUsers);
        $pstmt->bindParam(':profileUsers',$this->profileUsers);
        //execute query
        if($pstmt->execute()){
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n",$pstmt->error);
        return false;
    }
}