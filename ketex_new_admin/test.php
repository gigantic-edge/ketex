<?php

//Overall URL = https://www.fast2sms.com/dev/bulkV2?authorization=xskRKm0yVrOqzeXfz46Z0t1KDSzAySDyjCrWsO3e3gkIJAHv7brarEFJNJkh&route=v3&sender_id=Cghpet&message=test%20mssae
//&language=english&flash=1&numbers=9924637668

$message2 = "
Your OTP Is 1234
Thank you,
Safe Sanjivani";	
$mobileNo = $userData['mobileNo'];

$authKey = $msgAuthKey;

$senderId = $senderIdMain;

$message = urlencode($message2);

$route = "4";
$url = "https://www.fast2sms.com/dev/bulkV2";

$ch = curl_init();
    $headers = array(
    'Accept: application/json',
    'Content-Type: application/json',

    );
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $body = '{authorization:xskRKm0yVrOqzeXfz46Z0t1KDSzAySDyjCrWsO3e3gkIJAHv7brarEFJNJkh,route :v3,sender_id:Cghpet,message:test,language:english,numbers:9924637668,flash:0}';

    curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
    curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Timeout in seconds
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);

    $authToken = curl_exec($ch);

    echo $authToken;exit;
    
curl_close($ch);
?>