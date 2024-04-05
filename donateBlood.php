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
</head>

<?php
  // Prepare the SQL statement
  $sql = "SELECT * FROM donorLogIn WHERE ID = ?";
  $stmt = mysqli_prepare($con, $sql);
  
  // Bind the parameter
  mysqli_stmt_bind_param($stmt, "s", $_SESSION["user_id"]);
  
  // Execute the statement
  mysqli_stmt_execute($stmt);
  
  // Get the result
  $result = mysqli_stmt_get_result($stmt);
  
  // Fetch the data
  $row = mysqli_fetch_assoc($result);
  
  // Use $row to access the retrieved data
  ?>

<body>
  <?php include'navbar.php';?>

  <div class="main">
    <div class="container">
      <h2>Blood Donation Form</h2>
      <form action="#" method="post" id="bloodDonationForm">
        <div class="form-group">
          <label for="fullname">Full Name:</label>
          <input type="text" id="fullname" name="fullname" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required value="<?php echo isset($row['userEmail']) ? $row['userEmail'] : ''; ?>">
        </div>
        <div class="form-group">
          <label for="age">Age:</label>
          <input type="number" id="age" name="age" required>
        </div>
        <div class="form-group">
          <label for="mobile">Mobile Number:</label>
          <input type="text" id="mobile" name="mobile" required>
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
          <select id="bloodgroup" name="bloodgroup" required>
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
        <input type="submit" value="Submit">
      </form>
    </div>

  </div>
  <?php include 'footer.php'; ?>

</body>
<script src="script/donateBlood.js"></script>
<script src="script/navbar.js"></script>
</html>