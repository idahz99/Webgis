<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home8/crimsonw/public_html/s269349/Webgis/PHPMailer/src/Exception.php';
require '/home8/crimsonw/public_html/s269349/Webgis/PHPMailer/src/PHPMailer.php';
require '/home8/crimsonw/public_html/s269349/Webgis/PHPMailer/src/SMTP.php';


include_once("dbcon.php");
    
$email = $_POST['email'];
//$generatenewpass = random_password(10);
//$passha1 = sha1($generatenewpass);
$generateotp = rand(1000,9999);


$sql = "SELECT * FROM admin_user WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $sqlupdate = "UPDATE admin_user SET Token= '$generateotp' WHERE email = '$email'";
        if ($conn->query($sqlupdate) === TRUE){
                 echo 'success';
                sendEmail($generateotp,$email);
                //header("location:newpassword.php");
                //exit();
               
        }else{
                echo 'failed';
        }
    }else{
        echo "failed";
    }

function sendEmail($generateotp,$email){
   $mail = new PHPMailer(true);

    $mail->SMTPDebug = 0;                                               //Disable verbose debug output
    $mail->isSMTP();                                                    //Send using SMTP
    $mail->Host       = 'mail.crimsonwebs.com';                          //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                           //Enable SMTP authentication
    $mail->Username   = 'dyslexiamaps@crimsonwebs.com';                  //SMTP username
    $mail->Password   = 'Umi#pw4%X+JY';                                 //SMTP password
    $mail->SMTPSecure = 'tls';         
    $mail->Port       =  587;
    
    $from = "dyslexiamaps@crimsonwebs.com";
    $to = $email;
    $subject = 'From DyslexiaMap.Please verify your account';
    $message ="<p>Here is you token. Please click link to reset your password.</p><br><br><h3>Token:".$generateotp.
    "</h3><br><br><a href='newpassword.php?email=".$email."&key=".$generateotp."'>Click Here to activate account</a>";
    
    $mail->setFrom($from,"DyslexiaMap");
    $mail->addAddress($to);                                                     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                                //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->send();
}

function random_password($length){
    //A list of characters that can be used in our random password
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //Create blank string
    $generatedpassword = '';
    //Get the index of the last character in our $characters string
    $characterListLength = mb_strlen($characters, '8bit') - 1;
    //Loop from 1 to the length that was specified
    foreach(range(1,$length) as $i){
        $generatedpassword .=$characters[rand(0,$characterListLength)];
    }
    return $generatedpassword;
}