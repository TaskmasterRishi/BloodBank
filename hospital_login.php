<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hospital Login Form</title>
    <link rel="stylesheet" href="CSS/donor_login.css" />
  </head>
  <body>
    <div class="donor">
      <p>Hospital</p>
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
        <div class="form-inner">
          <form action="#" class="login">
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
          <form action="#" class="signup">
            <div class="field">
              <input type="text" placeholder="Email Address" required />
            </div>
            <div class="field">
              <input type="password" placeholder="Password" required />
            </div>
            <div class="field">
              <input type="password" placeholder="Confirm password" required />
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Signup" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
  <script src="script/donor_login.js"></script>
</html>