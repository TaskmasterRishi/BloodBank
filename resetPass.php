<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/resetPass.css">
</head>
<body>
<div class="card">
    <i class="fa-solid fa-lock"></i>
    <h1>Forget Password?</h1>
    <p>You can reset Your Password here</p>
    <form action="php/resetPass.php" method="post">
        <input type="password" name="newPass" id="newPass" placeholder="New Password">
        <input type="password" name="cPass" id="cPass" placeholder="Confirm Password">
        <input type="text" name="otp" id="otp" placeholder="OTP">
        <div id="otpTimer"></div>
        <button type="submit" name="submit">Submit</button>
    </form>
    <div class="custom_validate">
        <?php if (isset($_GET["error"])) {
            echo $_GET["error"];
        } ?>
    </div>
</div>
<script src="script/resetPass.js"></script>
</body>
</html>
