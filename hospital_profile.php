<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/hospital_profile.css">
</head>
<?php session_start(); include 'navbar.php';?>
<body>
    
    <div class="dummy"></div>
    <div class="addCamp">
        
        <table>
            
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
        <form action="php/camp_entry.php" method="post">
            <tr>
                
                <td><input type="date" name="date" ></td>
                <td><input type="text" name="name" ></td>
                <td><textarea type="textarea" name="address" rows="5"></textarea></td>
                <td><input type="text" name="state" ></td>
                <td><input type="text" name="district" ></td>
                <td><input type="number" name="contact" ></td>
                <td><input type="text" name="organizedBy" ></td>
                <td><input type="time" name="time1" >-<input type="time" name="time2"></td>

            </tr>
        </table>
        
        <input type="submit" name="submit" value="add +" class="add">
    </div>
    </form>
    <div class="available">Available Camps</div>
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
            
        </tr>

        <?php
            require_once("php/connection.php");
                $showcamp="SELECT * FROM campdetail";
                $result=mysqli_query($con,$showcamp);

        while($row= mysqli_fetch_array($result)){

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
                    <td style='max-width:60px'>
                        <form action='php/delete_camp.php' method='post'>
                            <input type='hidden'  name='id' value='".$row["id"]."'>
                            <input type='submit' class='button' name='delete' value='Delete'>
                        </form>
                    </td>
    
                </tr>
                    
            ";
        }


            ?>

        </Table>    
<hr>
        <button class="goback">Go back</button>
        <form action="php/signout.php" method="post">
         
         <input type="submit" value="Sign Out" name="signout-submit" class="signout">
        
        </form>
    </div>

<?php include 'footer.php'; ?>
<script>

    document.querySelector(".goback").addEventListener("click",() => {

        location.href="index.php";

    });


    
</script>
</body>
</html>