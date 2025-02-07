<?php

include 'conn.php';

$department_sql = "SELECT dep_id ,department_name,  FROM employee_department where status = 1 ORDER BY sort ASC";

$resultset = mysqli_query($conn, $department_sql) or die("database error:". mysqli_error($conn));

$active_class = 0 ;

$department_html = '';

$employee_details_html = '';

while( $department = mysqli_fetch_assoc($resultset) ) {

	$current_tab = "";

    $current_content = "";

    if(!$active_class) {

		$active_class = 1;

		$current_tab = 'active';

		$current_content = 'in active';

	}	


    $department_html. = "<a class=\"nav-link  col-lg-2 p-0\" id=\"nav-home-tab\" data-toggle=\"tab\" href=\"#nav-home\" role=\"tab\" aria-controls=\"nav-home\" aria-selected=\"true\">{$department['department_name']}</a>";
    
    // $category_html.="<li data-filter=\"{$category['cat_alias']}\" class=\"btn\">
    // <input type=\"radio\">
    // <a href=\"\" class=\"site-button-secondry\"><span>{$category['cat_name']}</span></a> 
    // </li>";


    


    //  $product_html .="<ul id=\"masonry{$category['cat_alias']}\"
    //  class=\"row dez-gallery-listing gallery-grid-4 m-b0 mfp-gallery {$current_tab}\">";

    
  
     
    $employee_sql = "SELECT employee_department.department_name,employee_department_details.* FROM employee_department INNER JOIN employee_department_details ON employee_department.dep_id = employee_department_details.dep_id  where employee_department_details.dep_id = ".$department["dep_id"]."  ;

    //  $product_sql = "SELECT cat_id, image FROM details WHERE status = 1 AND cat_id = ".$category["cat_id"];

		$employee_results = mysqli_query($conn, $employee_sql) or die("database error:". mysqli_error($conn));



		// if(!mysqli_num_rows($product_results)) {	

		// 	$product_html .=  '<span class="blank-content">Your consultant will available soon.</span>';			

		// }
        // $product_html .=  '<div class="row">'; 
        
        while( $employee = mysqli_fetch_assoc($employee_results) ) {



            $employee_details_html .='<li class="info-tab">';
            $employee_details_html .='<div class="team-img">';
            $employee_details_html .='';





            // $product_html .="<li class=\"{$category['cat_alias']} card-container col-lg-4 col-md-4 col-sm-6 col-xs-6\">";
            // $product_html .= '<div class="column">';
            // $product_html .='<div class="dez-box dez-gallery-box">';
            // $product_html .= '<div class="dez-thum dez-img-overlay1 dez-img-effect zoom-slow"><a href="javascript:void(0);"> <img src="upload/profile_image/'.$product["image"].'"  alt=""> </a>';
            // $product_html .= '<div class="overlay-bx">';
            // $product_html .= '<div class="overlay-icon"><a href="javascript:void(0);"></a> <a href="upload/profile_image/'.$product["image"].'" class="mfp-link" title="Title Come Here"> <i class="fa fa-picture-o icon-bx-xs"></i> </a></div>';
            // $product_html .=  '</div>';
            // $product_html .=  '</div>';
            // $product_html .=  '</div>';
            
        }
        
        // $product_html .=  '</div>';
        $product_html .=  "</li>";
        

}