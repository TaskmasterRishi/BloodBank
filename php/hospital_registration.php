<?php
// Check if form is submitted
require 'connection.php';
session_start();
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

    $email = $_SESSION["hospital_email"];

    // Prepare and bind SQL statement
    $getid = "SELECT id FROM hospitallogin WHERE email = '$email'";
    $id_result = mysqli_query($con, $getid);
    $row = mysqli_fetch_assoc($id_result);
    $id = $row['id'];

    // Insert data into bloodcenterdetail table
    $sql = "INSERT INTO bloodcenterdetail (ID, email, name, hospitalName, category, contact, faxNo, licenceNo, helplineNo, website, beds, state, district, city, landmark, pincode) 
            VALUES ('$id', '$email', '$bloodBankName', '$hospitalName', '$category', '$contact', '$faxNo', '$licenceNo', '$helplineNo', '$website', '$beds', '$state', '$district', '$city', '$landmark', '$pincode')";
    
    if (mysqli_query($con, $sql)) {
        // Retrieve inserted data
        $query2 = "SELECT * FROM bloodcenterdetail WHERE email = '$email'";
        $result2 = mysqli_query($con, $query2);

        if (mysqli_num_rows($result2) == 1) {
            $row2 = mysqli_fetch_assoc($result2);
            $_SESSION["hospital_id"] = $row2["id"];
            $_SESSION["hospital_name"] = $row2["name"];
            // Redirect to index.php or any other page
            echo "<script>alert('Registration Successful!');
             window.location.href = '../index.php';</script>";
            exit;
        } else {
            // Redirect back to the form page with an error message
            header("Location: ../hospitalDetails.php?status=error");
            exit;
        }
    } else {
        // Redirect back to the form page with an error message
        header("Location: ../hospitalDetails.php?status=error");
        exit;
    }
}
?>
