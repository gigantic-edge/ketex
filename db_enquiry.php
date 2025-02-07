<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
extract($_POST);
require_once("./db/config1.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library files 
require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php'; 

$sql = "INSERT INTO `enquiry_main` VALUES(null,'".$cst_name."','".$email."','".$phn_number."','".$country."','".$subject."','".$message."',now()) ";
$res=$conn->query($sql);
if($res== true){
    
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
 $mail->addAddress('ketexpvtltd@gmail.com'); 
 
// Add cc or bcc  
// $mail->addCC('cc@example.com'); 
// $mail->addBCC('bcc@example.com'); 
 
// Email subject 
$mail->Subject = 'Amer-Sil Ketex Private Limited Enquiry'; 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Email body content 
$mailContent = "
    <html>
        
        <body style='width:80%; height:100%; padding:20px;'>
            
                <b>Hii,</b>
                <b>You have receive a enquiry from Amer-Sil Ketex Private Limited website</b>
                <br>
                <br>
                <b>Name</b> : $cst_name  <br>
                <b>Email</b> ID : $email <br>
                <b>Phone</b> : $phn_number  <br>
                <b>Subject</b> : $subject  <br>
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
if(!$mail->send()){ 
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
}else{ 
    echo 'Message has been sent.'; 
}

}
echo json_encode($_POST);		
?>		