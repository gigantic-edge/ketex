<?php



// session_start();



require_once("db/config.php");

$database = new Database();

$conn = $database->connect();





require_once("ketex_admin/class/profile.php");

$profile = new profile($conn);



@$profileid = $_REQUEST['dep_id'];

// exit();

$profile->profile_id = $profileid;



$allTeamArr = $profile->allTeamlist();



$allMemberDelatilsArr = $profile->allMemberDelatils();
//echo '<pre>';print_r($allMemberDelatilsArr);die;


// foreach($allTeamArr as $row){

//     echo $row['dep_id'];

// }



//   print_r($allTeamArr); exit();





//$profilearr = $profile->allCareerlist();

//print_r($profilearr); 

//$deptvaluearr = $profile->allDeptvalues();



// include '';



// require_once("includes/footerInc.php");



?>



