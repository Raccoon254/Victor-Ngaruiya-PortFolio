<?php



//Generate Activation String
function generateRandomString()
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < 5; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}




$name = "Test";
$email = $_POST["email"];
$subject = "Test";
$message = "<html>
<body>
    <h2>Hello &#128512;</h2></body>
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

$mail->Username = "cashout.earn@gmail.com";
$mail->Password = "bblpdzkwvlgidwud";

$mail->setFrom($email, $name);
$mail->addAddress("tomsteve187n@gmail.com", "Cashout Kenya");

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

header("Location: sent.html");