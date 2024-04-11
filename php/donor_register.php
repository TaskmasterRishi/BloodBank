<?php

session_start();

if (isset($_POST["donor_register"])) {
    require_once ("connection.php");

    foreach ($_POST as $key => $value) {
        if (!isset($_POST[$key])) {
            header("location: ../donateBlood.php?");
            die();
        }
    }

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["mail"];
    $mobile = $_POST["phone"];
    $gender = $_POST["gender"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $bloodgroup = $_POST["bloodgroup"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $district = $_POST["district"];
    $landmark = $_POST["landmark"];
    $pincode = $_POST["pincode"];
    $camp_id = $_POST["camp_id"];

    // Check if age is below 18
    $dob = date_create($_POST["dob"]);
    $currentDate = date_create(); // current date

    $diff = date_diff($dob, $currentDate);
    $ageInDays = $diff->format("%R%a");
    $age = floor($ageInDays / 365);

    if ($age < 18) {
        header("location: ../donateBlood.php?error=Only above 18 are allowed to donate");
        die();
    }
    $dob = $dob->format('Y-m-d');

    if (strlen($mobile) != 10) {
        header("location: ../donateBlood.php?error=Mobile number should a 10 digit number");
        die();
    }

    if (strlen($pincode) != 6) {
        header("location: ../donateBlood.php?error=Pincode should be a 6 digit number");
        die();
    }

    $address = $landmark . ", " . $city . ", " . $district . ", " . $state;
    $name = $fname . " " . $lname;

    // Check for duplicate registration
    $checkDuplicateQuery = "SELECT COUNT(*) as count FROM donordetail WHERE email = '$email' OR contact = '$mobile' OR campid='$camp_id'";
    $result = mysqli_query($con, $checkDuplicateQuery);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if ($count > 0) {
        header("location: ../donateBlood.php?error=Duplicate registration. You are already registered as a donor.");
        die();
    }


    // Insert the new donor record
    $donorDetailInsert = "INSERT INTO donordetail (name,email,contact,gender,dob,bloodGroup,height,weight,address,pincode,campid) VALUES ('$name','$email','$mobile','$gender','$dob','$bloodgroup','$height','$weight','$address','$pincode','$camp_id')";

    if (mysqli_query($con, $donorDetailInsert)) {
        echo "<script>alert('Registered Successfully');</script>";
        header("location: ../index.php");
        die();
    } else {
        echo "something is wrong. Please try again";
    }
} else {
    header("location: ../index.php");
}
?>