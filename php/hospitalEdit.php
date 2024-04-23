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

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Registered Successfully');</script>";
        if (isset($_SERVER['HTTP_REFERER'])) {
            $_SESSION['message'] = "Update successful";
            header("Location: {$_SERVER['HTTP_REFERER']}");
        } else {
            $_SESSION['error'] = "Update unsuccessful";
            header("Location: {$_SERVER['HTTP_REFERER']}"); // Redirect to a default page if HTTP_REFERER is not set
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