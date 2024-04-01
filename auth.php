<?php
// Start session
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    // Redirect to the login page
    header("location: donor_login.php");
    exit;
}
?>
