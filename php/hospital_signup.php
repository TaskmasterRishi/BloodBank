<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if any required field is empty
    if (empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["cpass"])) {
        header("location: ../hospitalSignup.php?error=*Enter correct email, password, and username");
        exit();
    } else {
        $userMail = $_POST["email"];
        $password = $_POST["password"];
        $cPass = $_POST["cpass"];

        // Validate email format
        if (!filter_var($userMail, FILTER_VALIDATE_EMAIL)) {
            header("location: ../hospitalSignup.php?error=*Enter correct email");
            exit();
        }
        // Validate password format
        else if (!preg_match('/[@$#%&*!]/', $password) || strlen($password) < 7) {
            header("location: ../hospitalSignup.php?error=*Password should have minimum 7 characters and at least 1 special character");
            exit();
        }
        // Check if passwords match
        else if ($password != $cPass) {
            header("location: ../hospitalSignup.php?error=*Enter the same password in both fields");
            exit();
        } else {
            require_once("connection.php");

            // Check if user already exists
            $checkUserQuery = "SELECT * FROM hospitallogin WHERE email='$userMail'";
            $result = mysqli_query($con, $checkUserQuery);

            if (mysqli_num_rows($result) > 0) {
                header("location: ../hospitalLogin.php?error=*User with this email already exists");
                exit();
            } else {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insert new user with hashed password
                $sql = "INSERT INTO hospitallogin (email, pass) VALUES ('$userMail', '$hashedPassword')";

                if (mysqli_query($con, $sql)) {
                    // Retrieve the ID of the newly inserted row in hospitallogin table
                    $hospitalLoginID = mysqli_insert_id($con);

                    // Set session variables
                    $_SESSION["login"] = true;
                    $_SESSION["hospital_id"] = $hospitalLoginID;
                    $_SESSION["hospital_email"] = $userMail;

                    // Redirect to hospitalDetails.php
                    echo "<script>alert('Sign in Successfully!'); window.location.href = '../hospitalDetails.php';</script>";
                    exit(); // Exit the script
                } else {
                    header("location: ../hospitalSignup.php?error=*Something went wrong. Please try again.");
                    exit();
                }
            }
        }
    }
} else {
    header("location: ../hospitalSignup.php");
    exit();
}
?>
