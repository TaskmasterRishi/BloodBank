<?php

if(isset($_POST["delete"])){

    require_once("connection.php");
    $id=$_POST["id"];

    $campDeleteQuery="DELETE FROM campdetail WHERE id = ".$id;

    if (mysqli_query($con, $campDeleteQuery)) {
        header("location: ../hospital_profile.php");
        exit();
    } else {
        echo "ERROR: Something went wrong. Please try again.";
    }

}
else{

    header("location: ../index.php");
    die();
}