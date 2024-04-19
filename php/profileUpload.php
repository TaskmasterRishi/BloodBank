<?php
session_start();
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile'])) {
    $fileTmpName = $_FILES['profile']['tmp_name'];
    $fileSize = $_FILES['profile']['size'];
    $fileError = $_FILES['profile']['error'];
    $fileType = $_FILES['profile']['type'];
    $id = $_SESSION["user_id"];

    if ($fileError === UPLOAD_ERR_OK) {
        $fileExt = strtolower(pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION));
        $allowed = array('jpeg', 'jpg', 'png');

        if (in_array($fileExt, $allowed)) {
            if ($fileSize < 10000000) { // Adjust the maximum file size as needed
                // Generate a unique filename based on an ID number
                $fileNameNew = $id . "." . $fileExt;

                // Define the file destination
                $fileDestination = dirname(__DIR__)."../profilePhotos/" . $fileNameNew;

                // Move the uploaded file to the destination
                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    // Insert the filename into the database
                    $sql = "UPDATE donorlogin SET imagename = '$fileNameNew' WHERE ID = $id";
                    if (mysqli_query($con, $sql)) {
                        // Redirect to the donor profile page after successful upload and update
                        header("Location: ../donorProfile.php");
                        // echo $fileDestination;
                        exit(); // Ensure that script execution stops after redirection
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($con);
                    }
                } else {
                    // Error occurred while uploading the file
                    echo "Error occurred while uploading the file.";
                }
            } else {
                // File is too large
                echo "File is too large.";
            }
        } else {
            // Wrong file extension
            echo "Wrong file extension.";
        }
    } else {
        // Error occurred during file upload
        echo "Error occurred during file upload.";
    }
} else {
    // No file selected
    echo "No file selected.";
}
?>
