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
      <form action="php/donor_login.php" class="login" method="post">
        <div class="field">
          <input type="text" placeholder="Email Address" name="email" required />
        </div>
        <div class="field">
          <input type="password" placeholder="Password" name="password" required />
        </div>
        <div class="pass-link"><a href="forgetPass.php">Forgot password?</a></div>
        <div class="field btn">
          <div class="btn-layer"></div>
          <input type="submit" value="donor-Login" name="donor-login-submit" />
        </div>
        <div class="signup-link">
          Not a member? <a href="donorSignup.php">Signup now</a>
        </div>
      </form>

      <div class="custom_validate"><?php if (isset($_GET["error"])) {
        echo $_GET["error"];
      } ?></div>
    </div>
  </div>
  </div>
</body>

</html>