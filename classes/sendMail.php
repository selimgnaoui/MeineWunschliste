<?php
session_start();
if (!isset($_SESSION["user_id"]) ){
    header("location:../index.php");
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

if (isset($_POST["submit"]) ) {
    $subject=$_POST["subject"];
    $reciever=$_POST["email"];
    $body=$_POST["message"];

    sendInvitationPerMail ($subject,$reciever,$body);

}



function sendInvitationPerMail ($subject,$reciever,$content){
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'selim.gnaoui';   //username
    $mail->Password = 'lovingrasta94';   //password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');// Add a recipient
    $mail->addAddress($reciever);               // Name is optional
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    =$content;
    $mail->send();
    header("location:../meinlisten.php?user_id=".$_SESSION["user_id"]);
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}