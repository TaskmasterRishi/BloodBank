<?php
// Include auth.php to check login status
require_once("connection.php");
session_start();

// Check if user is logged in
if (isset($_SESSION["user_id"])) {
    $id = $_SESSION["user_id"];
    $fetchProfilePhotoQuery = "SELECT imagename FROM donorlogin WHERE id = '$id'";
    $result = mysqli_query($con, $fetchProfilePhotoQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        $data2 = mysqli_fetch_assoc($result);

        // Check if $data2 is not null and contains the image name
        if (isset($data2["imagename"])) {
            // Construct profile photo path
            $profilePhotoPath = "/opt/lampp/htdocs/PHP_Project_BBMS/profilePhotos/" . $data2["imagename"];

            // Verify if the image file exists before attempting deletion
            if (file_exists($profilePhotoPath)) {
                if (unlink($profilePhotoPath)) {
                    // Redirect after successful deletion
                    include 'signout.php';

                    // Delete user data from relevant tables
                    $deleteDonorDetailQuery = "DELETE FROM donordetail WHERE id = '$id'";
                    $deleteDonorLoginQuery = "DELETE FROM donorlogin WHERE id = '$id'";

                    // Execute deletion queries with error handling
                    if (mysqli_query($con, $deleteDonorDetailQuery) && mysqli_query($con, $deleteDonorLoginQuery)) {
                        header("Location: ../index.php"); // Replace 'deleted_successfully.php' with your desired page
                        exit();
                    } else {
                        // Display an error message if the deletion queries fail
                        echo "Error deleting user data: " . mysqli_error($con);
                    }
                } else {
                    echo "Error deleting image file";
                }
            } else {
                echo "Could not delete $profilePhotoPath, file does not exist";
            }
        } else {
            echo "Profile photo not found in database";
        }
    } else {
        echo "No profile photo record found for this user";
    }
} else {
    echo "Session destroyed";
}
?>
