<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Need Blood</title>
    <link rel="stylesheet" href="CSS/needBlood.css">
    <link rel="stylesheet" href="CSS/needBloodMedia.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php session_start(); include 'navbar.php'; ?>

    <div class="main">
        <div class="head">
            <h1>Blood Stock Availability</h1>
        </div>
        <form action="" method="post">
            <table class="serchBox">
                <tr class="serchHead">
                    <td>Search Blood Stock</td>
                </tr>
                <tr class="inputField">
                    <td>
                        <select name="state" id="state">
                            <option value="" selected disabled>Select State</option>
                        </select>
                        <select name="district" id="district">
                            <option value="" selected disabled>Select District</option>
                        </select>
                        <select name="city" id="city">
                            <option value="" selected disabled>Select City</option>
                        </select>
                        <select id="bloodgroup" name="bloodgroup">
                            <option value="" disabled selected>Select Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </td>
                </tr>
            </table><br><br>
            <center>
                <button type="submit" name="submit" class="submit">Search</button>
            </center>
            <div class="container">
                <div class="icon-container">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <div class="text-container">
                    <p>Select State and/or District for stock availability.</p>
                </div>
            </div>
        </form>

        <div class="head">
            <h1>Results</h1>
        </div>
        <?php include 'footer.php'; ?>

    </div>

</body>
<script src="script/stateData.js"></script>

</html>