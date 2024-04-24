<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up Form</title>
  <link rel="stylesheet" href="CSS/donorLogin.css">
</head>

<body>
  <div class="main">
    <div class="card">
      <div class="header">Log in Form</div>
      <hr>
      <br>
      <div class="text">"Log in to Red Bank Blood Bank to access your account and donate blood."</div>
      <form action="php/hospital_signup.php" class="login" method="post" onsubmit="return validateForm()"   >
        <div class="field">
          <input type="text" placeholder="Email Address" name="email" required />
        </div>
        <div class="field">
          <input type="password" placeholder="Password" name="password" required />
        </div>
        <div class="field">
          <input type="password" placeholder="Confirm Password" name="cpass" required />
        </div>
        <div class="field btn">
          <div class="btn-layer"></div>
          <input type="submit" value="Hospital-Login" name="hospital-login-submit" />
        </div>
      
      </form>

      <div class="custom_validate"><?php if (isset($_GET["error"])) {
        echo $_GET["error"];
      } ?></div>
    </div>
  </div>
  </div>
</body>
<script>
     function validateForm() {
        var password = document.getElementById("password").value;
        var confirm_password = document.getElementById("confirm_password").value;

        if (password != confirm_password) {
            document.getElementById("password_error").innerHTML = "Passwords do not match";
            return false;
        } else {
            document.getElementById("password_error").innerHTML = "";
            return true;
        }
    }
</script>
</html>