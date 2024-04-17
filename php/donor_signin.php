<?php
if (isset($_POST["donor-signin-submit"])) {
    // Check if any required field is empty
    if (empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["cpass"]) || empty($_POST["userName"])) {
        header("location: ../donor_login.php?error=*Enter correct email, password, and username");
        exit();
    } else {
        $userMail = $_POST["email"];
        $password = $_POST["password"];
        $cPass = $_POST["cpass"];
        $userName = $_POST["userName"];

        // Validate email format
        if (!filter_var($userMail, FILTER_VALIDATE_EMAIL)) {
            header("location: ../donor_login.php?error=*Enter correct email");
            exit();
        }
        // Validate password format
        else if (!preg_match('/[@$#%&*!]/', $password) || strlen($password) < 7) {
            header("location: ../donor_login.php?error=*Password should have minimum 7 characters and at least 1 special character");
            exit();
        }
        // Check if passwords match
        else if ($password != $cPass) {
            header("location: ../donor_login.php?error=*Enter the same password in both fields");
            exit();
        } else {
            require_once("connection.php");

            // Check if user already exists
            $checkUserQuery = "SELECT * FROM donorlogin WHERE userEmail='$userMail'";
            $result = mysqli_query($con, $checkUserQuery);

            if (mysqli_num_rows($result) > 0) {
                header("location: ../donor_login.php?error=*User with this email already exists");
                exit();
            } else {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insert new user with hashed password
                $sql = "INSERT INTO donorlogin (userEmail, password) VALUES ('$userMail', '$hashedPassword')";

                if (mysqli_query($con, $sql)) {
                    // Retrieve the ID of the newly inserted row in donorlogin table
                    $donorLoginID = mysqli_insert_id($con);

                    // Insert user details into donordetail table
                    $sql = "INSERT INTO donordetail (id, name, email) VALUES ('$donorLoginID', '$userName', '$userMail')";

                    if (mysqli_query($con, $sql)) {
                        header("location: ../index.php");
                        exit();
                    } else {
                        echo "ERROR: Something went wrong. Please try again.";
                    }
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
