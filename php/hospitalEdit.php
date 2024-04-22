<?php
// Include your database connection file
include 'connection.php';
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $bloodBankName = $_POST['bloodBankName'];
    $hospitalName = $_POST['hospitalName'];
    $category = $_POST['category'];
    $contact = $_POST['contact'];
    $faxNo = $_POST['faxNo'];
    $licenceNo = $_POST['licenceNo'];
    $helplineNo = $_POST['helplineNo'];
    $website = $_POST['website'];
    $beds = $_POST['beds'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $landmark = $_POST['landmark'];
    $pincode = $_POST['pincode'];
    $email = $_SESSION['hospital_email'];
    // Update the database
    $sql = "UPDATE bloodcenterdetail SET
            name = '$bloodBankName',
            hospitalName = '$hospitalName',
            category = '$category',
            contact = '$contact',
            faxNo = '$faxNo',
            licenceNo = '$licenceNo',
            helplineNo = '$helplineNo',
            website = '$website',
            beds = '$beds',
            state = '$state',
            district = '$district',
            city = '$city',
            landmark = '$landmark',
            pincode = '$pincode'
            WHERE email = '$email'"; // assuming id 1 for the hospital, adjust it accordingly

    if ($con->query($sql) === TRUE) {
        // Display alert message and redirect
        echo "<script>alert('Record updated successfully'); window.location.href = '../hospitalProfile2.php';</script>";
    } else {
        echo "<script>alert('Error'); window.location.href = '../hospitalProfile2.php';</script>";
    }

    // Close the database connection
    $conn->close();
}
?>