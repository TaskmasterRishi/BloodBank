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
    .custom_validate {

      color: red;
      font-size: 12px;
      width: auto;
      height: 12px;
      text-align: center;

    }
  </style>
</head>


<body>
  <?php include 'navbar.php'; ?>

  <div class="main">
    <div class="heading">
      <h2>Blood Donation Form</h2>
    </div>
    <div class="container">
      <form action="php/donor_register.php" method="post" id="bloodDonationForm">
        <div class="form">
          <h1>Donor Information</h1>
          <div class="row">
            <div class="formField">
              <label for="fname">First Name<span>*</span></label>
              <input type="text" name="fname" id="fname" required>
            </div>
            <div class="formField">
              <label for="lname">Last Name<span>*</span></label>
              <input type="text" name="lname" id="lname" required>
            </div>
          </div>

          <div class="row">
            <div class="formField">
              <label for="dob">Date of Birth<span>*</span></label>
              <input type="date" name="dob" id="dob" required>
            </div>
            <div class="formField">
              <label for="mail">E-mail<span>*</span></label>
              <input type="email" name="mail" id="mail">
            </div>
          </div>

          <div class="row">
            <div class="formField">
              <label for="phone">Phone Number<span>*</span></label>
              <input type="text" name="phone" id="phone" required>
            </div>
            <div class="formField">
              <label for="gender">Gender <span>*</span></label>
              <div class="radio">
                <input type="radio" name="gender" id="gender" value="male" required> Male
                <input type="radio" name="gender" id="gender" value="female" required>Female
              </div>
            </div>
          </div>

          <div class="row">
            <div class="formField">
              <label for="occupation">Occupation</label>
              <input type="text" name="occupation" id="occupation">
            </div>
            <div class="formField">
              <label for="weight">Weight</label>
              <input type="number" name="weight" id="weight">
            </div>
          </div>

          <div class="row">
            <div class="formField">
              <label for="height">Height</label>
              <input type="number" name="height" id="height">
            </div>
            <div class="formField">
              <label for="diseas">Do you have any diseas?<span>*</span></label>
              <div class="radio">
                <input type="radio" name="disease" id="disease_yes" value="yes" required> Yes
                <input type="radio" name="disease" id="disease_no" value="no" required> No
              </div>
            </div>
          </div>

          <div id="disease_info" style="display: none;">
            Hi
          </div>

          <br>
          <h1>Address Imformation</h1>

        </div>
        <input type="submit" name="donor_register" value="Submit">
      </form>
      <div class="custom_validate"><?php if (isset($_GET["error"])) {
        echo $_GET["error"];
      } ?></div>
    </div>
  </div>
  <?php include 'footer.php'; ?>

</body>
<script src="script/donateBlood.js"></script>
<script src="script/navbar.js"></script>

</html>