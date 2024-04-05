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
        <div class="title signup">Signup Form</div>
      </div>
      <div class="form-container">
       
      
        <div class="form-inner">
          
          <form action="php/admin.php" class="signup" method="post">
            <div class="field">
              <input type="text" placeholder="Email Address" name="email" required />
            </div>
            <div class="field">
              <input type="password" placeholder="Password" name="pass" required />
            </div>
            <div class="field">
              <input type="password" placeholder="Confirm password" name="cpass" required />
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Signup" name="admin-submit"/>
            </div>
          </form>
        </div>
      </div>
      <div class="custom_validate"><?php if(isset($_GET["error"])){echo $_GET["error"];} ?></div>
    </div>
  </body>
  <script src="script/donor_login.js"></script>
</html>