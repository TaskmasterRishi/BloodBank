<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../vendor/autoload.php';
require 'connection.php';
session_start();
function generateOTP()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $otp = '';
    $max = strlen($characters) - 1;
    for ($i = 0; $i < 6; $i++) {
        $otp .= $characters[mt_rand(0, $max)];
    }
    return $otp;
}

if (isset($_POST["email"])) {
    // Check if the email exists in the database
    $email = $_POST["email"];
    $stmt = $con->prepare("SELECT * FROM donorlogin WHERE userEmail=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        // Email does not exist in the database
        header("location: ../forgetPass.php?error=*Email not found in the database.");
        exit;
    }

    // Email exists, proceed with sending OTP
    $mail = new PHPMailer(true);
    $otp = generateOTP();

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'lorem.ipsum.sample.email@gmail.com';
        $mail->Password = 'tetmxtzkfgkwgpsc';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Recipients
        $mail->setFrom('lorem.ipsum.sample.email@gmail.com', 'Red Bank');
        $mail->addAddress($email);
        $mail->addReplyTo('lorem.ipsum.sample.email@gmail.com', 'Red Bank');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset for BloodBank';
        $mail->Body = "Your OTP for password reset is: $otp";

        $mail->send();

        // Set the OTP in a cookie
        setcookie('otp', $otp, time() + (60 * 5)); // Expiry time: 5 minutes
        
        // Store email in session
        $_SESSION['email'] = $_POST["email"];

        echo "
            <script>
            alert('Message was sent successfully. Thank you for reaching us!');
            window.location.href = '../resetPass.php';
            </script>
        ";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
