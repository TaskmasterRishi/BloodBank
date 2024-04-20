<?php
session_start();

if (isset($_POST["donor-login-submit"])) {
    // Check if email and password are provided
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        header("location: ../donorLogin.php?error=*Enter both email and password");
        exit(); // Stop further execution
    }

    // Retrieve email and password from the form
    $emailInput = $_POST["email"];
    $passwordInput = $_POST["password"];

    // Validate email format
    if (!filter_var($emailInput, FILTER_VALIDATE_EMAIL)) {
        header("location: ../donorLogin.php?error=*Enter a valid email");
        exit(); // Stop further execution
    }

    // Include database connection file
    require_once("connection.php");

    // Fetch user data from the database
    $query = "SELECT * FROM donorlogin WHERE userEmail = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $emailInput);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        // User found, verify password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($passwordInput, $row['password'])) {
            // Set login status and store user ID in session
            $_SESSION["login"] = true;
            $_SESSION["user_id"] = $row["ID"];
            $_SESSION["user_email"] = $row["userEmail"];
            
            // Redirect to index.html
            header("location: ../index.php");
            exit(); // Stop further execution
        }
    } else {
        // Account not found, redirect to sign up page with alert
        header("location: ../donorSignup.php?error=*Account not found. Please sign up.");
        exit(); // Stop further execution
    }

    // Login failed, redirect to login page with error message
    header("location: ../donorLogin.php?error=*Email or password is incorrect");
    exit(); // Stop further execution
} else {
    // If form submission is not set, redirect to login page
    header("location: ../donorLogin.php");
    exit(); // Stop further execution
}
?>
