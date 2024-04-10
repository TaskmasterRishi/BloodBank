<?php

if(isset($_POST["admin-submit"])){
 
    foreach($_POST as $key => $value){

        if(empty($_POST[$key])){header("location: ../admin.php?error=Please enter $key field");die();}
    }

    $email=$_POST["email"];
    $pass=$_POST["pass"];
    $cpass=$_POST["cpass"];

    if($cpass!=$pass){header("location: ../admin.php?error=Please enter same password");die();}

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: ../admin.php?error=*Enter a valid email");
        exit(); // Stop further execution
    }
    // Validate password format
    else if (!preg_match('/[@$#%&*!]/', $pass) || strlen($pass) < 7) {
        header("location: ../admin.php?error=*Password should have minimum 7 characters and at least 1 special character");
        exit(); // Stop further execution
    }
    else{

        require_once ("connection.php");
        $checkUserQuery = "SELECT * FROM hospitalLogin WHERE email='$email'";
            $result = mysqli_query($con, $checkUserQuery);

            if (mysqli_num_rows($result) > 0) {
                header("location: ../admin.php?error=*Center  with this email already exists");
                exit();
            } else {
                // Hash the password
                $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

                // Insert new user with hashed password
                $sql = "INSERT INTO hospitalLogin (email, pass) VALUES ('$email', '$hashedPassword')";

                if (mysqli_query($con, $sql)) {
                    header("location: ../index.php");
                    exit();
                } else {
                    echo "ERROR: Something went wrong. Please try again.";
                }
            }
    }

}
else{

    header("location: ../admin.php");
    die();
}
