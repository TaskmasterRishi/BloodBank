<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
$confirm="<script>confirm('Are you sure');</script>";

if(!$confirm){header("location: ../hospital_profile.php");die();}
?>
</body>
</html>
<?php
if(isset($_POST["delete"])){

    require_once("connection.php");
    $id=$_POST["id"];

    $campDeleteQuery="DELETE FROM campdetail WHERE id = ".$id;

    if (mysqli_query($con, $campDeleteQuery)) {

    } else {
        echo "ERROR: Something went wrong. Please try again.";
    }
    $campDeleteQuery="DELETE FROM camp WHERE campid = ".$id;

    if (mysqli_query($con, $campDeleteQuery)) {
        header("location: ../hospital_profile.php");
        exit();
    } else {
        echo "ERROR: Something went wrong. Please try again.";
    }

}
else{

    header("location: ../index.php");
    die();
}

?>