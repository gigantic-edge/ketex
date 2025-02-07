<?php

include 'pdo-debug.php';

class branches {

    private $conn;
    public $branches = 'branches';
    public $journey = 'journey';

    public function __construct($db) {
        $this->conn = $db;
        $this->conn->query("SET @@SESSION.sql_mode = '';");
    }

    public function allBranchlist() {
        // $list=[];
        $query = "select * from branches";
       
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($rowpat = $stmt->fetch()) {
            $list[] = array(
            'id' => $rowpat['id'],
            'map' => $rowpat['map'],
            'title' => $rowpat['title'],
            'address' => $rowpat['address'],
            'phone' => $rowpat['phone'],
            'fax' => $rowpat['fax'],
            'email' => $rowpat['email'],
            'createdAt' => $rowpat['createdAt']
        );

        }
        return $list;
    }
    
    public function addBranche() {
        $query = "insert into " . $this->branches." VALUES (null,'".$this->map."','".$this->title."','".$this->address."','".$this->phone."','".$this->fax."','".$this->email."','".$this->createdAt."')";
        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        
         if ($stmt->execute($bind)) {
             return true;
         } else {
             return false;
         }
    }
    
    public function singleBranch() {
        $query = "SELECT *  from " . $this->branches . " WHERE id ='" . $this->id . "' ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function editBranche() {
        $query = "UPDATE " . $this->branches." SET `map` = '".$this->map."',`title` = '".$this->title."',`address` = '".$this->address."',`phone` = '".$this->phone."',
        `fax` = '".$this->fax."',`email` = '".$this->email."',`createdAt` = '".$this->createdAt."' WHERE `id` = '".$this->id."' ";
        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        
         if ($stmt->execute($bind)) {
             return true;
         } else {
             return false;
         }
    }
    
    public function allJourneylist() {
        // $list=[];
        $query = "select * from journey";
       
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($rowpat = $stmt->fetch()) {
            $list[] = array(
            'id' => $rowpat['id'],
            'year' => $rowpat['year'],
            'title' => $rowpat['title'],
            'description' => $rowpat['description'],
            'createdAt' => $rowpat['createdAt']
        );

        }
        return $list;
    }

    public function addJourney() {
        $query = "insert into " . $this->journey." VALUES (null,'".$this->year."','".$this->title."','".$this->description."','".$this->createdAt."')";
        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        
         if ($stmt->execute($bind)) {
             return true;
         } else {
             return false;
         }
    }
    
    public function singleJourney() {
        $query = "SELECT *  from " . $this->journey . " WHERE id ='" . $this->id . "' ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function editJourney() {
        $query = "UPDATE " . $this->journey." SET `year` = '".$this->year."',`title` = '".$this->title."',`description` = '".$this->description."',
        `createdAt` = '".$this->createdAt."' WHERE `id` = '".$this->id."' ";
        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        
         if ($stmt->execute($bind)) {
             return true;
         } else {
             return false;
         }
    }
    
    
}
