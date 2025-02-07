<?php
//echo $_FILES['pdf']['name'];
//echo '<pre>';print_($_FILES);die;

date_default_timezone_set("Asia/Kolkata");
session_start();
extract($_POST);

$temp = explode(".", $_FILES["pdf"]["name"]);
$newfilename = round(microtime(true)) . '_pdf.' . end($temp);

$target_dir = "upload/profile_image/";
$target_file = $target_dir.$newfilename;
move_uploaded_file($_FILES["pdf"]["tmp_name"], $target_file);
        
require_once("./db/config1.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php'; 

$sql = "INSERT INTO `career_enquiry`(`first_name`, `last_name`, `email`, `phone`, `year_exp`, `job_id`, `pdf`, `message`, `created_at`) VALUES ('".$first_name."','".$last_name."','".$email."','".$phone."','".$year_exp."','".$job_data."','".$newfilename."','".$message."',now())";
// echo $sql;die;
$conn->query($sql);
$id=$conn->lastInsertId();

$querry="SELECT career_enquiry.* ,job_details.job_name FROM `career_enquiry` INNER JOIN job_details on job_details.job_id=career_enquiry.job_id WHERE career_enquiry.enquiry_id='".$id."'";
$query=$conn->query($querry);
$value = $query->fetch(PDO::FETCH_ASSOC);
$data=$value['job_name'];

// Create an instance of PHPMailer class 
$mail = new PHPMailer;

// SMTP configuration
$mail->isSMTP();
$mail->Host     = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'ketexpvtltd@gmail.com';
$mail->Password = 'Ketex @1234';
$mail->SMTPSecure = 'tls';
$mail->Port     = 587;

// Sender info 
$mail->setFrom('ketexpvtltd@gmail.com', 'Ketex'); 
// $mail->addReplyTo('reply@example.com', 'SenderName');

// Add a recipient
 $mail->addAddress('hrbackendketex@gmail.com');
//  $mail->addAddress($email);
 
// Add cc or bcc  
// $mail->addCC('cc@example.com'); 
// $mail->addBCC('bcc@example.com'); 
 
// Email subject 
$mail->Subject = 'Amer-Sil Ketex Private Limited Job Application Enquiry'; 
  
// Set email format to HTML 
$mail->isHTML(true); 
 
// Email body content 
$mailContent = "
    <html>
        
        <body style='width:80%; height:100%; padding:20px;'>
            
                <b>Hii,</b>
                <b>You have receive a application Enquiry from Amer-Sil Ketex Private Limited website</b>
                <br>
                <br>
                <b>Name</b> : $first_name &nbsp;".$last_name." <br>
                <b>Email ID</b> : $email <br>
                <b>Apply for</b> : $data <br>
                <b>Phone</b> : $phone  <br>
                <b>Message</b> : $message  <br>
                <br>
                <hr>
                Regards, <br>
                Amer-Sil Ketex Private Limited
                                    
                                    </td>
                                </tr>
                            </table>
                        </body>
                
                </html>";
 
$mail->Body = $mailContent; 
 
// Send email 
$mail->send();

// Create an instance of PHPMailer class 
$mail = new PHPMailer;

// SMTP configuration
$mail->isSMTP();
$mail->Host     = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'ketexpvtltd@gmail.com';
$mail->Password = 'Ketex @1234';
$mail->SMTPSecure = 'tls';
$mail->Port     = 587;

// Sender info 
$mail->setFrom('ketexpvtltd@gmail.com', 'Ketex'); 
// $mail->addReplyTo('reply@example.com', 'SenderName'); 
 
// Add a recipient 
 $mail->addAddress($email); 
 
// Add cc or bcc  
// $mail->addCC('cc@example.com'); 
// $mail->addBCC('bcc@example.com'); 
 
// Email subject 
$mail->Subject = 'Amer-Sil Ketex Private Limited Job Application Enquiry'; 
  
// Set email format to HTML 
$mail->isHTML(true); 
 
// Email body content 
$mailContent = "<html>
		
		<body style='width:80%; height:100%; padding:20px;'>
			<table align='center' style='padding:20px; border-radius:5px; line-height:30px;'>
				<tr>
					<td align='center' style='font-size:17px; border:1px solid blue; border-bottom: 5px solid blue;width:80%;'>
					<img src='https://ketex.com/assets/img/Ketex-logo-01.jpg' height:10%;' style='width: 200px; padding-top:20px;' ><hr><br>
				<span style='color:green;font-size:25px'><strong>Thank you for Applying at Amer-Sil Ketex Private Limited. </strong></span> <br>
                
                <strong>Name</strong> : $first_name &nbsp;$last_name  <br>
                <strong>Email ID</strong> : $email <br>
                <strong>Message</strong> : $message  <br>
                <strong>Applied for</strong></b> : $data <br>
                
                <br>

               <hr>

                Regards, <br>
                Amer-Sil Ketex Private Limited 
                                    
                                    </td>
                                </tr>
                            </table>
                        </body>
                
                </html>";
 
$mail->Body = $mailContent; 
 
// Send email 
$mail->send();


echo json_encode($_POST);		

?>		