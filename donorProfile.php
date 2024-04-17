<?php
require 'php/connection.php';
session_start();
if (isset($_SESSION["user_id"])) {
  $id = $_SESSION["user_id"];
} else {
  echo "session destroyed";
}
$fetch = "SELECT * FROM donordetail where id = '$id'";
$result = mysqli_query($con, $fetch);
if ($result && mysqli_num_rows($result) > 0) {
  $data = mysqli_fetch_assoc($result);
}

$fetch = "SELECT * FROM donorlogin where id = '$id'";
$result = mysqli_query($con, $fetch);
if ($result && mysqli_num_rows($result) > 0) {
  $data2 = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Donor Profile</title>
  <link rel="stylesheet" href="CSS/donorProfile.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="card">
    <div class="left">
      <div class="photo"
        style="background-image: url('<?php if (isset($data2["imagename"])) {
          echo 'profilePhotos/' . $data2["imagename"];
        } ?>')">
        <form id="uploadForm" action="php/profileUpload.php" method="post" enctype="multipart/form-data">
          <input type="file" id="fileInput" name="profile" style="display: none;" onchange="handleFileChange(event)">
        </form>

        <i class="fa-regular fa-pen-to-square" id="penIcon" onclick="uploadFile()"></i>

      </div>
      <div class="info">
        <h1><?php echo $data["name"] ?></h1>
        <span><?php echo $data["email"] ?></span>
      </div>
    </div>

    <div class="right">
      <table>
        <tr>
          <td>Mobile Number</td>
          <td><?php echo $data["contact"] ?></td>
        </tr>
        <tr>
          <td>Gender</td>
          <td><?php echo $data["gender"] ?></td>
        </tr>
        <tr>
          <td>Date of birth</td>
          <td><?php echo $data["dob"] ?></td>
        </tr>
        <tr>
          <td>Blood Group</td>
          <td><?php echo $data["bloodGroup"] ?></td>
        </tr>
        <tr>
          <td>Height</td>
          <td><?php echo $data["height"] ?></td>
        </tr>
        <tr>
          <td>Weight</td>
          <td><?php echo $data["weight"] ?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><?php echo $data["address"] ?></td>
        </tr>
        <tr>
          <td>Pincode</td>
          <td><?php echo $data["pincode"] ?></td>
        </tr>
      </table>
    </div>
  </div>
</body>
<script src="script/donorPro.js"></script>

</html>