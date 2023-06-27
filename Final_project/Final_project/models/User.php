<?php

class User{

    /* ------------------------------- properties ------------------------------- */
    public $conn;
    public $username;
    public $password;
    public $email;

    public $errors = [];
    public $user = [];

    /* -------------------------------- construct ------------------------------- */
    public function __construct($conn){
        $this->conn = $conn;
    }


    /* ----------------------------- public function ---------------------------- */
    public function createNewUser($username, $pw, $email){

        $pw = password_hash($pw, PASSWORD_DEFAULT);

        $sql = "Insert into user (username, password, email) values (?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $username, $pw, $email);
        $stmt->execute();
        
        if($stmt->affected_rows == 1){
            return true;
        }
        else{
            return false;
        }
    }

    public function validateUserExists($username){

        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $users = $stmt->get_result();
        $this->user = $users->fetch_assoc();

        //if not empty -> user found -> true
        if(!empty($this->user)){
            return True;
        }
        //if empty-> user not found -> false
        else{
            return False;
        }

    }

    public function getUserID($username){
        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $users = $stmt->get_result();

        $this->user = $users->fetch_assoc();

        return $this->user;
    }
}


?>