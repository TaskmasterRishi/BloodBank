<?php
session_start();
$camp_id=$_SESSION["camp_id"];
require_once("php/connection.php");
    $query="SELECT * FROM campdetail where id=$camp_id";

    $result=mysqli_query($con,$query);

    $row=mysqli_fetch_array($result);

    $t=$row["time2"];
    $d=$row["date"];

    date_default_timezone_set("Asia/Kolkata");
    
    $time=explode(":",$t);
    $date=explode("-",$d);
    $time33=strtotime($time[0].":".$time[1].":".$time[2]." ".$date[1]."-".$date[2]."-".$date[0]);
    
    $hour=(int)$time[0];
    $min=(int)$time[1];
    $sec=(int)$time[2];
    
    $day=(int)$date[2];
    $mon=(int)$date[1];
    $year=(int)$date[0];

  $time1=mktime($hour,$min,$sec,$mon,$day,$year);
  $time2=strtotime($t."".$d);

  echo $time1."  ".$time2."   ".$time33;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/add_blood.css">
</head>
<body>
    
    <div class="addblood">

    <form action="php/add_blood.php" method="post">
        <table class="table">

            <tr>

                <th>Email</th>
                <th>Type</th>
                <th>Amount</th>
        
            </tr>
           <?php
           


           ?>
        </table>
        
        <input type="submit" class="add" name="add_blood_submit" value="add+">

        <?php
        

        
        ?>
</form>

    </div>

</body>
</html>