<?php

if(isset($_POST["donor-login-submit"])){

    if(empty($_POST["email"]) || empty($_POST["password"])){

        header("location: ../donor_login.php?error=*Enter correct email or password");
    }
    else{
        $a=$_POST["email"];
        $b=$_POST["password"];

        if(!preg_match('/@gmail.com$/i',$a)){
            header("location: ../donor_login.php?error=*Enter correct email");
            die();
        }
        else if(!preg_match('/[@$#%&*!]/',$b) || strlen($b)<7){

          header("location: ../donor_login.php?error=*Password should have minimum 7 characters and atleast 1 special characater");
          die();
        }

session_start();


        $a=$_POST["email"];
        $b=$_POST["password"];

        $_SESSION["email"]= $_POST["email"];
        $_SESSION["password"]=$_POST["password"];
        $_SESSION["match"]=false; 
        $_SESSION["login"]=false;      

            require_once("connection.php");
        
            $query='SELECT * from signin';
            
            if(empty($result=mysqli_query($con,$query))){echo "Table is empty";}

                else{

                    while($row= mysqli_fetch_array($result)){

                        global $a,$b;

                        if($a==$row["email"] && $b==$row["password"]){

                            $_SESSION["match"]=true;

                        }
                    }
                }

                if($_SESSION["match"]==true){

                    $_SESSION["login"]=true;
                }
                
                    if($_SESSION["login"]==false){
                     
                        header("location: ../donor_login.php?error=*Email does not exist or password is incorrect");
                        session_destroy();
                    }
                    else{

                        header("location: ../index.html");
                    }

            

    }
    
}
else{

    die();
}

?>