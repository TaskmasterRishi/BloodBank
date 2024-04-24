<?php

session_start();
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if all POST variables are set
    foreach ($_POST as $key => $value) {
        if (!isset($_POST[$key])) {
            header("location: ../donateBlood.php?");
            die();
        }
    }

    // Retrieve form data
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
    $email = $_SESSION["user_email"]; // Assuming this is where you store the user's email

    // Check if age is below 18
    $dob = date_create($_POST["dob"]);
    $currentDate = new DateTime(); // current date

    $diff = date_diff($dob, $currentDate);
    $ageInDays = $diff->format("%R%a");
    $age = floor($ageInDays / 365);

    if ($age < 18) {
        header("location: ../donateBlood.php?error=Only above 18 are allowed to donate");
        die();
    }

    $dob = $dob->format('Y-m-d');

    // Fetch the donor's ID based on their email address
    $idQuery = "SELECT id FROM donordetail WHERE email = ?";
    $stmt = $con->prepare($idQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $idResult = $stmt->get_result();

    if ($idResult && $idResult->num_rows > 0) {
        $row = $idResult->fetch_assoc();
        $id = $row['id'];
    } else {
        echo "Donor ID not found";
        exit(); // Stop script execution
    }

    $checkRegisteredQuery = "SELECT * FROM camp WHERE donorid=? AND campid=?";
    $stmt = $con->prepare($checkRegisteredQuery);
    $stmt->bind_param("ii", $id, $_SESSION["camp_id"]);
    $stmt->execute();
    $checkRegisteredResult = $stmt->get_result();

    if ($checkRegisteredResult->num_rows > 0) {
        header("location: ../donateBlood.php?error=Already registered at this camp");
        die();
    }

    // Update donor details
    $donorDetailUpdate = "UPDATE donordetail SET 
        name = ?,
        contact = ?,
        gender = ?,
        dob = ?,
        bloodGroup = ?,
        height = ?,
        weight = ?,
        state = ?,
        district = ?,
        city = ?,
        landmark = ?,
        pincode = ?
        WHERE id = ?";
    $stmt = $con->prepare($donorDetailUpdate);
    $stmt->bind_param("ssssssssssssi", $fullName, $contactNumber, $gender, $dob, $bloodGroup, $height, $weight, $state, $district, $city, $landmark, $pincode, $id);
    if ($stmt->execute()) {
        $campid = $_SESSION["camp_id"];
        $insert = "INSERT INTO camp (`donorid`,`campid`,`present`) VALUES (?, ?, 'no')";
        $stmt = $con->prepare($insert);
        $stmt->bind_param("ii", $id, $campid);
        if ($stmt->execute()) {
            header("location: ../admit_card.php");
            die();
        } else {
            echo "Updated donor details but camp insertion failed";
        }
    } else {
        echo "Something is wrong. Please try again";
    }
} else {
    echo "<script>alert('Registered wan Unsuccessfully');</script>";
    header("location: ../index.php");
}
?>
