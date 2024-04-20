<?php
session_start();
if(isset($_POST["hospital-login-submit"])){

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

    require_once("connection.php");

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
            global $emailInput;
            // Set login status and store user ID in session
            $_SESSION["hospitalLogin"] = true;
            
            $query2="SELECT * FROM bloodcenterdetail where email= '$emailInput'";
            
            $result=mysqli_query($con,$query2);
            $row2=mysqli_fetch_assoc($result);
            
            $_SESSION["hospital_id"] = $row2["id"];
            $_SESSION["hospital_name"]=$row2["name"];
            // Redirect to index.html
           
            header("location: ../index.php");
            exit(); // Stop further execution
        }

    }

    // Login failed, redirect to login page with error message
    header("location: ../hospitalLogin.php?error=*Email or password is incorrect");
    exit(); // Stop further execution
}
else{

    header("location: ../hospitalLogin.php");die();
}