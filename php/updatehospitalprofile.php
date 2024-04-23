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
            if ($fileSize < 1000000) { // Adjust the maximum file size as needed
                // Generate a unique filename based on an ID number
                $fileNameNew = $id . "." . $fileExt;

                // Define the file destination
                $fileDestination = dirname(__DIR__) . "/profilePhotosHospital/" . $fileNameNew;

                // Move the uploaded file to the destination
                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    // First, delete the existing photo if it exists
                    $sql_select = "SELECT imagename FROM hospitallogin WHERE ID = $id";
                    $result_select = mysqli_query($con, $sql_select);
                    if ($result_select) {
                        $row = mysqli_fetch_assoc($result_select);
                        $oldFileName = $row['imagename'];
                        if ($oldFileName) {
                            $oldFilePath = dirname(__DIR__) . "/profilePhotosHospital/" . $oldFileName;
                            if (file_exists($oldFilePath)) {
                                unlink($oldFilePath);
                            }
                        }
                    }
                    // Insert the filename into the database
                    $sql = "UPDATE hospitallogin SET imagename = '$fileNameNew' WHERE ID = $id";
                    if (mysqli_query($con, $sql)) {
                        // Set success message
                        // $_SESSION['message'] = "Upload successful";
                    } else {
                        // Set error message
                        $_SESSION['error'] = "Error: " . mysqli_error($con);
                    }
                } else {
                    // Set error message
                    $_SESSION['error'] = "Error occurred while uploading the file.";
                }
            } else {
                // Set error message
                $_SESSION['error'] = "File is too large. Size should be less than 1 mb";
            }
        } else {
            // Set error message
            $_SESSION['error'] = "Wrong file extension.";
        }
    } else {
        // Set error message
        $_SESSION['error'] = "Error occurred during file upload.";
    }

    // Redirect to the donor profile page
    header("Location: ../donorProfile.php");
    exit();
} else {
    // Set error message
    $_SESSION['error'] = "No file selected.";
    // Redirect to the donor profile page
    header("Location: ../donorProfile.php");
    exit();
}
?>