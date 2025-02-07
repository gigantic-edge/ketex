<?php

include 'pdo-debug.php';

class users {

    private $conn;
    private $usertable = 'user_master';
    public $um_id;
   
    public $um_company;
    public $um_gst;
    public $um_name;
    public $um_address1;
    public $um_address2;
    public $um_pin;
    public $um_state;
    public $um_phone1;
    public $um_phone2;
    public $um_email;
    public $um_active;

    public function __construct($db) {
        $this->conn = $db;
        $this->conn->query("SET @@SESSION.sql_mode = '';");
    }

    public function listUsers() {
        $list = [];
        $query = "select * from "
                . $this->usertable . " um "
                . "order by um.um_added desc";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($rowpat = $stmt->fetch()) {
            $list[] = array(
                'um_id' => $rowpat['um_id'],
                'um_company' => $rowpat['um_company'],
                'um_gst' => $rowpat['um_gst'],
                'um_name' => $rowpat['um_name'],
                'um_address1' => $rowpat['um_address1'],
                'um_address2' => $rowpat['um_address2'],
                'um_address3' => $rowpat['um_address3'],
                'um_pin' => $rowpat['um_pin'],
                'um_state' => $rowpat['um_state'],
                'um_phone1' => $rowpat['um_phone1'],
                'um_phone2' => $rowpat['um_phone2'],
                'um_email' => $rowpat['um_email'],
                'um_active' => $rowpat['um_active'],
                'um_added' => $rowpat['um_added'],
                'um_last_login' => $rowpat['um_last_login']
            );
        }
        return $list;
    }

    public function singleUser() {

        $query = "select * from "
                . $this->usertable . " um 

where 
um.um_id = '" . $this->um_id . "'";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser() {

        $query = "update " . $this->usertable . " set um_company=:um_company, "
                . "um_gst=:um_gst,um_name=:um_name, "
                . "um_address1=:um_address1,um_address2=:um_address2,"
                . "um_pin=:um_pin,um_state=:um_state,"
                . "um_phone1=:um_phone1,um_phone2=:um_phone2,"
                . "um_email=:um_email,um_active=:um_active "
                . "where um_id = :um_id";


        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $bind = array(':um_id' => $this->um_id,':um_gst' => $this->um_gst,
            ':um_company' => $this->um_company, ':um_name' => $this->um_name,
            ':um_address1' => $this->um_address1, ':um_address2' => $this->um_address2,
            ':um_pin' => $this->um_pin, ':um_state' => $this->um_state,
            ':um_phone1' => $this->um_phone1, ':um_phone2' => $this->um_phone2,
            ':um_email' => $this->um_email, ':um_active' => $this->um_active);

        //return PdoDebugger::show($query, $bind);

        if ($stmt->execute($bind)) {
            return true;
        } else {
            return false;
        }
    }

}
