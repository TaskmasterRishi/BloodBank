<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/hospital_profile.css?rr=00"><style>

.custom_validate{

color: red;
font-size: 12px;
width: auto;
height: 12px;
text-align:center;

}

    </style>
</head>
    <?php session_start();
    
    if(isset($_SESSION["camp_id"])){unset($_SESSION["camp_id"]);}
    
    ?>
<body>
    <div class="nav-container">
        <?php include 'navbar.php';?>
</div>


    
    <div class="dummy"></div>
    
    <div class="available">Add Camp</div>
<div class="addCamp">
    
    <div class="table-container">
        
        <form action="php/camp_entry.php" method="post">
        <table>
            
            <tr>
                
                <th>Date</th>
                <th>Camp Name</th>
                <th>Address</th>
                <th>State</th>
                <th>District</th>
                <th>Contact</th>
                <th>Time</th>
                
            </tr>
                <tr>
                    
                    <td><input type="date" name="date" ></td>
                    <td><input type="text" name="name" ></td>
                <td><textarea type="textarea" name="address" rows="5"></textarea></td>
                <td><input type="text" name="state" ></td>
                <td><input type="text" name="district" ></td>
                <td><input type="number" name="contact" ></td>
                <td><input type="time" name="time1" >-<input type="time" name="time2"></td>

            </tr>
        </table>

    </div>
     <input type="submit" name="submit" value="add +" class="add">
    <div class="custom_validate"><?php if(isset($_GET["error"])){echo $_GET["error"];}?></div>
    </form>
</div>
    <div class="available">Available Camps</div>
    <div class="showcamp">
        
        
<div class="table-container">
        <div class="table-control">
        <Table class="table">
            
            <tr>
                
                <th>Date</th>
                <th>Name</th>
                <th>Address</th>
                <th>State</th>
                <th>District</th>
                <th>Contact</th>
                <th>Organized By</th>
                <th>Time</th>
                
            </tr>
            
            <?php


require_once("php/connection.php");
$showcompletedcamp="SELECT * FROM campdetail where time2 < ";




$showcamp="SELECT * FROM campdetail";
$result=mysqli_query($con,$showcamp);
date_default_timezone_set("Asia/Kolkata");
$currentdate=getdate(time());

while($row= mysqli_fetch_array($result)){
    
    $date=explode("-",$row["date"]);
    
    $year=(int)$date[0];
    $month=(int)$date[1];
    $day=(int)$date[2];
    
    if((int)$currentdate["mon"]>=$month && (int)$currentdate["year"]>=$year && (int)$currentdate["mday"]>=$day){
        
        echo "
        
        <tr>
        
        <td style='max-width:130px'>".$row["date"]."</td>
        <td style='max-width:100px'>".$row["name"]."</td>
        <td class='address' style='max-width:200px'>".$row["address"]."</td>
                    <td style='max-width:150px'>".$row["state"]."</td>
                    <td style='max-width:150px'>".$row["district"]."</td>
                    <td style='max-width:150px'>".$row["contact"]."</td>
                    <td style='max-width:150px'>".$row["organizedBy"]."</td>
                    <td style='max-width:100px'>".substr($row["time1"],0,8)."-".substr($row["time2"],0,8)."</td>
                    <td style='max-width:60px;border:none;'>";

                if($row["organizedBy"]==$_SESSION["hospital_name"]){
                    echo"
                        <form action='select_donor.php' method='post'>
                            <input type='hidden'  name='id' value=".$row["id"].">
                            <input type='submit' class='button' name='add_blood' value='Add Blood'>
                        </form>";
                    }
                    echo "
                    </td>
    
                </tr>
                
                ";
    
            }

               
        
            if((int)$currentdate["mon"]<=$month && (int)$currentdate["year"]<=$year && (int)$currentdate["mday"]<$day){

                echo "
                    
                <tr>

                    <td style='max-width:130px'>".$row["date"]."</td>
                    <td style='max-width:100px'>".$row["name"]."</td>
                    <td class='address' style='max-width:200px'>".$row["address"]."</td>
                    <td style='max-width:150px'>".$row["state"]."</td>
                    <td style='max-width:150px'>".$row["district"]."</td>
                    <td style='max-width:150px'>".$row["contact"]."</td>
                    <td style='max-width:150px'>".$row["organizedBy"]."</td>
                    <td style='max-width:100px'>".substr($row["time1"],0,8)."-".substr($row["time2"],0,8)."</td>
                    <td style='max-width:60px;border:none;'>";

                    if($row["organizedBy"]==$_SESSION["hospital_name"]){
                        echo "
                        <form class='delete_form' action='php/delete_camp.php' method='post'>
                            <input type='hidden'  name='id' value='".$row["id"]."'>
                            <input type='submit' class='button' name='delete' value='Delete'>
                        </form>";
                    }
                    echo "
                    </td>
    
                </tr>
                
                ";
    
            }
        
        }
            ?>

        </Table>    

    </div>
</div>
        <button class="goback">Go back</button>
        <!-- <button class="donordetail">Donor Details</button> -->
        <form action="php/signout.php" method="post">
         
            <input type="submit" value="Sign Out" name="signout-submit" class="signout">
        
        </form>
</div>
<?php include 'footer.php'; ?>
<script>

    document.querySelector(".goback").addEventListener("click",() => {

        location.href="index.php";

    });
    document.querySelector(".donordetail").addEventListener("click",() => {

    location.href="donor_detail.php";

});


    let forms = document.querySelectorAll(".delete_form");

    forms.forEach(element => {

        element.addEventListener("click",confirm(element));
       
        
    });

function confirm(e){

    if(confirm("Are you sure you want to delete camp?")){
    e.submit();
    }
    else{
alert("hi");
    }

}
</script>
</body>
</html>