<?php



$name = $_POST["name"];
$email = $_POST["email"];
$subject = "Contact From Your Web";
$receivedMessage = $_POST["message"];

$message = "<html>
<body>
    <h2>Hello Victor &#128512;</h2>
    <h3>Notification via the Blazingly Fast Raccoon Mail Service &#9889;</h3>
    <p style='font-size: 15px;'>
        You have received a message from <br> &#128073; 
        <code style='color: #AA77FF;font-family: Google Sans; font-weight: 600; font-size: 20px;'>" . $name . "</code><br><br>
        The message is :
        <br>
        <code style='color: #AA77FF;font-family: Google Sans; font-weight: 600; font-size: 20px;'>" . $receivedMessage . "</code>
        <br>
        To email the sender click this button<br>
         <a href='mailto:" . $email . "' style='text-decoration: none;'>
               <button style='background-color: #AA77FF; color: white; border: none; padding: 10px 20px; border-radius: 5px;'>
                  Reply
               </button>
        <br> <br>
        
        <img width='20' src='https://stevosoro.xyz/images/fav.png' alt='Raccoon Logo'>
    </p></body>
</html>";

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->isHTML(true);

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "notification.raccoon@gmail.com";
$mail->Password = "cgnsgjbbtlmgtnhl";

$mail->setFrom($email, $name);
$mail->addAddress("tomsteve187@gmail.com", "Victor");

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

if ($mail) { echo "OK"; }
else { echo "Something went wrong. Please try again."; }

?>