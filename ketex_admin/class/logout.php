<?php

class logout {

    private $conn;
    private $table = 'admin_master';
 //   public $username;
//    public $password;
//    public $admin_name;
//    public $admin_email;
    public $date;
    public $admin_id;
    //Constructor with DB
    public function __construct($db) {
        $this->conn = $db;
    }

    public function lastLogin() {

        $query = "update ".$this->table." set am_last_login =  
                '" . $this->date . "' WHERE am_id='" . $this->admin_id . "'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }

   

}
