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

    // echo all variables if they are not empty
    // echo "Blood Bank Name: " . (!empty($bloodBankName) ? $bloodBankName : "Not provided") . "<br>";
    // echo "Hospital Name: " . (!empty($hospitalName) ? $hospitalName : "Not provided") . "<br>";
    // echo "Category: " . (!empty($category) ? $category : "Not provided") . "<br>";
    // echo "Contact: " . (!empty($contact) ? $contact : "Not provided") . "<br>";
    // echo "Fax No: " . (!empty($faxNo) ? $faxNo : "Not provided") . "<br>";
    // echo "Licence No: " . (!empty($licenceNo) ? $licenceNo : "Not provided") . "<br>";
    // echo "Helpline No: " . (!empty($helplineNo) ? $helplineNo : "Not provided") . "<br>";
    // echo "Website: " . (!empty($website) ? $website : "Not provided") . "<br>";
    // echo "Beds: " . (!empty($beds) ? $beds : "Not provided") . "<br>";
    // echo "State: " . (!empty($state) ? $state : "Not provided") . "<br>";
    // echo "District: " . (!empty($district) ? $district : "Not provided") . "<br>";
    // echo "City: " . (!empty($city) ? $city : "Not provided") . "<br>";
    // echo "Landmark: " . (!empty($landmark) ? $landmark : "Not provided") . "<br>";
    // echo "Pincode: " . (!empty($pincode) ? $pincode : "Not provided") . "<br>";

    $email = $_SESSION["hospital_email"];
    // Prepare and bind SQL statement
    $sql = "INSERT INTO bloodbank_details (email,bloodBankName, hospitalName, category, contact, faxNo, licenceNo, helplineNo, website, beds, state, district, city, landmark, pincode) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssissssisssss", $email, $bloodBankName, $hospitalName, $category, $contact, $faxNo, $licenceNo, $helplineNo, $website, $beds, $state, $district, $city, $landmark, $pincode);


    // Execute SQL statement
    if ($stmt->execute()) {
        // Redirect back to the form page with a success message
        $query2 = "SELECT * FROM bloodbank_details WHERE email = '$email'";
        $result2 = mysqli_query($con,$query2);

        if (mysqli_num_rows($result2) == 1) {
            $row2 = mysqli_fetch_assoc($result2);
            $_SESSION["hospital_id"] = $row2["ID"];
            $_SESSION["hospital_name"] = $row2["bloodBankName"];
            // Redirect to index.html
            echo "<script>alert('Registration in Successfully!'); window.location.href = '../index.php';</script>";
            exit;
        } else {
            // Redirect back to the form page with an error message
            header("Location: ../hospitalDetails.php?status=error");
            exit;
        }
    }
}
?>