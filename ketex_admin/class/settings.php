<?php

include 'pdo-debug.php';

class settings {

    private $conn;
    private $settingstable = 'setting';

    public function __construct($db) {
        $this->conn = $db;
        $this->conn->query("SET @@SESSION.sql_mode = '';");
    }

    public function settingslist() {

        $query = "select * from "
                . $this->settingstable;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($rowpat = $stmt->fetch()) {
            $list[] = array(
                'id' => $rowpat['id'],
                'user_login' => $rowpat['user_login'],
                'user_pass' => $rowpat['user_pass'],
                'email' => $rowpat['email'],
                'website_name' => $rowpat['website_name'],
                'keyword' => $rowpat['keyword'],
                'description' => $rowpat['description'],
                'meta_title' => $rowpat['meta_title'],
                'logo' => $rowpat['logo']
            );
        }
        return $list;
    }

    public function singlesettings() {

        $query = "select  terms_condition, signature "
                . "from " . $this->settingstable . " ";


        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function singlesettingsedit() {

        $query = "select *  "
                . "from " . $this->settingstable . " ";


        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function singlesettingsbyslug() {

        $query = "select * "
                . "from " . $this->settingstable . " "
                . " where meta_title = '" . $this->meta_title . "' ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editsettings() {

        $query = "update " . $this->settingstable . " set "
                . "user_login = :user_login,"
                . "email = :email,"
                . "website_name = :website_name,"
                . "keyword = :keyword,"
                . "description = :description,"
                . "meta_title = :meta_title,"
                . "logo = :logo,"
                . "date_added = :date_added "
                . "where id = :id";


        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $bind = array(':id' => $this->id,
            ':user_login' => $this->user_login,
            ':email' => $this->email,
            ':website_name' => $this->website_name,
            ':keyword' => $this->keyword,
            ':description' => $this->description,
            ':meta_title' => $this->meta_title,
            ':logo' => $this->logo,
            ':date_added' => $this->date_added
        );

        //return PdoDebugger::show($query, $bind);

        if ($stmt->execute($bind)) {
            return true;
        } else {
            return false;
        }
    }

    public function singlepass() {

        $query = "select  user_pass "
                . "from " . $this->settingstable . " ";


        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function chngepass() {

        $query = "update " . $this->settingstable . " set user_pass='" . $this->user_pass . "' where id='" . $this->id . "'";
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute()) {

            return true;
        }
    }

}
