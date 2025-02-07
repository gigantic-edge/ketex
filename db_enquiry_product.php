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
        
       

		$sql = "INSERT INTO `enquiry` VALUES(null,'".$pro_id."','".$cst_name."','".$email."','".$phn_number."','".$message."',now()) ";
	    $res=$conn->query($sql);
	    $last_id = $conn->lastInsertId();
	   
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

// Add a recipient 
 $mail->addAddress('ketexpvtltd@gmail.com'); 

 
// Email subject 
$mail->Subject = 'Amer-Sil Ketex Private Limited Product Enquiry'; 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Email body content 
$select ="SELECT enquiry.*,product_details.pro_name,product_image.product_img from product_details inner join enquiry on product_details.pro_id = enquiry.pro_id INNER JOIN product_image on product_image.pro_id = product_details.pro_id where product_image.image_position = '1' and enquiry.id= '$last_id'";
$data =$conn->query($select);

$row = $data->fetch();

$mailContent = "
    <html>
        
        <body style='width:80%; height:100%; padding:20px;'>
            
                <b>Hii,</b>
                <b>You have receive a Ptoduct enquiry from Amer-Sil Ketex Private Limited website</b>
                <br>
                <br>";
               
$mailContent .= "<b>Product Name</b> : ".$row['pro_name']."<br>
                <b>Name</b> : ".$row['cst_name']."<br>
                <b>Email</b> ID : ".$row['email']."<br>
                <b>Phone</b> : ".$row['phn_number']."<br>
                <b>Message</b> :".$row['message']."<br>
                <br>";
              
$mailContent .= "<hr>
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