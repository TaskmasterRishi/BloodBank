<?php

if(isset($_POST["add_blood_submit"])){
session_start();

    foreach($_POST as $key => $value){

        if(empty($_POST[$key])){header("location: ../add_blood.php?error=Enter all fields");die();}
    }
    require_once("connection.php");
    
    $donorid=$_POST["donorid"];
    $type=$_POST["type"];
    $amount=$_POST["amount"];



    $query="SELECT * FROM donordetail INNER JOIN camp ON donordetail.id=camp.donorid AND donorid='$donorid' AND present='yes' AND campid=".$_SESSION["camp_id"];
    $result=mysqli_query($con,$query);

$userexist=false;

    while($row=mysqli_fetch_array($result)){

        if($row["donorid"]==$donorid){

            $userexist=true;
        }
        else{continue;}
    }
     if($userexist){

            $query="INSERT INTO blooddetail (donorid,type,amount,bloodcenterid) VALUES ('$donorid','$type',$amount,
                                                                                    '".$_SESSION["hospital_id"]."')";
            
            mysqli_query($con,$query);
            $updatequery="UPDATE camp  SET present='done' WHERE donorid='$donorid' AND present='yes' AND campid=".$_SESSION["camp_id"];
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