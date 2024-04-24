<?php

session_start();
require 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fullName = $_POST['fullName'];
    $contactNumber = $_POST['contactNumber'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $bloodGroup = $_POST['bloodGroup'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $landmark = $_POST['landmark'];
    $pincode = $_POST['pincode'];
    $id = $_SESSION["user_id"];

    // Check if age is below 18
    $dobObj = new DateTime($dob);
    $currentDate = new DateTime(); // current date

    $age = $dobObj->diff($currentDate)->y;

    if ($age < 18) {
        header("Location: ../donateBlood.php?error=Only individuals above 18 are allowed to donate");
        
        exit();
    }

    // Validation for mobile number and pincode
    if (strlen($contactNumber) != 10 || !ctype_digit($contactNumber)) {
        header("Location: ../donateBlood.php?error=Mobile number should be a 10-digit number");
        exit();
    }

    if (strlen($pincode) != 6 || !ctype_digit($pincode)) {
        header("Location: ../donateBlood.php?error=Pincode should be a 6-digit number");
        exit();
    }

    // Update donor details in the hospital table
    $sql = "UPDATE donordetail SET name='$fullName', contact='$contactNumber', gender='$gender', dob='$dob', bloodGroup='$bloodGroup', height='$height', weight='$weight', state='$state', district='$district', city='$city', landmark='$landmark', pincode='$pincode' WHERE id='$id'";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Registered Successfully');</script>";
        if (isset($_SERVER['HTTP_REFERER'])) {
            header("Location: ../index.php");
        } else {
            header("Location: ../index.php"); // Redirect to a default page if HTTP_REFERER is not set
        }
        exit();
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        header("Location: ../index.php");
        exit();
    }
} else {
    echo "<script>alert('Registration Unsuccessful');</script>";
    header("Location: ../index.php");
    exit();
}
?>
