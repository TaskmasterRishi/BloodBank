<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start the session
session_start();

echo "Session started.<br>";

// Check if OTP is set in cookies
if (!isset($_COOKIE["otp"])) {
    echo "OTP not set in cookies. Redirecting...<br>";
    header("location: ../forgetPass.php?error=cookie is not set");
    exit;
}

echo "OTP set in cookies.<br>";

// Include database connection
require_once 'connection.php';

echo "Database connection included.<br>";

// Check if the form is submitted
if (isset($_POST["submit"])) {
    echo "Form submitted.<br>";
    // Get submitted OTP and new passwords
    $submittedOTP = $_POST["otp"];
    $newPassword = $_POST["newPass"];
    $confirmPassword = $_POST["cPass"];

    // Check if submitted OTP matches the one stored in the cookie
    if ($submittedOTP !== $_COOKIE["otp"]) {
        echo "Invalid OTP. Redirecting...<br>";
        header("location: ../resetPass.php?error=Invalid OTP. Please try again.");
        exit;
    }

    // Check if new passwords match
    if ($newPassword !== $confirmPassword) {
        echo "Passwords do not match. Redirecting...<br>";
        header("location: ../resetPass.php?error=Passwords do not match. Please try again.");
        exit;
    }

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Get email associated with the OTP from the session
    if (!isset($_SESSION["email"])) {
        echo "Email not set in session. Redirecting...<br>";
        header("location: ../forgetPass.php?error=email not set in session");
        exit;
    }
    $email = $_SESSION["email"];

    // Update the password in the database
    $updatePasswordQuery = "UPDATE donorLogIn SET password=? WHERE userEmail=?";
    $stmt = $con->prepare($updatePasswordQuery);
    $stmt->bind_param("ss", $hashedPassword, $email);

    if ($stmt->execute()) {
        // Password updated successfully
        // Display alert box
        echo "<script>alert('Password updated successfully.'); window.location.href='../donorLogin.php';</script>";
        exit;
    } else {
        // Error updating password
        echo "Error updating password. Redirecting...<br>";
        header("location: ../resetPass.php?error=Error updating password. Please try again.");
        exit;
    }
}

// If form is not submitted or invalid request, redirect back to reset password page
echo "Form not submitted or invalid request. Redirecting...<br>";
header("location: ../resetPass.php");
exit;
?>
