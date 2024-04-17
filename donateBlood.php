<?php
// Include auth.php to check login status
require_once ("auth.php");
require_once ("php/connection.php");
if(isset($_POST["camp_id"])){
$camp_id = $_POST["camp_id"];
}

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
      <form action="php/donor_register.php" method="post" id="bloodDonationForm" return validateForm(event)>
       
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
            <label for="weight">Select Blood Group<span>*</span></label>
              <select id="bloodgroup" name="bloodgroup">
                <option value="" disabled selected>Select Blood Group</option>
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
          </div>

          <div class="row">
            <div class="formField">
              <label for="phone">Phone Number<span>*</span></label>
              <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" required>
            </div>
            <div class="formField">
              <label for="gender">Gender<span>*</span></label>
              <div class="radio">
                <input type="radio" name="gender" id="gender" value="male" required> Male
                <input type="radio" name="gender" id="gender" value="female" required>Female
              </div>
            </div>
          </div>

          <div class="row">
            <div class="formField">
              <label for="height">Height(in cms.)<span>*</span></label>
              <input type="number" name="height" id="height" require_once>
            </div>
            <div class="formField">
              <label for="weight">Weight(in kgs.)<span>*</span></label>
              <input type="number" name="weight" id="weight" required>
            </div>
          </div>

          <div class="row">
           
            <div class="formField">
              <label for="">Do you have any diseases?<span>*</span></label>
              <div class="radio">
                <div class="radio">
                  <div class="radio">
                    <input type="radio" name="disease" id="disease_yes" value="yes" required
                      onclick="showDiseaseInfo()"> Yes
                    <input type="radio" name="disease" id="disease_no" value="no" required onclick="hideDiseaseInfo()">
                    No
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="disease_info" style="display: none;">
            <div class="row">
              <div class="formField">
                <label for="dieases">Do you suffer form any of the following dieases?<span>*</span></label>
                <ul>
                  <li><input type="checkbox" name="dieases[]" value="HeartDisease"> Heart Disease</li>
                  <li><input type="checkbox" name="disease[]" value="Diabetes">Diabetes</li>
                  <li><input type="checkbox" name="disease[]" value="Sexually Transmitted Diseases">Sexually Transmitted
                    Diseases</li>
                  <li><input type="checkbox" name="disease[]" value="Lung Disease">Lung Disease</li>
                  <li> <input type="checkbox" name="disease[]" value="Allergic Disease">Allergic Disease</li>
                  <li><input type="checkbox" name="disease[]" value="Epilepsy (Charay rog)">Epilepsy (Charay rog)</li>
                  <li><input type="checkbox" name="disease[]" value="Kidney Disease">Kidney Disease</li>
                </ul>
              </div>
              <div class="formField">
                <label for="dieases">Are you taking or have you taken any of these in the past 72
                  hours?<span>*</span></label>
                <ul>
                  <li><input type="checkbox" name="medication[]" value="Antibiotics">Antibiotics</li>
                  <li> <input type="checkbox" name="medication[]" value="Aspirin">Aspirin</li>
                  <li><input type="checkbox" name="medication[]" value="Alcohol">Alcohol</li>
                  <li><input type="checkbox" name="medication[]" value="Steroids">Steroids</li>
                  <li> <input type="checkbox" name="medication[]" value="Vaccinations">Vaccinations</li>
                  <li><input type="checkbox" name="medication[]" value="Dog bite Rabies vaccine (1 year)">Dog bite
                    Rabies vaccine (1 year)</li>
                </ul>
              </div>
            </div>
          </div>
          <br>
          <h1>Address Information</h1>
          <div class="row">
            <div class="formField">
              <label for="state">State<span>*</span></label>
              <input type="text" name="state" class="state" id="state" required>
            </div>
            <div class="formField">
              <label for="district">District<span>*</span></label>
              <input type="text" name="district" class="district" id="district" required>
            </div>
          </div>

          <div class="row">
            <div class="formField">
              <label for="city">City<span>*</span></label>
              <input type="text" name="city" id="city" required>
            </div>
            <div class="formField">
              <label for="landmark">Landmark<span>*</span></label>
              <input type="text" name="landmark" id="landmark" required>
            </div>
          </div>

          <div class="row">
            <div class="formField">
              <label for="pincode">Pin/Postal Code<span>*</span></label>
              <input type="number" name="pincode" id="pincode" pattern="[0-9]{6}" required>
            </div>
          </div>

        </div>
        <br><br>
        <hr>
        <br><?php
        echo "<input type='hidden'  name='camp_id' value='$camp_id'>";
        ?>
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
<script src="script/stateAPI.js"></script>

</html>