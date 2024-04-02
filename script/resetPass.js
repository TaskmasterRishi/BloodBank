    // Timer for OTP expiration
    var countdown = 300; // 5 minutes in seconds
    var timer = setInterval(function() {
        countdown--;
        var minutes = Math.floor(countdown / 60);
        var seconds = countdown % 60;
        document.getElementById('otpTimer').innerHTML = 'OTP expires in: ' + minutes + 'm ' + seconds + 's';
        if (countdown <= 0) {
            clearInterval(timer);
            document.getElementById('otpTimer').innerHTML = 'OTP expired';
            // Redirect the user after the timer expires
            window.location.href = '../forgetPass.php'; // Replace 'forgetPass.php' with the desired URL
        }
    }, 1000);

