<?php
// Include auth.php to check login status
require_once ("auth.php");
require_once ("php/connection.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="Icon/Icon.png" />
  <link rel="stylesheet" href="CSS/donateBlood.css">
  <link rel="stylesheet" href="CSS/footer.css">
  <title>Red Bank</title>
  <style>

.custom_validate{

color: red;
font-size: 12px;
width: auto;
height: 12px;
text-align:center;

}

    </style>
</head>


<body>
  <?php include'navbar.php';?>

  <div class="main">
    <div class="container">
      <h2>Blood Donation Form</h2>
      <form action="php/donor_register.php" method="post" id="bloodDonationForm">
        <div class="form-group">
          <label for="fullname">Full Name:</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="age">Age:</label>
          <input type="number" id="age" name="age" required>
        </div>
        <div class="form-group">
          <label for="contact">Mobile Number:</label>
          <input type="number" id="mobile" name="contact" required>
        </div>
        <div class="form-group">
          <label for="gender">Gender:</label>
          <select id="gender" name="gender" required>
            <option value="">Select</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="form-group">
          <label for="bloodgroup">Blood Group:</label>
          <select id="bloodgroup" name="blood" required>
            <option value="" disabled selected>Select</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
          </select>
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <textarea id="address" name="address" rows="4" required></textarea>
        </div>
        <input type="hidden" name="id" value="<?php if(isset($_POST["camp_id"])){echo $_POST["camp_id"];} ?>">
        <input type="submit" name="donor_register" value="Submit">
      </form>
      <div class="custom_validate"><?php if(isset($_GET["error"])){echo $_GET["error"];} ?></div>
    </div>
  </div>
  <?php include 'footer.php'; ?>

</body>
<script src="script/donateBlood.js"></script>
<script src="script/navbar.js"></script>
</html>