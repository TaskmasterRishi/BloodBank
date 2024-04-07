<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hospital Login Form</title>
    <link rel="stylesheet" href="CSS/donor_login.css" />
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
    <div class="donor">
      <p>Hospital</p>
    </div>
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">Login Form</div>
      </div>
      <div class="form-container">
    
        </div>
        <div class="form-inner">
          <form action="php/hospital_login.php" class="login" method="post">
            <div class="field">
              <input type="text" placeholder="Email Address" required name="email"/>
            </div>
            <div class="field">
              <input type="password" placeholder="Password" required name="password"/>
            </div>
            <!-- <div class="pass-link"><a href="#">Forgot password?</a></div> -->
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Login" name="hospital-login-submit"/>
            </div>
            <div class="signup-link">
              Not a member? <a href="">Signup now</a>
            </div>
          </form>
          
        </div>
      </div>
      <div class="custom_validate"><?php if(isset($_GET["error"])){echo $_GET["error"];} ?></div>
    </div>
  </body>
  <script src="script/donor_login.js"></script>
</html>
