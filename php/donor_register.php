<?php

session_start();

if(isset($_POST["donor_register"])){
    require_once("connection.php");

    foreach($_POST as $key => $value){

        if(!isset($_POST[$key])){
            
            header("location: ../donateBlood.php?");
            die();
        }

    }

    if($_POST["age"]<18){

        header("location: ../donateBlood.php?error=Only above 18 are allowed to donate");
        die();
    }
    if($_POST["contact"]<10){

        header("location: ../donateBlood.php?error=Mobile number should not be greater than 10");
        die();
    }

    $name=$_POST["name"];
    $email=$_SESSION["user_email"];
    $age=$_POST["age"];
    $contact=$_POST["mobile"];
    $gender=$_POST["gender"];
    $blood=$_POST["blood"];
    $address=$_POST["address"];
    $camp_id=$_POST["id"];

    $donorDetailInsert="INSERT INTO donordetail (name,email,age,contact,gender,blood,address,campid) VALUES ('$name',
                                                                                                             '$email',
                                                                                                             '$age',
                                                                                                             '$contact',
                                                                                                             '$gender',
                                                                                                             '$blood',
                                                                                                             '$address',
                                                                                                             $camp_id)";
    $emailcheck="SELECT * FROM donordetail WHERE email='$email' AND campid=$camp_id";

    $result=mysqli_query($con,$emailcheck);

    if(mysqli_num_rows($result)>0){
        header("location: ../donateBlood.php?error=user has already registered;");
        die();
    }

    if(mysqli_query($con,$donorDetailInsert)){

        echo "<script>alert('Registered Successfully');</script>";
        header("location: ../index.php");
        die();
    }
    else{

        echo "something is wrong. Please try again"; 
    }

}
else{

    header("location: ../index.php");
}