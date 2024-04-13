<?php

if(isset($_POST["submit"])){

    foreach($_POST as $key => $value){

        if(empty($_POST[$key])){

            header("location: ../hospital_profile.php?error=*Fill all fields.");
            die();
        }

    }
    session_start();

    $date=$_POST["date"];
    $name=$_POST["name"];
    $address=$_POST["address"];
    $state=$_POST["state"];
    $district=$_POST["district"];
    $contact=$_POST["contact"];
    $organizedBy=$_SESSION["hospital_name"];
    $time1=$_POST["time1"];
    $time2=$_POST["time2"];

    require_once("connection.php");

$checkquery="SELECT COUNT(*) as count FROM campdetail where organizedBy='$organizedBy' AND date='$date' AND district='$district' AND state='$state'";

$result=mysqli_query($con,$checkquery);
$row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if ($count > 0) {
        header("location: ../hospital_profile.php?error=Camp is already there.");
        die();
    }

    $campQuery="INSERT INTO campdetail (date,name,address,state,district,contact,organizedBy,time1,time2) VALUES ('$date','$name','$address',
                                                                                                                  '$state',
                                                                                                                  '$district',
                                                                                                                  '$contact',
                                                                                                                  '$organizedBy',
                                                                                                                  '$time1',
                                                                                                                  '$time2')";

    if (mysqli_query($con, $campQuery)) {
                    header("location: ../hospital_profile.php");
                    exit();
                } else {
                    echo "ERROR: Something went wrong. Please try again.";
                }
}
else{

    header("location: ../index.php");
}