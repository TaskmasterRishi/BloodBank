<?php
session_start();
if(isset($_POST["id"])){
$_SESSION["camp_id"]=$_POST["id"];


}

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
            <tr>

                <td><input type="text" name="email"></td>
                <td><input type="text" name="type"></td>
                <td><input type="number" step="0.01" name="amount"></td>

            </tr>

        </table>
        
        <input type="submit" class="add" name="add_blood_submit" value="add+">

        <?php
        

        
        ?>
</form>

    </div>

</body>
</html>