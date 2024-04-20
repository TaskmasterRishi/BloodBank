<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up Form</title>
    <link rel="stylesheet" href="CSS/signup.css">
</head>
<body>
    <div class="main">
    <div class="card">
        <div class="header">Sign up Form</div>
        <hr>
        <br>
        <div class="text">"Register with Red Bank Blood Bank to make a difference. Sign up now!"</div>
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
          <div class="custom_validate"><?php if (isset($_GET["error"])) {
            echo $_GET["error"];
          } ?></div>
        </div>

    </div>
</div>
</body>
</html>