<?php

session_start();
if(isset($_POST["id"])){
    $_SESSION["camp_id"]=$_POST["id"];
    
}
if(!isset($_SESSION["camp_id"])){

    header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/select_blood.css">
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
            
                
                require_once("php/connection.php");

                $query="SELECT * FROM donordetail";
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
                                <input type='hidden' name='id' value='".$row["id"]."'>
                                <input type='submit' class='add' name='select_submit' value='add+'>
                            </form>
                        </td>
                        
                    </tr>
                    
                    ";
                }
            }

            ?>
        </table>
        <form action="add_blood.php" method="post">
            <input type="submit" class="button" name="addblood" value="add Blood">
        </form>
    </div>

</body>
</html>
<?php

            if(isset($_POST["select_submit"])){

                require_once("php/connection.php");
                $id=$_POST["id"];

                $query="UPDATE  donordetail SET present='yes' where id=$id";

                if(mysqli_query($con,$query)){

                    header("location: select_donor.php");

                }
                else{echo "Database not connected";}
            }

?>
