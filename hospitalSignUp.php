<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Your Blood Bank</title>
    <link rel="stylesheet" href="CSS/hospitalSignUp.css">
</head>

<body>
    <div class="main">
        <form action="php/admin.php" method="post">
            <div class="card">
                <h1>Blood Bank Details</h1>

                <div class=inputs>
                    <div class="inputField">
                        <p><label for="address2">Email</label></p>
                        <input type="text" name="email" id="address2" cols="30" rows="2"></input>
                    </div>
                    <div class="inputField">
                        <p><label for="state">State</label></p>
                        <select name="state" id="state">
                            <option value="" selected disabled>Select State</option>
                        </select>
                    </div>
                    <div class="inputField">
                        <p><label for="district">District</label></p>
                        <select name="district" id="district">
                            <option value="" selected disabled>Select District</option>
                        </select>
                    </div>
                    
                </div>
                <div class="address">
                    <div class="inputField">
                        <p><label for="address1">Address</label></p>
                        <textarea type="text" name="address1" id="address1" cols="30" rows="2"></textarea>
                    </div>
                    <div class="inputField">
                        <p><label for="address2">Password</label></p>
                        <input type="text" name="pass" id="address2" cols="30" rows="2"></input>
                    </div>
                    <div class="inputField">
                        <p><label for="address2">confirm Password</label></p>
                        <input type="text" name="cpass" id="address2" cols="30" rows="2"></input>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>