
<?php
session_start();
$camp_id=$_SESSION["camp_id"];
require_once("php/connection.php");
$query="SELECT * FROM campdetail where id=$camp_id";

$result=mysqli_query($con,$query);

$row=mysqli_fetch_array($result);

date_default_timezone_set("Asia/Kolkata");
$t=$row["time2"];
$d=date_create($row["date"]);
$d=date_format($d,"d-m-Y");
$time=strtotime($d." ".$t);

if(time()<$time){

    header("location: select_donor.php?error=Blood can only be added after $d ".substr($t,0,8));
    die();
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        
        <link rel="stylesheet" href="CSS/add_blood.css">
    <style>

.custom_validate{

color: red;
font-size: 12px;
width: auto;
height: 12px;
text-align:center;

}
.amounttext{

font-size: 25px;
color: rgb(255, 30, 0);
width:fit-content;
margin:30px auto 20px auto;
font-weight: 1000;
}
.button{

all:unset;
cursor: pointer;

background-color:  rgb(1, 181, 1);
padding:0.2em 0.4em;
color: white;
border-radius: 0.35em;
font-size: 15px;
margin-top: 10px;
font-weight:500;
}
.norecords{

    color:red;
    font-size:25px;
    font-weight:900;
}
    </style>
</head>
<body>
    
<!-- <div class="amounttext">Add Blood Amount</div> -->
    <div class="addblood">
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Blood Group</th>
                <th>Amount<br>(in ml)</th>
            </tr>
            <?php
            
                
                require_once("php/connection.php");

                $query="SELECT * FROM donordetail where campid='".$_SESSION["camp_id"]."'";
                $result=mysqli_query($con,$query);

               

            while($row=mysqli_fetch_array($result)){
                if($row["present"]=="yes"){
                    echo "
                    
                    <tr>
                        <td>".$row["name"]."</td>
                        <td>".$row["email"]."</td>
                        <td>".$row["gender"]."</td>
                        <td>".$row["bloodGroup"]."</td>
                        <form action='php/add_blood.php' method='post'>
                        <td><input type='number' step='0.02' name='amount'></td>
                        <td>
                                <input type='hidden' name='email' value='".$row["email"]."'>
                                <input type='hidden' name='type' value='".$row["bloodGroup"]."'>
                                
                                <input type='submit' class='add' name='add_blood_submit' value='add+'>
                            </form>
                        </td>
                        
                    </tr>
                    
                    ";
                }
            }
            ?>
        </table>
        <?php 
        $query="SELECT * FROM donordetail where present='yes' AND campid='".$_SESSION["camp_id"]."'";
        $result=mysqli_query($con,$query);

        if(mysqli_num_rows($result)==0){echo "<div class='norecords'>No Records Found<div>";}
  
        ?>

        <form action='hospital_profile.php' method='post'>
            <input type='submit' class='button' name='addblood' value='Go Back'>
        </form>
            
            <div class="custom_validate"><?php if(isset($_GET["error"])){echo $_GET["error"];}?></div>
    </div>

</body>
</html>