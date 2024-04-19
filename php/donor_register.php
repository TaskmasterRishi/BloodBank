<?php

session_start();
require 'connection.php';
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
    $email = $_SESSION["user_email"];
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

    // Fetch the donor's ID based on their email address
    $idQuery = "SELECT id FROM donordetail WHERE email = '$email'";
    $idResult = mysqli_query($con, $idQuery);
    if ($idResult && mysqli_num_rows($idResult) > 0) {
        $row = mysqli_fetch_assoc($idResult);
        $id = $row['id'];
    } else {
        // Handle the case where the donor's ID is not found
        // You may redirect the user to an error page or perform other actions
        echo "Donor ID not found";
        exit(); // Stop script execution
    }

    // Insert the new donor record
    $donorDetailUpdate = "UPDATE donordetail SET 
    name = '$name',
    email = '$email',
    contact = '$mobile',
    gender = '$gender',
    dob = '$dob',
    bloodGroup = '$bloodgroup',
    height = '$height',
    weight = '$weight',
    address = '$address',
    pincode = '$pincode'
  WHERE id = '$id'";
    if (mysqli_query($con, $donorDetailUpdate)) {

        $campid=$_SESSION["camp_id"];
        $insert="INSERT INTO camp (`donorid`,`campid`,`present`) VALUES ($id,$campid,'no')";

        if(mysqli_query($con,$insert)){
        echo "<script>alert('Registered Successfully');</script>";
      header("../admit_card.php");
        die();
    }
    else{

        echo "Updated donordetails but camp insertion failed";
    }

    } else {
        echo "something is wrong. Please try again";
    }
} else {
    echo "<script>alert('Registered wan Unsuccessfully');</script>";
    header("location: ../index.php");
}
?>