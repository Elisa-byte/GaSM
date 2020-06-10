<?php


class PostLoginForm
{
    private $conn;
    private $table = 'usersv2';
    public $uidmail;
    public $password;

    public function __construct($db){
        $this->conn=$db;
    }
    //get post
    public function select()
    {
        //create query
        $query = 'SELECT uidUsers,passwordUsers FROM ' . $this->table . ' WHERE uidUsers=:uidmail';
        //prepared statement
        $pstmt = $this->conn->prepare($query);

        //clean data
        $this->uidmail = htmlspecialchars(strip_tags($this->uidmail));
        $this->password= htmlspecialchars(strip_tags($this->password));

        //bind parameters
        $pstmt->bindParam(':uidUsers',$this->uidmail);
        //execute query
        if($pstmt->execute()){
            $row=$pstmt->fetch(PDO::FETCH_ASSOC);
            $user=array("uidmail"=>$row['uidUsrs'],"password"=>$row['passwordUsers']);
            if(password_verify($this->password,$user['password']))
            {
                return true;
            }else{
                return false;
            }
        }

        // Print error if something goes wrong
        printf("Error: %s.\n",$pstmt->error);
        return false;
    }
}