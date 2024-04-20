<?php
// Start session
session_start();

// Check if the user is not logged in or user ID is not set
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true || !isset($_SESSION["user_id"])) {
    // Redirect to the login page
    header("location: donorLogin.php");
    exit;
}
?>
