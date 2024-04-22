<?php
session_start();
require_once ("connection.php");

if (isset($_POST["hospital-login-submit"])) {

    if (empty($_POST["email"]) || empty($_POST["password"])) {
        header("location: ../hospitalLogin.php?error=*Enter both email and password");
        exit(); // Stop further execution
    }

    // Retrieve email and password from the form
    $emailInput = $_POST["email"];
    $passwordInput = $_POST["password"];

    // Validate email format
    if (!filter_var($emailInput, FILTER_VALIDATE_EMAIL)) {
        header("location: ../hospitalLogin.php?error=*Enter a valid email");
        exit(); // Stop further execution
    }

    $sql = "SELECT * FROM hospitallogin WHERE email = '$emailInput'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 0) {
        header("location: ../hospitalSignup.php?error=*Email not registered");
        exit(); // Stop further execution
    }


    // Fetch user data from the database
    $query = "SELECT * FROM hospitallogin WHERE email = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $emailInput);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        // User found, verify password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($passwordInput, $row['pass'])) {
            global $emailInput; // unnecessary to declare $emailInput as global here

            // Set login status and store user ID in session
            $_SESSION["hospitalLogin"] = true;

            $query2 = "SELECT * FROM bloodcenterdetail WHERE email = ?";
            $stmt2 = mysqli_prepare($con, $query2);
            mysqli_stmt_bind_param($stmt2, "s", $emailInput);
            mysqli_stmt_execute($stmt2);
            $result2 = mysqli_stmt_get_result($stmt2);

            if (mysqli_num_rows($result2) == 1) {
                $row2 = mysqli_fetch_assoc($result2);
                $_SESSION["hospital_id"] = $row2["id"];
                $_SESSION["hospital_name"] = $row2["name"];
                $_SESSION["hospital_email"] = $emailInput;
                // Redirect to index.php
                header("location: ../index.php");
                exit(); // Stop further execution
            } else {
                // Email not found in bloodbank_details table, redirect to signup page with alert
                header("location: ../hospitalSignup.php?error=*Email not found in bloodcenterdetail table. Please sign up.");
                exit();
            }
        }
    }

    // Login failed, redirect to login page with error message
    header("location: ../hospitalLogin.php?error=*Email or password is incorrect");
    exit(); // Stop further execution
} else {

    header("location: ../hospitalLogin.php");
    die();
}
?>
