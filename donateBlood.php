<?php
// Include auth.php to check login status
require_once ("auth.php");
require_once ("php/connection.php");
if (isset($_SESSION["camp_id"])) {

  unset($_SESSION["camp_id"]);
}
if (isset($_POST["camp_id"])) {
  $camp_id = $_POST["camp_id"];
  $_SESSION["camp_id"] = $_POST["camp_id"];
} else {
  header("location: index.php");
  die();
}
if (isset($_SESSION["user_id"])) {
  $id = $_SESSION["user_id"];
} else {
  echo "session destroyed";
}
if (!isset($_SESSION["camp_id"])) {
  header("location: index.php");
  die();
}
$fetch = "SELECT * FROM donordetail where id = '$id'";
$result = mysqli_query($con, $fetch);
if ($result && mysqli_num_rows($result) > 0) {
  $data = mysqli_fetch_assoc($result);
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
    <div class="editForm">
      <form id="hospitalForm" action="php/donor_register.php" class="details" method="post">
        <div class="editcard">
          <div class="header">First Name
            <i class="fa-solid fa-xmark" onclick="toggleEditForm()"></i>
          </div>
          <div class="row">
            <div class="field">
              <div class="label">Full Name</div>
              <input type="text" placeholder="Full Name *" name="fullName" required
                value="<?php echo isset($data["name"]) ? $data["name"] : '' ?>" />
            </div>
            <div class="field">
              <div class="label">Contact Number</div>
              <input type="text" placeholder="Contact Number *" name="contactNumber"
                value="<?php echo isset($data["contact"]) ? $data["contact"] : '' ?>" />
            </div>
            <div class="field">
              <div class="label">Select Gender</div>
              <select name="gender" id="gender" required>
                <option value="" disabled selected>Select type *</option>
                <option value="male" <?php echo (isset($data["gender"]) && $data["gender"] == "male") ? 'selected' : '' ?>>
                  Male</option>
                <option value="female" <?php echo (isset($data["gender"]) && $data["gender"] == "female") ? 'selected' : '' ?>>Female</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="field">
              <div class="label">Date of Birth</div>
              <input type="date" placeholder="Date of Birth *" name="dob" required
                value="<?php echo isset($data["dob"]) ? $data["dob"] : '' ?>" />
            </div>
            <div class="field">
              <div class="label">Select Blood Group</div>
              <select id="bloodgroup" name="bloodGroup" required>
                <option value="" disabled selected>Select Blood Group</option>
                <option value="A+" <?php echo (isset($data["bloodGroup"]) && $data["bloodGroup"] == "A+") ? 'selected' : '' ?>>A+</option>
                <option value="A-" <?php echo (isset($data["bloodGroup"]) && $data["bloodGroup"] == "A-") ? 'selected' : '' ?>>A-</option>
                <option value="B+" <?php echo (isset($data["bloodGroup"]) && $data["bloodGroup"] == "B+") ? 'selected' : '' ?>>B+</option>
                <option value="B-" <?php echo (isset($data["bloodGroup"]) && $data["bloodGroup"] == "B-") ? 'selected' : '' ?>>B-</option>
                <option value="AB+" <?php echo (isset($data["bloodGroup"]) && $data["bloodGroup"] == "AB+") ? 'selected' : '' ?>>AB+</option>
                <option value="AB-" <?php echo (isset($data["bloodGroup"]) && $data["bloodGroup"] == "AB-") ? 'selected' : '' ?>>AB-</option>
                <option value="O+" <?php echo (isset($data["bloodGroup"]) && $data["bloodGroup"] == "O+") ? 'selected' : '' ?>>O+</option>
                <option value="O-" <?php echo (isset($data["bloodGroup"]) && $data["bloodGroup"] == "O-") ? 'selected' : '' ?>>O-</option>
              </select>
            </div>
            <div class="field">
              <div class="label">Height</div>
              <input type="number" placeholder="Height *" name="height" required
                value="<?php echo isset($data["height"]) ? $data["height"] : '' ?>" />
            </div>
          </div>
          <div class="row">
            <div class="field">
              <div class="label">Weight</div>
              <input type="number" placeholder="Weight *" name="weight" required
                value="<?php echo isset($data["weight"]) ? $data["weight"] : '' ?>" />
            </div>
          </div>
          <div class="header">Address Details</div>
          <div class="row">
            <div class="field">
              <div class="label">State</div>
              <input type="text" placeholder="State *" name="state" required
                value="<?php echo isset($data["state"]) ? $data["state"] : '' ?>" />
            </div>
            <div class="field">
              <div class="label">District</div>
              <input type="text" placeholder="District *" name="district"
                value="<?php echo isset($data["district"]) ? $data["district"] : '' ?>" />
            </div>
            <div class="field">
              <div class="label">City</div>
              <input type="text" placeholder="City / Village *" name="city"
                value="<?php echo isset($data["city"]) ? $data["city"] : '' ?>" />
            </div>
          </div>
          <div class="row">
            <div class="field">
              <div class="label">Landmark</div>
              <input type="text" placeholder="Landmark *" name="landmark" required
                value="<?php echo isset($data["landmark"]) ? $data["landmark"] : '' ?>" />
            </div>
            <div class="field">
              <div class="label">Pincode</div>
              <input type="number" placeholder="Pincode *" id="pincode" name="pincode" required
                value="<?php echo isset($data["pincode"]) ? $data["pincode"] : '' ?>" />
            </div>
          </div>
        </div>
        <button type="submit" class="sub-btn" name="donor_register" onclick="validateForm(event)">Submit</button>
      </form>
    </div>

  </div>
  <div class="foot">
    <?php include 'footer.php'; ?>
  </div>

</body>
<script src="script/donateBlood.js"></script>
<script src="script/navbar.js"></script>
<script>
  function validateForm(event) {
  event.preventDefault(); // Prevent form submission

  // Validation for Contact Number
  var contactNumber = document.forms["hospitalForm"]["contactNumber"].value;
  if (!/^\d{10}$/.test(contactNumber)) {
      alert("Please enter a valid 10-digit contact number.");
      return false;
  }

  // Validation for Pincode
  var pincode = document.forms["hospitalForm"]["pincode"].value;
  if (!/^\d{6}$/.test(pincode)) {
      alert("Please enter a valid 6-digit pincode.");
      return false;
  }

  // If both validations pass, submit the form
  document.getElementById("hospitalForm").submit();
}

</script>

</html>