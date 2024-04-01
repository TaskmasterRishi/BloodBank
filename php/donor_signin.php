<?php
if (isset($_POST["donor-signin-submit"])) {
    // Check if any required field is empty
    if (empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["cpass"])) {
        header("location: ../donor_login.php?error=*Enter correct email or password");
        exit();
    } else {
        $userMail = $_POST["email"];
        $password = $_POST["password"];
        $cPass = $_POST["cpass"];

        // Validate email format
        if (!preg_match('/@gmail.com$/i', $userMail)) {
            header("location: ../donor_login.php?error=*Enter correct email");
            exit();
        }
        // Validate password format
        else if (!preg_match('/[@$#%&*!]/', $password) || strlen($password) < 7) {
            header("location: ../donor_login.php?error=*Password should have minimum 7 characters and atleast 1 special characater");
            exit();
        }
        // Check if passwords match
        else if ($password != $cPass) {
            header("location: ../donor_login.php?error=*Enter same password in both fields");
            exit();
        } else {
            require_once ("connection.php");

            // Check if user already exists
            $checkUserQuery = "SELECT * FROM donorLogIn WHERE userEmail='$userMail'";
            $result = mysqli_query($con, $checkUserQuery);

            if (mysqli_num_rows($result) > 0) {
                header("location: ../donor_login.php?error=*User with this email already exists");
                exit();
            } else {
                // Insert new user
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO donorLogIn (userEmail, password) VALUES ('$userMail', '$hashedPassword')";

                if (mysqli_query($con, $sql)) {
                    header("location: ../index.html");
                    exit();
                } else {
                    echo "ERROR: Something went wrong. Please try again.";
                }
            }
        }
    }
} else {
    die();
}
?>