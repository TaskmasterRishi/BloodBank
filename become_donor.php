<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel="stylesheet" href="CSS/become_donor.css" >
</head>
<body>
     <?php require_once ("auth.php"); include 'navbar.php';
     
     if(isset($_SESSION["camp_id"])){

        unset($_SESSION["camp_id"]);
      }
     
     ?> 
    <div class="dummy"></div>
   
    <div class="head">
        <h1>Blood Stock Availability</h1>
    </div>


<div class="showcamp">

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
    <th>Register</th>
    
</tr>

<?php
    require_once("php/connection.php");
        $showcamp="SELECT * FROM campdetail";
        $result=mysqli_query($con,$showcamp);

while($row= mysqli_fetch_array($result)){

    echo "
            
        <tr>

            <td style='max-width:150px'>".$row["date"]."</td>
            <td style='max-width:150px'>".$row["name"]."</td>
            <td style='max-width:200px'>".$row["address"]."</td>
            <td style='max-width:150px'>".$row["state"]."</td>
            <td style='max-width:150px'>".$row["district"]."</td>
            <td style='max-width:150px'>".$row["contact"]."</td>
            <td style='max-width:150px'>".$row["organizedBy"]."</td>
            <td style='max-width:100px;min-width:100px'>".substr($row["time1"],0,8)."-".substr($row["time2"],0,8)."</td>
            <td style='max-width:150px'>
                <form action='donateBlood.php' method='post'>
                    <input type='hidden'  name='camp_id' value='".$row["id"]."'/>
                    <input type='submit' class='button' name='register' value='Register'>
                </form>
            </td>

        </tr>
            
    ";
}

?>

</Table>    

</div>

<?php include 'footer.php'; ?>
</body>
</html>