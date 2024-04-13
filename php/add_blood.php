<?php

if(isset($_POST["add_blood_submit"])){
session_start();

    foreach($_POST as $key => $value){

        if(empty($_POST[$key])){header("location: ../add_blood.php?error=Enter all fields");die();}
    }
    require_once("connection.php");
    
    $email=$_POST["email"];
    $type=$_POST["type"];
    $amount=$_POST["amount"];



    $query="SELECT * FROM donordetail where  email='$email' AND present='yes' AND campid=".$_SESSION["camp_id"];
    $result=mysqli_query($con,$query);

$userexist=false;

    while($row=mysqli_fetch_array($result)){

        if($row["email"]==$email){

            $userexist=true;
        }
        else{continue;}
    }
     if($userexist ){

            $query="INSERT INTO blooddetail (email,type,amount,bloodcenterid) VALUES ('$email','$type',$amount,
                                                                                    '".$_SESSION["hospital_id"]."')";
            
            mysqli_query($con,$query);
            $updatequery="UPDATE donordetail SET present='done' WHERE email='$email' AND present='yes' AND campid=".$_SESSION["camp_id"];
            mysqli_query($con,$updatequery);
            header("location: ../add_blood.php");
     }
     else{

        header("location: ../add_blood.php?error=user does not exist");die();
     } 
    
    


}
else{

    header("location: ../index.php");die();
}