<?php

if(isset($_POST["donor-signin-submit"])){

    if(empty($_POST["email"]) || empty($_POST["password"] || empty($_POST["cpass"]))){

        header("location: ../donor_login.php?error=*Enter correct email or password");
    }
    else{
        $a=$_POST["email"];
        $b=$_POST["password"];
        $c=$_POST["cpass"];

        if(!preg_match('/@gmail.com$/i',$a)){
            header("location: ../donor_login.php?error=*Enter correct email");
            die();
        }
        else if(!preg_match('/[@$#%&*!]/',$b) || strlen($b)<7){

          header("location: ../donor_login.php?error=*Password should have minimum 7 characters and atleast 1 special characater");
          die();
        }
        else if($b!=$c){
         
            header("location: ../donor_login.php?error=*Enter same password in both fields");
            die();
        }
        else{

            global $a,$b;
            require_once("connection.php");
            $insert="INSERT INTO signin (email,password) VALUES ('$a','$b')";
            if(mysqli_query($con,$insert)){

                header("location: ../donor_login.php");
                
            }
            else{

                echo "ERROR: Something went wrong please close the tab and try again.";
            }


        }
    }
}
else{

    die();
}

?>