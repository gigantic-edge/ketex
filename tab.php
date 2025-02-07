<?php
    
include 'conn.php';

if(isset($_GET['id'])){
    $id= $_GET['id'];
}



$category_sql = "select * from application_category";


$resultset = mysqli_query($com, $category_sql) or die("database error:". mysqli_error($com));


$active = "" ;

$category_html = '';

$application_details ='';

while( $category = mysqli_fetch_assoc($resultset) ) {
    if(isset($_GET['id'])){
        $id= $_GET['id'];

        if($category['cat_id'] == $id)
    {
        $active = "active";
    }
    else{
        $active = "";
    }

    }


    

	// $current_tab = "";

    // $current_content = "";

    // if(!$active_class) {

	// 	$active_class = 1;

	// 	$current_tab = 'active';

	// 	$current_content = 'in active';

	// }	

    
    // $category_html.="<li data-filter=\"{$category['cat_alias']}\" class=\"btn\">
    // <input type=\"radio\">
    // <a href=\"\" class=\"site-button-secondry\"><span>{$category['cat_name']}</span></a> 
    // </li>";


    // $category_html.="<a class=\"nav-link {$current_tab}\" id=\"v-pills-{$category['cat_alias']}-tab\" data-toggle=\"pill\" href=\"#v-pills-{$category['cat_alias']}\" role=\"tab\" aria-controls=\"v-pills-{$category['cat_alias']}\" aria-selected=\"true\">{$category['cat_name']}</a>";
    $category_html.="<a class=\"nav-link {$active}\" id=\"v-pills-{$category['cat_alias']}-tab\" href=\"application.php?id={$category['cat_id']}\" role=\"tab\" aria-controls=\"v-pills-{$category['cat_alias']}\" aria-selected=\"true\">{$category['cat_name']}</a>";
    


    $application_list = "SELECT * FROM application_details INNER JOIN application_category ON application_category.cat_id = application_details.cat_id
WHERE application_details.cat_id = {$category['cat_id']} ";

$result = mysqli_query($com, $application_list) or die("database error:". mysqli_error($com));

    while( $application = mysqli_fetch_assoc($result) ) {

        $application_details.="<div class=\"col-xl-4 col-lg-6 pt-5\">";
        $application_details.= "<div class=\"product-details\">";
        $application_details.= "<div class=\"product-box\">";
        $application_details.="<div class=\"gallery-part\">";
        $application_details.= "<div class=\"gallery\">";
        $application_details.='<img src="upload/profile_image/'.$application["app_image"].'" width= "310px;" height="200px;">';
        $application_details.= "</div>";
        $application_details.= "</div>";

        $application_details.= "<div class=\"product-body\">";
        $application_details.= "<div class=\"product-title\">";
        $application_details.= "{$application['app_name']}";
        $application_details.= "</div>";


        $application_details.= "<div class=\"product-content\">";
        $application_details.= "{$application['app_description']}";
        $application_details.= "</div>";
        $application_details.= "</div>";
        $application_details.= "</div>";
        $application_details.= "</div>";
        $application_details.= "</div>";
    }

    
  
     
    
        

}

