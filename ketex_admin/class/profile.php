<?php



include 'pdo-debug.php';



class profile {



    private $conn;

    public $profile = 'product_category';

    public $department = 'employee_department';

    public $employee="employee_department_details";

    public $product = 'product_details';

    public $productimage = 'product_image';

    public $awords = 'awords';

    public $cmspage = 'pages';

    public $notice = 'notice_board';

    public $application = 'application_category';

    public $application_details = 'application_details';

    public $enquiry = 'enquiry';

    public $clients = 'ketex_clients';

    





    public $proimg_id;

    public $pro_id;

    public $product_img;

    public $profile_id;

    // public $header_img;



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

            'address' => $rowpat['address'],

            'title' => $rowpat['title'],

            'phone' => $rowpat['phone'],

            'fax' => $rowpat['fax'],

            'email' => $rowpat['email'],

            'createdAt' => $rowpat['createdAt']

        );



        }

        return $list;

    }



    public function allProfilelist() {

        // $list=[];

        $query = "select * from " . $this->profile . " ORDER BY `product_category`.`sort_number` ASC " ;

       

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while ($rowpat = $stmt->fetch()) {

            $list[] = array('cat_id' => $rowpat['cat_id'],

                'cat_name' => $rowpat['cat_name'],

            'created_at' => $rowpat['created_at'],

            'updated_at' => $rowpat['updated_at']

        );



    }

    return $list;

}



     public function allTeamlist() {

        // $list=[];

        $query = "select * from employee_department ORDER BY `sort_number` ASC ";

        

       

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while ($rowpat = $stmt->fetch()) {

            $list[] = array('dep_id' => $rowpat['dep_id'],

                'department_name' => $rowpat['department_name'],

                'sort_number' => $rowpat['sort_number'],

                'create_add' => $rowpat['create_add'],

            'update_add' => $rowpat['update_add']

        );



    }

        return $list;

    }

    

    public function allMemberDelatils() {

        // $list=[];

        $query = "SELECT * from  employee_department_details  where dep_id='7' ";

       

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while ($rowpat = $stmt->fetch()) {

            $list[] = array('emp_id' => $rowpat['emp_id'],

                'dep_id' => $rowpat['dep_id'],

                'employee_image' => $rowpat['employee_image'],

            'employee_name' => $rowpat['employee_name'],

            'emp_designation' => $rowpat['emp_designation']

        );

    }

        return $list;

    }

    public function allMemberDelatilsNew($id) {

        // $list=[];

        $query = "SELECT * from  employee_department_details  where dep_id='".$id."' ORDER BY `sort_number` ASC ";

       

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while ($rowpat = $stmt->fetch()) {

            $list[] = array('emp_id' => $rowpat['emp_id'],

                'dep_id' => $rowpat['dep_id'],

                'employee_image' => $rowpat['employee_image'],

            'employee_name' => $rowpat['employee_name'],

            'emp_designation' => $rowpat['emp_designation']

        );

    }

        return $list;

    }



public function applicationcategorydetails() {

    // $list=[];

    $query = "select * from application_category " ;

   

    $stmt = $this->conn->prepare($query);

     $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($rowpat = $stmt->fetch()) {

        $list[] = array('cat_id' => $rowpat['cat_id'],

                'cat_name' => $rowpat['cat_name'],

            'created_at' => $rowpat['created_at'],

            'updated_at' => $rowpat['updated_at']

        );



    }

 return $list;

}





public function allmanagementdetails() {

        // $list=[];

        $query = "select * from " . $this->cmspage . " " ;

       

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while ($rowpat = $stmt->fetch()) {

            $list[] = array('page_id' => $rowpat['page_id'],

                'page_title' => $rowpat['page_title'],

            'content' => $rowpat['content'],

            'page_heading' => $rowpat['page_heading'],

            'meta_description' => $rowpat['meta_description'],

            'meta_keywords' => $rowpat['meta_keywords']

        );



    }

    return $list;

}



public function allnoticedetails() {

    // $list=[];

    $query = "select * from " . $this->notice . " " ;

   

    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($rowpat = $stmt->fetch()) {

        $list[] = array('id' => $rowpat['id'],

        

            'title' => $rowpat['title'],

            'image' => $rowpat['image'],

            'date' => $rowpat['date'],

            'content' => $rowpat['content'],

            'pdf' => $rowpat['pdf']

    );



}

return $list;

}





public function allawordsdetails() {

        // $list=[];

        $query = "select * from " . $this->awords . " " ;

       

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while ($rowpat = $stmt->fetch()) {

            $list[] = array('id' => $rowpat['id'],

                 'image' => $rowpat['image'],

                'description' => $rowpat['description'],

                'year' => $rowpat['year']

        );



    }

    return $list;

}



public function allclientsdetails() {

        // $list=[];

        $query = "SELECT * FROM `ketex_clients` ORDER BY `ketex_clients`.`sort_number` ASC" ;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while ($rowpat = $stmt->fetch()) {

            $list[] = array('client_id' => $rowpat['id'],

                'client_image' => $rowpat['client_image'],

                'client_description' => $rowpat['client_description'],

                'client_name' => $rowpat['client_name'],

        );



    }

    return $list;

}





public function companyprofile() {

        // $list=[];

        $query = "select * from " . $this->cmspage . " where page_id = '1' " ;

       

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while ($rowpat = $stmt->fetch()) {

            $list[] = array('page_id' => $rowpat['page_id'],

                'page_title' => $rowpat['page_title'],

            'content' => $rowpat['content'],

            'page_heading' => $rowpat['page_heading'],

            'meta_description' => $rowpat['meta_description'],

            'meta_keywords' => $rowpat['meta_keywords']

        );



    }

    return $list;

}



