<?php

class login {

    private $conn;
    private $table = 'setting';
    public $username;
    public $password;
    public $admin_name;
    public $admin_email;
    public $admin_id;
    //Constructor with DB
    public function __construct($db) {
        $this->conn = $db;
    }

    public function authenticate() {

        $query = "SELECT * FROM 
                " . $this->table . " WHERE user_login='" . $this->username . "' "
                . "and user_pass='" . $this->password . "' and status = '0'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function loginDetails() {

        $query = "SELECT * FROM 
                " . $this->table . " WHERE user_login='" . $this->username . "' "
                . "and user_pass='" . $this->password . "' and  status = '0'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        //return $stmt->rowCount();
        return $rowlogin = $stmt->fetch(PDO::FETCH_ASSOC);
        
    }

}
