<?php

session_start();
if(isset($_POST["id"]) && !isset($_SESSION["camp_id"])){
    $_SESSION["camp_id"]=$_POST["id"];
    
}
if(!isset($_SESSION["camp_id"])){

    header("location: index.php?error=camp id not set in session");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/select_blood.css?f=11">
    <style>
  
.custom_validate{

color: red;
font-size: 12px;
width: auto;
height: 12px;
text-align:center;

}
.back{

position: absolute;
left:1.5rem;
bottom:0.5rem;

font-weight:500;
width:max-content;
}
.delete{

position:absolute;
left:50%;
bottom:0.5rem;
transform: translate(-50%,0);
width:max-content;

}
.bloodadd{

position: absolute;
right:1.5rem;
bottom:0.5rem;
width:max-content;
}
.norecords{

    
    color: #a94442;
    font-size:30px;
    font-weight:900;
}
.button{

    font-weight:500;
}
    </style>
</head>
<body>
    <div class="donortext">All Registered Donors</div>
    <div class="showdonor">
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Blood Group</th>
                <th>Select</th>
            </tr>
            <?php
            
                        if(isset($_POST["select_submit"])){
            
                            require_once("php/connection.php");
                            $did=$_POST["id"];
            
                            $query="UPDATE  camp SET present='yes' where donorid=$did";
            
                            if(mysqli_query($con,$query)){
            
                                header("location: select_donor.php");
            
                            }
                            else{echo "Database not connected";}
                        }
            
            ?>
            <?php
            
                
                require_once("php/connection.php");

                $query="SELECT * FROM donordetail INNER JOIN camp ON donordetail.id=camp.donorid  AND camp.campid='".$_SESSION["camp_id"]."'";
                $result=mysqli_query($con,$query);

               
            while($row=mysqli_fetch_array($result)){
                if($row["present"]=="no"){
                    echo "
                    
                    <tr>
                        <td>".$row["name"]."</td>
                        <td>".$row["email"]."</td>
                        <td>".$row["gender"]."</td>
                        <td>".$row["bloodGroup"]."</td>
                        <td>
                            <form action='select_donor.php' method='post'>
                                <input type='hidden' name='id' value=".$row["donorid"].">
                                <input type='submit' class='add' name='select_submit' value='add+'>
                            </form>
                        </td>
                        
                    </tr>
                    
                    ";
                }
            }
            ?>
        </table>
        
        <?php
         $query="SELECT * FROM donordetail INNER JOIN camp  ON donordetail.id=camp.donorid AND present='no' AND campid='".$_SESSION["camp_id"]."'";
         $result=mysqli_query($con,$query);
        
        if(mysqli_num_rows($result)==0){echo "<div class='norecords'>No Records Found<div>";}
        ?>
        <hr>
            <form action='hospital_profile.php' method='post'>
                <input type='submit' class='button back' name='addblood' value='Go Back'>
            </form>
            <form action='add_blood.php' method='post'>
                <input type='submit' class='button bloodadd' name='addblood' value='Add Blood'>
            </form>
            <div class="custom_validate"><?php if(isset($_GET["error"])){echo $_GET["error"];}?></div>
            <form action="php/delete_camp.php" method="post">
                <input type="hidden" name="id" value='<?php echo $_SESSION["camp_id"]?>'>
                <input type='submit' class='button delete' name='delete' value='Delete Camp'>
            </form>
    </div>

</body>
</html>
