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
  <link rel="stylesheet" href="CSS/navbar.css">
  <link rel="stylesheet" href="CSS/navbarMediaQuery.css">
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
  <header class="header">
    <nav class="navbar">
      <a href="index.html" class="nav-logo">
        <img src="Icon/Icon.png" alt="Icon" height="40px" width="auto" />
        <h1>Red Bank</h1>
      </a>
      <ul class="nav-menu">
        <li class="nav-item">
          <a href="index.php#whyDonateBlood" class="nav-link">Why Donate Blood</a>
        </li>
        <li class="nav-item">
          <a href="donateBlodd.php" class="nav-link">Become a Donor</a>
        </li>
        <li class="nav-item">
          <a href="#need_blood" class="nav-link">Need Blood</a>
        </li>
        <li class="nav-item">
          <a href="about_us.php" class="nav-link">About Us</a>
        </li>
      </ul>
      <div class="hem-and-log">
        <div class="dropdown">
          <button class="login-button">
            <svg class="person-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path d="M0 0h24v24H0z" fill="none" />
              <path
                d="M12 2C9.19 2 7 4.19 7 7c0 1.57.64 3.02 1.68 4.06C6.69 12.29 4 15.36 4 19h16c0-3.64-2.69-6.71-4.68-8.94C16.36 10.02 17 8.57 17 7c0-2.81-2.19-5-5-5zm0 10c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z" />
            </svg>
            <p class="login">Login &#9660;</p>
          </button>
          <div class="dropdown-content">
            <a href="hospital_login.html">Hospital Login</a>
            <a href="donor_login.html">Donor Login</a>
          </div>
        </div>
        <div class="hamburger">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
      </div>
    </nav>
  </header>

  <section class="main">
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
  </section>

</body>
<script src="script/donateBlood.js"></script>
<script src="script/navbar.js"></script>
</html>