public function whoweare() {

        // $list=[];

        $query = "select * from " . $this->cmspage . " where page_id = '19' " ;

       

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while ($rowpat = $stmt->fetch()) {

            $list[] = array('page_id' => $rowpat['page_id'],

                'page_title' => $rowpat['page_title'],

            'content' => $rowpat['content'],

            'page_heading' => $rowpat['page_heading'],

            'meta_description' => $rowpat['meta_description'],

            'meta_keywords' => $rowpat['meta_keywords']

        );



    }

    return $list;

}





public function aboutus() {

    // $list=[];

    $query = "select * from " . $this->cmspage . " where page_id = '16' " ;

   

    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($rowpat = $stmt->fetch()) {

        $list[] = array('page_id' => $rowpat['page_id'],

            'page_title' => $rowpat['page_title'],

        'content' => $rowpat['content'],

        'page_heading' => $rowpat['page_heading'],

        'meta_description' => $rowpat['meta_description'],

        'meta_keywords' => $rowpat['meta_keywords']

    );



}

return $list;

}



public function vision() {

    // $list=[];

    $query = "select * from " . $this->cmspage . " where page_id = '17' " ;

   

    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($rowpat = $stmt->fetch()) {

        $list[] = array('page_id' => $rowpat['page_id'],

            'page_title' => $rowpat['page_title'],

        'content' => $rowpat['content'],

        'page_heading' => $rowpat['page_heading'],

        'meta_description' => $rowpat['meta_description'],

        'meta_keywords' => $rowpat['meta_keywords']

    );



}

return $list;

}



public function mission() {

    // $list=[];

    $query = "select * from " . $this->cmspage . " where page_id = '20' " ;

   

    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($rowpat = $stmt->fetch()) {

        $list[] = array('page_id' => $rowpat['page_id'],

            'page_title' => $rowpat['page_title'],

        'content' => $rowpat['content'],

        'page_heading' => $rowpat['page_heading'],

        'meta_description' => $rowpat['meta_description'],

        'meta_keywords' => $rowpat['meta_keywords']

    );



}

return $list;

}



public function director() {

    // $list=[];

    $query = "select * from " . $this->cmspage . " where page_id = '18' " ;

   

    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($rowpat = $stmt->fetch()) {

        $list[] = array('page_id' => $rowpat['page_id'],

            'page_title' => $rowpat['page_title'],

        'content' => $rowpat['content'],

        'page_heading' => $rowpat['page_heading'],

        'meta_description' => $rowpat['meta_description'],

        'meta_keywords' => $rowpat['meta_keywords']

    );



}

return $list;

}



public function allDepartmentlist() {

    // $list=[];

    $query = "select * from " . $this->department . " ";

   

    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($rowpat1 = $stmt->fetch()) {

        $list[] = array('dep_id' => $rowpat1['dep_id'],

            'department_name' => $rowpat1['department_name'],

            'create_add' => $rowpat1['create_add'],

            'update_add' => $rowpat1['update_add']

    );



}

return $list;

}





public function singleprofile() {



    $query = "SELECT *  from " . $this->profile . " WHERE cat_id ='" . $this->profile_id . "' ";



    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    return $row = $stmt->fetch(PDO::FETCH_ASSOC);

}











public function departmentprofile() {







    $query = "SELECT *  from " . $this->department . " WHERE dep_id ='" . $this->profile_id . "' ";



    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    return $row = $stmt->fetch(PDO::FETCH_ASSOC);



    



}







