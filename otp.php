<?php
session_start();
include("classes/connect.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer-master/src/Exception.php';
require_once 'PHPMailer-master/src/PHPMailer.php';
require_once 'PHPMailer-master/src/SMTP.php';

function generateOTP() {
    $otp = rand(100000, 999999);
    return $otp;
}

function sendOTPEmail($otp, $email) {
    $mail = new PHPMailer(true);

    try {
        // Disable SSL certificate verification
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'bgmabayo77@gmail.com';
        $mail->Password   = 'dldp lwdv ndzh uolk';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Sender and recipient
        $mail->setFrom('bgmabayo77@gmail.com', 'Campus News Portal');
        $mail->addAddress($email); 
        $mail->Body    = "Your OTP is: $otp";
        $mail->send();
        echo 'OTP has been sent to your email.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $otp = generateOTP();
    $_SESSION['otp'] = $otp;
    sendOTPEmail($otp, $_POST['email']);
}
?>
