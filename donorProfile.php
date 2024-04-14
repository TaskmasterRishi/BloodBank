<?php
require 'php/connection.php';
session_start();
if (isset($_SESSION["user_id"])) {
  $id = $_SESSION["user_id"];
} else {
  echo "session destroyed";
}

$fetch = "SELECT * FROM donordetails where logID = '$id'";
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
      <div class="photo" style="background-image: url('profilePhotos/rishi.jpg')">
        <i class="fa-regular fa-pen-to-square" id="penIcon" onclick="uploadFile()"></i>
        <input type="file" id="fileInput" style="display:none;">
      </div>
      <div class="info">
        <h1>Rishi Patodiya</h1>
        <span>rishipatodiya12@gmail.com</span>
      </div>
    </div>

    <div class="right">
      <table>
        <tr>
          <td>Name</td>
          <td>Rishi Patodiya</td>
        </tr>
        <tr>
          <td>Email Address</td>
          <td>rishipatodiya12@gmail.com</td>
        </tr>
        <tr>
          <td>Mobile Number</td>
          <td>8980402010</td>
        </tr>
        <tr>
          <td>Gender</td>
          <td>Male</td>
        </tr>
        <tr>
          <td>Date of birth</td>
          <td>18 - 09 - 2004</td>
        </tr>
        <tr>
          <td>Blood Group</td>
          <td>B+</td>
        </tr>
        <tr>
          <td>Height</td>
          <td>185 cm</td>
        </tr>
        <tr>
          <td>Weight</td>
          <td>85 kg</td>
        </tr>
        <tr>
          <td>Address</td>
          <td>ABC</td>
        </tr>
        <tr>
          <td>Pincode</td>
          <td>360311</td>
        </tr>
      </table>
    </div>
  </div>
</body>
<script src="script/donorProfile.js"></script>

</html>