public function editProfile() {

        $query = "update " . $this->profile . " set "

                . "cat_name = '" . $this->cat_name . "',"

                . "updated_at = '" . $this->update_at . "'"

                . "where cat_id = '" . $this->profile_id . "'";



        $stmt = $this->conn->prepare($query);



        // print_r($query);

        // exit();



        if ($stmt->execute()) {



            return true;

        }

    }



    public function editApplicationCategory() {

        $query = "update " . $this->application . " set "

                . "cat_name = '" . $this->cat_name . "',"

                . "updated_at = '" . $this->update_at . "'"

                . "where cat_id = '" . $this->profile_id . "'";



        $stmt = $this->conn->prepare($query);



        // print_r($query);

        // exit();



        if ($stmt->execute()) {



            return true;

        }

    }







    public function editDepartment() {

        $query = "update " . $this->department . " set "

                . "department_name = '" . $this->department_name . "',"

                . "update_add = '" . $this->update_at . "'"

                . "where dep_id = '" . $this->profile_id . "'";



        $stmt = $this->conn->prepare($query);



        // print_r($query);

        // exit();



        if ($stmt->execute()) {



            return true;

        }

    }







    public function editpdf() {

        $query = "update " . $this->product . " set "

                . "pdf = '" . $this->pdf . "',"

                . "update_at = '" . $this->update_at . "'"

                . "where pro_id = '" . $this->profile_id . "'";



        $stmt = $this->conn->prepare($query);



        // print_r($query);

        // exit();



        if ($stmt->execute()) {



            return true;

        }

    }





    public function editImage() {

        $query = "update " . $this->product . " set "

                . "image = '" . $this->pdf . "',"

                . "update_at = '" . $this->update_at . "'"

                . "where emp_id  = '" . $this->profile_id . "'";



        $stmt = $this->conn->prepare($query);



        // print_r($query);

        // exit();



        if ($stmt->execute()) {



            return true;

        }

    }





    public function editImage2() {

        $query = "update " . $this->employee . " set "

                . "employee_image = '" . $this->employee_image . "',"

                . "update_add = '" . $this->update_add . "'"

                . "where emp_id  = '" . $this->profile_id."'";



                



        $stmt = $this->conn->prepare($query);



        

        if ($stmt->execute()) {



            return true;

        }

    }





     public function editAwordsImage() {

        $query = "update " . $this->awords . " set "

                . "image = '" . $this->image . "'"

                . "where id  = '" . $this->profile_id."'";



                



        $stmt = $this->conn->prepare($query);



        

        if ($stmt->execute()) {



            return true;

        }

    }



    public function editApplicationImage() {

        $query = "update " . $this->application_details . " set "

                . "app_image = '" . $this->app_image . "',"

                . "updated_at = '" . $this->updated_at . "'"

                . "where app_id  = '" . $this->profile_id."'";



                



        $stmt = $this->conn->prepare($query);

        // print_r($stmt);

        // exit();

        

        if ($stmt->execute()) {



            return true;

        }

    }



    public function editNoticeImage() {

        $query = "update " . $this->notice . " set "

                . "image = '" . $this->image . "'"

                . "where id  = '" . $this->profile_id."'";



                



        $stmt = $this->conn->prepare($query);



        

        if ($stmt->execute()) {



            return true;

        }

    }





    public function singleprofile1(){



        $query = "SELECT *  from " . $this->product . " WHERE pro_id ='" . $this->profile_id . "' ";

    

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $row = $stmt->fetch(PDO::FETCH_ASSOC);

    }



    public function singleapplication(){



        $query = "SELECT *  from " . $this->application . " WHERE cat_id ='" . $this->profile_id . "' ";

    

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $row = $stmt->fetch(PDO::FETCH_ASSOC);

    }





    public function singlepage() {



        $query = "SELECT *  from " . $this->cmspage . " WHERE page_id='" . $this->profile_id . "' ";

    

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $row = $stmt->fetch(PDO::FETCH_ASSOC);

    }









    public function singleprofile2(){



        $query = "SELECT *  from " . $this->employee . " WHERE emp_id  ='" . $this->profile_id . "' ";

    

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $row = $stmt->fetch(PDO::FETCH_ASSOC);

    }



    public function singleapplication_details(){



        $query = "SELECT *  from " . $this->application_details . " WHERE app_id  ='" . $this->profile_id . "' ";

    

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $row = $stmt->fetch(PDO::FETCH_ASSOC);

    }





    public function singleawords(){



        $query = "SELECT *  from " . $this->awords . " WHERE id  ='" . $this->profile_id . "' ";

    

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $row = $stmt->fetch(PDO::FETCH_ASSOC);

    }



    



    public function singlenotice(){



        $query = "SELECT *  from " . $this->notice . " WHERE id  ='" . $this->profile_id . "' ";

    

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $row = $stmt->fetch(PDO::FETCH_ASSOC);

    }







    public function editProfile1() {

        $query = "update " . $this->product . " set "

                . "pro_name = '" . $this->pro_name . "',"

                . "pro_description = '" . $this->pro_description . "',"

                . "description = '" . $this->description . "',"

                . "update_at = '" . $this->update_at . "'"

                . "where pro_id = '" . $this->profile_id . "'";



        $stmt = $this->conn->prepare($query);



        // print_r($query);

        // exit();



        if ($stmt->execute()) {



            return true;

        }

    }





    public function editPage() {

        

        $query = "update " . $this->cmspage. " set "

                . "page_title = '" . $this->page_title . "',"

                . "content = '" . $this->content . "',"

                . "page_heading = '" . $this->page_heading . "',"

                . "meta_description = '" . $this->meta_description . "',"

                . "meta_keywords = '" . $this->meta_keywords . "' "

                . "where page_id = '" . $this->profile_id . "'";



        $stmt = $this->conn->prepare($query);



        // // echo("<pre>");

        // print_r($query);

        // echo "</pre>";

        // exit();



        if ($stmt->execute()) {



            return true;

        }

    }









    // product pic edit



    public function editPic() {

        $query = "update " . $this->product . " set "

                . "image = '" . $this->image . "',"

                . "update_at = '" . $this->update_at . "'"

                . "where pro_id = '" . $this->profile_id . "'";



        $stmt = $this->conn->prepare($query);



        // print_r($query);

        // exit();



        if ($stmt->execute()) {



            return true;

        }

    }



    public function editEmployee() {

        $query = "update " . $this->employee . " set "

                . "employee_name = '" . $this->employee_name . "',"

                . "emp_designation = '" . $this->emp_designation . "',"

                . "update_add = '" . $this->update_add . "'"

                . "where emp_id = '" . $this->profile_id . "'";





        $stmt = $this->conn->prepare($query);



        



        if ($stmt->execute()) {



            return true;

        }

    }





    public function editApplicationDetails() {

        $query = "update " . $this->application_details . " set "

                . "app_name = '" . $this->app_name . "',"

                . "app_description = '" . $this->app_description . "',"

                . "updated_at = '" . $this->updated_at . "'"

                . "where app_id = '" . $this->profile_id . "'";





        $stmt = $this->conn->prepare($query);

// print_r($stmt);

// exit();

        



        if ($stmt->execute()) {



            return true;

        }

    }





    public function editAwords() {

        $query = "update " . $this->awords . " set "

                . "description = '" . $this->description . "',"

                . "year = '" . $this->year . "'"

                . "where id = '" . $this->profile_id . "'";





        $stmt = $this->conn->prepare($query);



        



        if ($stmt->execute()) {



            return true;

        }

    }



    public function editNotice() {

        $query = "update " . $this->notice . " set "

                . "title = '" . $this->title . "',"

                . "date = '" . $this->date . "',"

                . "content = '" . $this->content . "'"

                . "where id = '" . $this->profile_id . "'";





        $stmt = $this->conn->prepare($query);



        



        if ($stmt->execute()) {



            return true;

        }

    }















    public function addProfile() {



        $query = "insert into " . $this->profile . "(cat_name,created_at)"

                . "values ('$this->cat_name','$this->date')";

                

        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        

        while ($rowpat) {



        $bind = array('cat_name' => $rowpat['cat_name'],

                'created_at' => $rowpat['date']);



            }

       

         if ($stmt->execute($bind)) {

             return true;

         } else {

             return false;

         }

    }





    public function addApplication_category() {



        $query = "insert into " . $this->application . "(`cat_name`,`created_at`)"

                . "values ('$this->cat_name','$this->date')";

                

        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        

// print_r($stmt);

// exit();



        while ($rowpat) {



        $bind = array('cat_name' => $rowpat['cat_name'],

                'created_at' => $rowpat['date']);



            }

       

         if ($stmt->execute($bind)) {

             return true;

         } else {

             return false;

         }

    }





    public function addDepartment() {



        $query = "insert into " . $this->department . "(department_name,create_add)"

                . "values ('$this->department_name','$this->create_add')";

                  

        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        

        while ($rowpat) {



        $bind = array('department_name' => $rowpat['department_name'],

                'create_add' => $rowpat['create_add']);



            }



            

        

         if ($stmt->execute($bind)) {

             return true;

         } else {

             return false;

         }

    }





    

         public function addEmployee() {



        $query = "insert into " . $this->employee . " (`dep_id`, `employee_image`,`employee_name`, `emp_designation`, `create_add`)"

                . "values ( '$this->dep_id','$this->page_image','$this->employee_name','$this->employee_designation','$this->create_add')";

        

                

        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        

        while ($rowpat = $stmt->fetch()) {



        $bind = array('dep_id' => $rowpat['dep_id'],

                'employee_image' => $rowpat['page_image'],

                'employee_name' => $rowpat['employee_name'],   

                'emp_designation' => $rowpat['employee_designation'],              

                'create_add' => $rowpat['create_add']);        

         

        }



        if ($stmt->execute($bind)) {

            return true;

        } else {

            return false;

        }

    }



    public function addApplication_details() {



        $query = "insert into " . $this->application_details . " (`cat_id`,`app_name`, `app_description`, `app_image`, `created_at`)"

                . "values ( '$this->cat_id','$this->app_name','$this->app_description','$this->page_image','$this->created_at')";

        

                

        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        

        while ($rowpat = $stmt->fetch()) {



        $bind = array('cat_id' => $rowpat['cat_id'],

                'app_name' => $rowpat['app_name'],   

                'app_description' => $rowpat['app_description'],              

                'app_image' => $rowpat['page_image'],

                'created_at' => $rowpat['created_at']);        

         

        }



        if ($stmt->execute($bind)) {

            return true;

        } else {

            return false;

        }

    }







    public function addProduct() {



        $query = "insert into " . $this->product . " (`pro_id`, `cat_id`,`product_pdf_title`,`pdf`, `pro_name`, `pro_description`, `description`, `created_at`)"

                . "values ( '$this->pro_id','$this->cat_id','$this->product_pdf_title','$this->page_pdf','$this->pro_name','$this->pro_description','$this->description','$this->created_at')";

        

        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        // $stmt->execute();

        // $stmt->setFetchMode(PDO::FETCH_ASSOC);



        while ($rowpat = $stmt->fetch()) {

        $bind = array('pro_id' => $rowpat['pro_id'],

                'cat_id' => $rowpat['cat_id'],

                'image' => $rowpat['image'],

                'product_pdf_title' => $rowpat['product_pdf_title'],

                'page_pdf' => $rowpat['page_pdf'],

                'pro_name' => $rowpat['pro_name'],

              'pro_description' => $rowpat['pro_description'],

              'description' => $rowpat['description'],

         'created_at' => $rowpat['created_at']);

        

         

        }



        if ($stmt->execute($bind)) {

            return true;

        } else {

            return false;

        }

    }





    public function addPage() {



        $query = "insert into " . $this->cmspage . " (`page_id`, `page_title`, `content`, `page_heading`, `meta_description`, `meta_keywords`)"

                . "values ( '$this->page_id','$this->page_title','$this->content','$this->page_heading','$this->meta_description','$this->meta_keywords')";

        

        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        // $stmt->execute();

        // $stmt->setFetchMode(PDO::FETCH_ASSOC);



        while ($rowpat = $stmt->fetch()) {



        $bind = array('page_id' => $rowpat['page_id'],

                'page_title' => $rowpat['page_title'],

            'content' => $rowpat['content'],

            'page_heading' => $rowpat['page_heading'],

            'meta_description' => $rowpat['meta_description'],

            'meta_keywords' => $rowpat['meta_keywords']);

         

        }



        if ($stmt->execute($bind)) {

            return true;

        } else {

            return false;

        }

    }









