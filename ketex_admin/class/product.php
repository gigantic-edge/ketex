<?php
include 'pdo-debug.php';

class product {

    private $conn;
    private $profile = 'product_details';
    private $category = 'product_category';
//    private $attribute = 'attribute';
//    private $attrstdnt = 'profile_attribute_map';
//     private $career = 'career';

    public function __construct($db) {
        $this->conn = $db;
        $this->conn->query("SET @@SESSION.sql_mode = '';");
    }
    
      public function addProfile() {

        $query = "insert into " . $this->profile . " (`pro_id`, `cat_id`, `pro_name`, `pro_description`, `created_at`)"
                . "values ( '$this->pro_id','$this->cat_id','$this->pro_name','$this->pro_description','$this->created_at')";
        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       // print_r($query);//exit;
        while ($rowpat = $stmt->fetch()) {
        $bind = array('pro_id' => $rowpat['pro_id'],
                'cat_id' => $rowpat['cat_id'],
                'pro_name' => $rowpat['pro_name'],
              'pro_description' => $rowpat['pro_description'],
         'created_at' => $rowpat['created_at']);
        
        }
//                'image' => $rowpat['image'],
//                'age' => $rowpat['age'],
//                'short_bio' => $rowpat['short_bio'],
//                'long_bio' => $rowpat['long_bio'],
//                'education1' => $rowpat['education1'],
//                'education2' => $rowpat['education2'],
//                'workex_total' => $rowpat['workex_total'],
//                'co_exp_1' => $rowpat['co_exp_1'],
//                'co_exp_2' => $rowpat['co_exp_2'],
//                'co_exp_3' => $rowpat['co_exp_3'],
//                'co_exp_4' => $rowpat['co_exp_4'],
//                'co_exp_5' => $rowpat['co_exp_5'],
//                'international_exp' => $rowpat['international_exp'],
//                'co_name_1' => $rowpat['co_name_1'],
//                'co_name_2' => $rowpat['co_name_2'],
//                'co_name_3' => $rowpat['co_name_3'],
//                'co_name_4' => $rowpat['co_name_4'],
//                'co_name_5' => $rowpat['co_name_5'],
//                'career_highlights' => $rowpat['career_highlights'],
//                'achievements' => $rowpat['achievements'],
//                'certifications' => $rowpat['certifications'],
//                'linkedin' => $rowpat['linkedin'],
//                'video_profile' => $rowpat['video_profile'],
//                'gender' => $rowpat['gender']);

        //return PdoDebugger::show($query, $bind);
        //print_r($bind); exit;

        if ($stmt->execute($bind)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function category() {

        $query = "select * from " . $this->category . " ";
        print_r($query);exit;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($rowpat = $stmt->fetch()) {
            $list[] = array(
                'cat_id' => $rowpat['cat_id'],
                'cat_name' => $rowpat['cat_name']
                
            );
        }
        return $list;
    }
    
     public function product_details() {
         
        $query = "select * from " . $this->profile . " ";
        print_r($query);exit;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($rowpat = $stmt->fetch()) {
            $list[] = array(
               'pro_id' => $rowpat['pro_id'],
                'cat_id' => $rowpat['cat_id'],
                 'pro_img' => $rowpat['pro_img'],
                'pro_name' => $rowpat['pro_name'],
              'pro_description' => $rowpat['pro_description'],
         'created_at' => $rowpat['created_at'],
                'updated_at' => $rowpat['updated_at']
                
            );
        }
        return $list;
    }
}

