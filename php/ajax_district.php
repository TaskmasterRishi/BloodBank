<?php

if(!isset($_GET["state"])){echo "something is wrong";die();}
else{
    require_once("connection.php");
    $state=$_GET["state"];
    $query="SELECT DISTINCT district FROM bloodcenterdetail where state = '$state'";
    $result=mysqli_query($con,$query);

    while($row=mysqli_fetch_array($result)){

        echo "
        
            <option value='".$row["district"]."'>".$row["district"]."</option>        
        ";
    }

}


    