public function addAwords() {



        $query = "insert into " . $this->awords . " (`id`,`image`, `description`, `year`)"

                . "values ( '$this->id','$this->page_image','$this->description','$this->year')";

        

        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        // $stmt->execute();

        // $stmt->setFetchMode(PDO::FETCH_ASSOC);



        while ($rowpat = $stmt->fetch()) {



        $bind = array('id' => $rowpat['id'],

            'image' => $rowpat['page_image'],

            'description' => $rowpat['description'],

            'year' => $rowpat['year']);

         

        }



        if ($stmt->execute($bind)) {

            return true;

        } else {

            return false;

        }

    }





    public function addNotice() {



        $query = "insert into " . $this->notice . " (`id`,`title`,`image`, `date`, `content`)"

                . "values ( '$this->id','$this->title','$this->notice_image','$this->date','$this->content')";

// print_r($query);

// exit();





        

        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        // $stmt->execute();

        // $stmt->setFetchMode(PDO::FETCH_ASSOC);



        while ($rowpat = $stmt->fetch()) {



        $bind = array('id' => $rowpat['id'],

            'title' => $rowpat['title'],

            'image' => $rowpat['notice_image'],

            'date' => $rowpat['date'],

            'content' => $rowpat['content']);

         

        }



        if ($stmt->execute($bind)) {

            return true;

        } else {

            return false;

        }

    }









    public function addProductimage() {



        // $query = "update " . $this->productimage . " set "

        //         . "product_img = '" . $this->product_img . "'"

        //         . "where pro_id = '" . $this->id . "'";

        //         print_r($query);

        //         exit();

        // (`proimg_id`, `pro_id`,`product_img`)"

        //         . "values ( '$this->proimg_id','$this->pro_id','$this->product_img')";



        // $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        // $stmt = $this->conn->prepare($query);



        // if ($stmt->execute()) {

        //     return true;

        //     } else {

        

        //         return false;

        //     }

        

        $query = "insert into " . $this->productimage . " (`proimg_id`, `pro_id`,`product_img`,`image_position`)"

        . "values ( '$this->proimg_id','$this->id','$this->product_img','$this->image_position')";



        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));



        //  print_r($query);

        //  exit();   





        if ($stmt->execute()) {

            return true;

            } else {



            return false;

    }

        

        



    }





    public function enquiry_insert() {



        $query = "INSERT INTO enquiry (pro_id,cst_name,email,phn_number,message,created_at) values ('$this->pro_id','$this->cst_name','$this->email','$this->phn_number','$this->message','$this->created_at')";

        

                

        $stmt = $this->conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));



        // print_r($stmt);

        //   exit();

        

         while ($rowpat = $stmt->fetch()) {



        // $bind = array('pro_id' => $rowpat['pro_id'],

        //          'cst_name' => $rowpat['cst_name'],

        //          'email' => $rowpat['email'],   

        //          'phn_number' => $rowpat['phn_number'],              

        //          'message' => $rowpat['message'],

        //          'created_at' => $rowpat['created_at']);        

         

         }



         if ($stmt->execute()) {

             return true;

         } else {

             return false;

         }

    }





    

     public function product_details() {

         

        // $query = "select * from " . $this->product . " ";



        $query = "SELECT $this->profile.cat_name,$this->product.* FROM $this->profile

                INNER JOIN $this->product ON $this->profile.cat_id = $this->product.cat_id"; 

        //  . $this->product . " ";



        // print_r($query);

        // exit;



        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while ($rowpat = $stmt->fetch()) {

            $list[] = array(

               'pro_id' => $rowpat['pro_id'],

                'cat_name' => $rowpat['cat_name'],

                'pro_name' => $rowpat['pro_name'],

              'pro_description' => $rowpat['pro_description'],

              'product_pdf_title' => $rowpat['product_pdf_title'],

              'pdf' => $rowpat['pdf'],

                'created_at' => $rowpat['created_at'],

                'update_at' => $rowpat['update_at']

                

            );

        }

        return $list;

    }





    public function application_details() {

         

        // $query = "select * from " . $this->product . " ";



        $query = "SELECT $this->application.cat_name,$this->application_details.* FROM $this->application

                INNER JOIN $this->application_details ON $this->application.cat_id = $this->application_details.cat_id"; 

        //  . $this->product . " ";



        // print_r($query);

        // exit;



        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while ($rowpat = $stmt->fetch()) {

            $list[] = array(

               'app_id' => $rowpat['app_id'],

               'cat_id' => $rowpat['cat_id'],

                'cat_name' => $rowpat['cat_name'],

                'app_name' => $rowpat['app_name'],

              'app_description' => $rowpat['app_description'],

              'app_image' => $rowpat['app_image'],

                'created_at' => $rowpat['created_at'],

                'updated_at' => $rowpat['updated_at']

                

            );

        }

        return $list;

    }









    public function employee_dep_details() {

         

        

        $query = "SELECT $this->department.department_name,$this->employee.* FROM $this->department

                INNER JOIN $this->employee ON $this->department.dep_id = $this->employee.dep_id"; 

       

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);



        while ($rowpat = $stmt->fetch()) {



            $list[] = array(

                'emp_id' => $rowpat['emp_id'],

               'dep_id' => $rowpat['dep_id'],

               'department_name' => $rowpat['department_name'],

                'employee_image' => $rowpat['employee_image'],

                'employee_name' => $rowpat['employee_name'],

              'emp_designation' => $rowpat['emp_designation'],

              'create_add' => $rowpat['create_add'],

              'update_add' => $rowpat['update_add']              

                

            );

        }

        return $list;

    }







    public function employee_dep_details1() {

         

        

                //     $query = "SELECT $this->department.department_name,$this->employee.* FROM $this->department

                // INNER JOIN $this->employee ON $this->department.dep_id = $this->employee.dep_id ORDER BY CAST($this->employee.sort_number AS UNSIGNED INTEGER) ASC";

                    $query = "SELECT $this->department.department_name,$this->employee.* FROM $this->department INNER JOIN $this->employee ON $this->department.dep_id = $this->employee.dep_id ORDER BY CAST($this->employee.sort_number AS UNSIGNED INTEGER) ASC";

                    $query = "SELECT $this->department.department_name,$this->department.sort_number AS dep_sort,$this->employee.* FROM $this->employee AS $this->employee INNER JOIN $this->department $this->department on $this->department.dep_id = $this->employee.dep_id ORDER BY $this->department.sort_number ASC, $this->employee.sort_number ASC";

                    $stmt = $this->conn->prepare($query);

                    $stmt->execute();

                while($row= $stmt->fetch(PDO::FETCH_ASSOC))

                {

                    $category[$row['department_name']][]=$row;

                    

                



                }

              return $category;



    }

                

    public function getTeamsHtml($data)

    {

	    $navLinks="<a class=\"nav-link %s \" id=\"nav-%s-tab\" data-toggle=\"tab\" href=\"#nav-%s\" role=\"tab\" aria-controls=\"nav-%s\" aria-selected=\"true\">%s</a>";



        $teamMemberLi= "<li class=\"info-tab\">

                  <div class=\"team-img\">

                      <img class=\"img-fluid\" src=\"upload/profile_image/%s\">

                  </div>

                  <div class=\"team-name\">

                     %s

                  </div>

                  <div class=\"team-content\">

                      %s

                  </div>

              </li>";



        $memberContainer= "<div class=\"tab-pane fade show %s\" id=\"nav-%s\" role=\"tabpanel\" aria-labelledby=\"nav-%s-tab\">

        <div class=\"course-inner\">

          <ul class=\"info-inner\">%s</ul>

        </div>

        </div>";

   

	    $navHtml="";

	    $teamHtml="";

	    $employeeHtml="";

	    $finalHtml="";

	    if(!empty($data))

	    {

		    $counter=0;

		    foreach($data AS $department => $teams)

		    {

			 $showActive= ($counter == 0) ? "active" : "";

			 $uniqueIndetifier= substr($department, 0,2);

			 //Build nav links

			 $navHtml .= vsprintf($navLinks, array($showActive, $uniqueIndetifier, $uniqueIndetifier, $uniqueIndetifier, $department));

			 

			 

			if(!empty($teams))

			{

                $employeeHtml="";

				foreach($teams AS $employee)

				{

					 //Building employee li

					 $employeeHtml .= vsprintf($teamMemberLi, array($employee['employee_image'], $employee['employee_name'], $employee['emp_designation']));

				}

				 

				 //Build Team container

			$teamHtml .= vsprintf($memberContainer, array($showActive, $uniqueIndetifier, $uniqueIndetifier, $employeeHtml));

				 

			}

                else{

				 $employeeHtml= "<li>No member found !</li>";

				 

				 $teamHtml .= vsprintf($memberContainer, array($showActive, $uniqueIndetifier, $uniqueIndetifier, $employeeHtml));

				 

			    }

			++ $counter;

		    }

	

        }

	    return <<<HTML

		<div class="services-box">

			<nav>

		<div class="nav nav-tabs" id="nav-tab" role="tablist">{$navHtml}</div></nav>

		<div class="tab-content" id="nav-tabContent">{$teamHtml}</div>

HTML;

    }







    public function enquiry_details() {

         

        

        $query = "SELECT $this->product.pro_name,$this->enquiry.* FROM $this->enquiry

                INNER JOIN $this->product ON $this->product.pro_id = $this->enquiry.pro_id"; 

       

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);



        while ($rowpat = $stmt->fetch()) {



            $list[] = array(

                'id' => $rowpat['id'],

               'pro_id' => $rowpat['pro_id'],

               'pro_name' => $rowpat['pro_name'],

               'cst_name' => $rowpat['cst_name'],

                'email' => $rowpat['email'],

              'phn_number' => $rowpat['phn_number'],

              'message' => $rowpat['message'],

              'created_at' => $rowpat['created_at'],

              

                

            );

        }

        return $list;

    }





    public function enquiry_all_details() {

         

        

        $query = "SELECT * FROM `enquiry_main` "; 

       

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);



        while ($rowpat = $stmt->fetch()) {



            $list[] = array(

                'id' => $rowpat['id'],

               'cst_name' => $rowpat['name'],

                'email' => $rowpat['email'],

              'phn_number' => $rowpat['number'],

              'country' => $rowpat['country'],

              'subject' => $rowpat['subject'],

              'message' => $rowpat['message'],

              'created_at' => $rowpat['created_at'],

              

                

            );

        }

        return $list;

    }





    public function product_imgdetails() {

         



        $query = "SELECT $this->product.pro_name,$this->productimage.* FROM $this->product

                INNER JOIN $this->productimage ON $this->product.pro_id = $this->productimage.pro_id"; 



        // print_r($query);

        // exit;



        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while ($rowpat = $stmt->fetch()) {

            $list[] = array(

               'proimg_id' => $rowpat['proimg_id'],

                'pro_name' => $rowpat['pro_name'],

                 'product_img' => $rowpat['product_img']

                // 'header_img' => $rowpat['header_img']

            );

        }

        return $list;

    }



    

    public function category() {



        $query = "select * from " . $this->profile . " ";

       // print_r($query);exit;

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





    public function category_emp() {



        $query = "select * from " . $this->employee . " ";

       // print_r($query);exit;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while ($rowpat = $stmt->fetch()) {

            $list[] = array(

                'dep_id' => $rowpat['dep_id'],

                'employee_image' => $rowpat['employee_image'],

                'employee_name' => $rowpat['employee_name'],

                'emp_designation' => $rowpat['emp_designation'],



                

            );

        }

        return $list;

    }



    

    public function category_dep() {



        $query = "select * from " . $this->department . " ";

       // print_r($query);exit;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while ($rowpat = $stmt->fetch()) {

            $list[] = array(

                'dep_id' => $rowpat['dep_id'],

                'department_name' => $rowpat['department_name']

                

            );

        }

        return $list;

    }





    







    // public function productdetails() {



    //     $query = "select * from " . $this->product . " ";

    //     $stmt = $this->conn->prepare($query);

    //     $stmt->execute();

    //     $stmt->setFetchMode(PDO::FETCH_ASSOC);

    //     while ($rowpat = $stmt->fetch()) {

    //         $list[] = array(

    //             'pro_id' => $rowpat['pro_id'],

    //             'pro_name' => $rowpat['pro_name']

                

    //         );

    //     }

    //     return $list;

    // }





    public function productdetails() {



        $query = "SELECT product_details.pro_name,product_image.* FROM 

        product_details INNER JOIN product_image ON

        product_details.pro_id = product_image.pro_id WHERE product_image.pro_id = $this->profile_id ";





         // print_r($query);

        // exit();



        // $query = "SELECT product_details.pro_name,product_image.* 

        //           FROM product_details, product_image 

        //           where 

        //           product_details.pro_id = product_image.pro_id 

        //           and product_image.pro_id = $this->profile_id ";

                  

        

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);





        return $rowpat = $stmt->fetchAll();



        // while ($rowpat = $stmt->fetchAll()) {

        //     $list = array(

        //         'pro_id' => $rowpat['pro_id'],

        //         'pro_name' => $rowpat['pro_name'],

        //         'product_img' => $rowpat['product_img']

        //     );

        // }

        // return $list;

    }





    public function productimgdelete() {

        $query = " DELETE FROM $this->productimage WHERE

                 proimg_id = $this->profile_id ";



        $stmt = $this->conn->prepare($query);



        // print_r($query);

        // exit();



        if ($stmt->execute()) {



            return true;

        }

    }





    public function productlist() {

        $list=[];

        // $query = "SELECT *  from " . $this->product . " WHERE cat_id ='" . $this->profilelistid . "' ";

       

        $query = "SELECT product_image.product_img,product_category.cat_id,product_category.cat_name,product_details.pro_description,product_details.pro_name ,product_details.pro_id

                  FROM product_details INNER JOIN product_image ON product_details.pro_id = product_image.pro_id 

                  INNER JOIN product_category ON product_category.cat_id = product_details.cat_id

                  WHERE product_category.cat_id = '" . $this->profilelistid . "' and product_image.image_position = 1 ";



        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);    

        while ($row = $stmt->fetch()) {

            $list[] = array(

                // 'cat_id' => $row['cat_id'],

                'pro_id' => $row['pro_id'],

                'pro_name' => $row['pro_name'],

                'pro_description' => $row['pro_description'],

                'image' => $row['product_img']

            );



            // $category[$row['cat_name']][]=$row;

        }

        return $list;

    }





    public function allproductlist() {

        $list=[];

        // $query = "SELECT *  from " . $this->product . " WHERE cat_id ='" . $this->profilelistid . "' ";

       

        $query = "SELECT product_image.product_img,product_details.pro_description,product_details.pro_name ,product_details.pro_id

                  FROM product_details INNER JOIN product_image ON product_details.pro_id = product_image.pro_id 

                  WHERE product_image.image_position = 1 ";



        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $stmt->fetch()) {

            $list[] = array(

                // 'cat_id' => $row['cat_id'],

                'pro_id' => $row['pro_id'],

                'pro_name' => $row['pro_name'],

                'pro_description' => $row['pro_description'],

                'image' => $row['product_img']

            );

        }

        return $list;

    }

    

    public function allJourneyList() {

        $list=[];

        // $query = "SELECT *  from " . $this->product . " WHERE cat_id ='" . $this->profilelistid . "' ";

       

        $query = "SELECT * FROM journey order by `id` ASC ";



        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $stmt->fetch()) {

            $list[] = array(

                // 'cat_id' => $row['cat_id'],

                'id' => $row['id'],

                'year' => $row['year'],

                'title' => $row['title'],

                'description' => $row['description']

            );

        }

        return $list;

    }

    

    public function allJourneyListDesc() {

        $list=[];

        

        $query = "SELECT * FROM journey ORDER BY `id` DESC";



        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $stmt->fetch()) {

            $list[] = array(

                // 'cat_id' => $row['cat_id'],

                'id' => $row['id'],

                'year' => $row['year'],

                'title' => $row['title'],

                'description' => $row['description']

            );

        }

        return $list;

    }



    public function applicationlist() {

        $list=[];

        // $query = "SELECT *  from " . $this->product . " WHERE cat_id ='" . $this->profilelistid . "' ";

       

        $query = "SELECT application_category.cat_name,application_details.* FROM application_details INNER JOIN application_category ON application_category.cat_id = application_details.cat_id";



        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $stmt->fetch()) {

//            $list[] = array(

//                // 'cat_id' => $row['cat_id'],

//                'app_id' => $row['app_id'],

//                'app_name' => $row['app_name'],

//                'app_description' => $row['app_description'],

//                'app_image' => $row['app_image']

//            );

            $category[$row['cat_name']][]=$row;

        }

        return $category;

    }

    

    public function getProductsHtml($data){

        $sideNav="<a class=\"nav-link %s \" id=\"v-pills-%s-tab\" data-toggle=\"pill\" href=\"#v-pills-%s\" role=\"tab\" aria-controls=\"v-pills-%s\" aria-selected=\"true\">%s</a>";

        

        $productDetails="<div class=\"col-xl-4 col-lg-6 pt-5\">

                           <div class=\"product-details\">

                               <div class=\"product-box\"> 

                                   <div class=\"gallery-part\">

                                       <div class=\"gallery\">

                                           <img class=\"img-fluid\" src=\"upload/profile_image/%s\">

                                       </div>

                                    </div>

                                    <div class=\"product-body\">

                                       <div class=\"product-title\">%s</div>

                                       <div class=\"product-content\">%s</div>

                                    </div>

                               </div>

                           </div>

                        </div>";

        

        $productContainer="<div class=\"tab-pane fade show %s\" id=\"v-pills-%s\" role=\"tabpanel\" aria-labelledby=\"v-pills-%s-tab\">

                            <div class=\"row\">%s</div>

                            </div>";

        

        $navHtml="";

	$categoryHtml="";

	$productHtml="";

	$finalHtml="";

	    if(!empty($data))

            {

                $counter=0;

                foreach($data AS $category => $subproduct)

		    {

			 $showActive= ($counter == 0) ? "active" : "";

			 $uniqueIndetifier= substr($category, 0,2);

			 //Build nav links

			 $navHtml .= vsprintf($sideNav, array($showActive, $uniqueIndetifier, $uniqueIndetifier, $uniqueIndetifier, $category));

                         if(!empty($subproduct))

			{

                            $categoryHtml="";

				foreach($subproduct AS $product)

				{

					 //Building product list

					 $categoryHtml .= vsprintf($productDetails, array($product['app_image'], $product['app_name'], $product['app_description']));

				}

				 

				 //Build product container

			$productHtml .= vsprintf($productContainer, array($showActive, $uniqueIndetifier, $uniqueIndetifier, $categoryHtml));

				 

			}

                    

                        else{

				 $categoryHtml= "<div>No data found !</div>";

				 

				 $productHtml .= vsprintf($productContainer, array($showActive, $uniqueIndetifier, $uniqueIndetifier, $categoryHtml));

				 

			    }

			++ $counter;

		    }

	

            }

	    return <<<HTML

                <div class="col-xl-3 col-lg-5 col-12 pt-5">

                    <div class="nav flex-column nav-pills pt-0" id="v-pills-tab" role="tablist" aria-orientation="vertical">{$navHtml}</div>

                </div>

                <div class="col-xl-9 col-lg-7 col-12">

                    <div class="why-tab">

                        <div class="tab-content" id="v-pills-tabContent">{$productHtml}</div>

                    </div>

                </div>

HTML;

    }





    public function productdetail() {

        $list=[];

        $query = "SELECT *  from " . $this->product . " WHERE pro_id ='" . $this->proid . "' ";



        // $query = "SELECT $this->productimage.product_img,$this->product.* FROM $this->productimage INNER JOIN $this->product ON $this->productimage.pro_id = $this->product.pro_id WHERE $this->product.pro_id = '" . $this->proid . "' "; 

        

        // $query = "SELECT product_image.product_img,product_details.* FROM product_image INNER JOIN product_details ON product_image.pro_id = product_details.pro_id WHERE product_details.pro_id = $this->proid ";

        

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);



        // return $row = $stmt->fetchAll();



        while ($row = $stmt->fetch()) {

            $list[] = array(

                // 'cat_id' => $row['cat_id'],

                'pro_id' => $row['pro_id'],

                'pro_name' => $row['pro_name'],

                'pro_description' => $row['pro_description'],

                'description' => $row['description'],

                'pdf' => $row['pdf']

                // 'image' => $row['image']

            );

        }



        // print_r($list);

        // exit();

        return $list;

    }







    public function productimage() {

        $list=[];



        

        $query = "SELECT product_image.product_img,image_position,product_details.* FROM product_image INNER JOIN product_details ON product_image.pro_id = product_details.pro_id WHERE product_details.pro_id = $this->proid ";

        

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);



        // return $row = $stmt->fetchAll();



        while ($row = $stmt->fetch()) {

            $list[] = array(

                'pro_id' => $row['pro_id'],

                'image_position' => $row['image_position'],

                'product_img' => $row['product_img']

            );

        }



        // print_r($list);

        // exit();

        return $list;

    }









    public function editProductimg() {

        $query = "update " . $this->productimage . " set "

                . "image_position = '" . $this->image_position . "'"

                . " where proimg_id = '" . $this->proimg_id . "'";



        $stmt = $this->conn->prepare($query);

        // return $stmt->queryString ;



        if ($stmt->execute()) {



            return true;

        }

    }







    public function Productimg() {

        $list=[];

        $query = "SELECT * FROM product_image WHERE image_position = '1' AND pro_id = $this->profile_id ";



        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        if(! $stmt->rowCount()) return false;

        while ($rowpat = $stmt->fetch()) {

            $list[] = array(

                'proimg_id' => $rowpat['proimg_id'],

                'image_position' => $rowpat['image_position']

                

            );

        }

        return $list;

        

       

    }







    

    

}

