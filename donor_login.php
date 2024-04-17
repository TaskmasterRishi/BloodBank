<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Donor Login Form</title>
  <link rel="stylesheet" href="CSS/donor_login.css" />
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
  <div class="donor">
    <p>Donor</p>
  </div>
  <div class="wrapper">
    <div class="title-text">
      <div class="title login">Login Form</div>
      <div class="title signup">Signup Form</div>
    </div>
    <div class="form-container">
      <div class="slide-controls">
        <input type="radio" name="slide" id="login" checked />
        <input type="radio" name="slide" id="signup" />
        <label for="login" class="slide login">Login</label>
        <label for="signup" class="slide signup">Signup</label>
        <div class="slider-tab"></div>
      </div>

      <!-- ----------------------------------------------------------------------------------------------------------------------------------- -->

      <div class="form-inner">
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
            Not a member? <a href="">Signup now</a>
          </div>
        </form>

        <!-- ----------------------------------------------------------------------------------------------------------------------------------- -->

        <form action="php/donor_signin.php" class="signup" method="post">
          <div class="field">
            <input type="text" placeholder="User Name" name="userName" required />
          </div>
          <div class="field">
            <input type="text" placeholder="Email Address" name="email" required />
          </div>
          <div class="field">
            <input type="password" placeholder="Password" name="password" required />
          </div>
          <div class="field">
            <input type="password" placeholder="Confirm password" name="cpass" required />
          </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Signup" name="donor-signin-submit" />
          </div>
        </form>
      </div>
    </div>

    <div class="custom_validate"><?php if (isset($_GET["error"])) {
      echo $_GET["error"];
    } ?></div>

  </div>
</body>
<script src="script/donor_login.js"></script>

</html>