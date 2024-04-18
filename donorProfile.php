<?php
// Include auth.php to check login status
require_once ("auth.php");
require_once ("php/connection.php");
if(isset($_POST["camp_id"])){
$camp_id = $_POST["camp_id"];
}
require 'php/connection.php';
if (isset($_SESSION["user_id"])) {
  $id = $_SESSION["user_id"];
} else {
  echo "session destroyed";
}
$fetch = "SELECT * FROM donordetail where id = '$id'";
$result = mysqli_query($con, $fetch);
if ($result && mysqli_num_rows($result) > 0) {
  $data = mysqli_fetch_assoc($result);
}

$fetch = "SELECT * FROM donorlogin where id = '$id'";
$result = mysqli_query($con, $fetch);
if ($result && mysqli_num_rows($result) > 0) {
  $data2 = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Donor Profile</title>
  <link rel="stylesheet" href="CSS/donorProfile.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .custom_validate {

      color: red;
      font-size: 12px;
      width: auto;
      height: 12px;
      text-align: center;

    }
 
  </style>

<body>
<nav role="navigation">
  <div id="menuToggle">
    <!--
    A fake / hidden checkbox is used as click reciever,
    so you can use the :checked selector on it.
    -->
    <input type="checkbox" />
    
    <!--
    Some spans to act as a hamburger.
    
    They are acting like a real hamburger,
    not that McDonalds stuff.
    -->
    <span></span>
    <span></span>
    <span></span>
    
    <!--
    Too bad the menu has to be inside of the button
    but hey, it's pure CSS magic.
    -->
    <ul id="menu">
      <a href="index.php"><li>Home</li></a>
      <a  onclick="toggleEditForm()"><li>Edit</li></a>
      <a ><li>My camps</li></a>
      <div class="buttons">
      <a ><li>Contact</li></a>
      <a href="php/signout.php" class="Signout"><li>Signout</li></a></div>
        
    </ul>
  </div>
</nav>
  <div class="card">
    <div class="left">
      <div class="photo"
        style="background-image: url('<?php if (isset($data2["imagename"])) {
          echo 'profilePhotos/' . $data2["imagename"];
        }
        else{
          echo 'Image/empty_profile.jpg';
        }
        ?>')">
        <form id="uploadForm" action="php/profileUpload.php" method="post" enctype="multipart/form-data">
          <input type="file" id="fileInput" name="profile" style="display: none;" onchange="handleFileChange(event)">
        </form>

        <i class="fa-regular fa-pen-to-square" id="penIcon" onclick="uploadFile()"></i>

      </div>
      <div class="info">
        <h1><?php echo $data["name"] ?></h1>
        <h2><?php echo $data["email"] ?></>
      </div>
    </div>

    <div class="right">
      <table>
        <tr>
          <td>Mobile Number</td>
          <td><?php echo $data["contact"] ?></td>
        </tr>
        <tr>
          <td>Gender</td>
          <td><?php echo $data["gender"] ?></td>
        </tr>
        <tr>
          <td>Date of birth</td>
          <td><?php echo $data["dob"] ?></td>
        </tr>
        <tr>
          <td>Blood Group</td>
          <td><?php echo $data["bloodGroup"] ?></td>
        </tr>
        <tr>
          <td>Height</td>
          <td><?php echo $data["height"] ?></td>
        </tr>
        <tr>
          <td>Weight</td>
          <td><?php echo $data["weight"] ?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><?php echo $data["address"] ?></td>
        </tr>
        <tr>
          <td>Pincode</td>
          <td><?php echo $data["pincode"] ?></td>
        </tr>
      </table>
    </div>
  </div>
  
  <div class="editForm">
    <div class="container">
      <form action="php/editProfile.php" method="post" id="bloodDonationForm" return validateForm(event)>
       
        <div class="form">
          <h1>Donor Information</h1>
          <div class="row">
            <div class="formField">
              <label for="fname">First Name<span>*</span></label>
              <input type="text" name="fname" id="fname" required>
            </div>
            <div class="formField">
              <label for="lname">Last Name<span>*</span></label>
              <input type="text" name="lname" id="lname" required>
            </div>
          </div>

          <div class="row">
            <div class="formField">
              <label for="dob">Date of Birth<span>*</span></label>
              <input type="date" name="dob" id="dob" required>
            </div>
            <div class="formField">
            <label for="weight">Select Blood Group<span>*</span></label>
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
            </div>
          </div>

          <div class="row">
            <div class="formField">
              <label for="phone">Phone Number<span>*</span></label>
              <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" required>
            </div>
            <div class="formField">
              <label for="gender">Gender<span>*</span></label>
              <div class="radio">
                <input type="radio" name="gender" id="gender" value="male" required> Male
                <input type="radio" name="gender" id="gender" value="female" required>Female
              </div>
            </div>
          </div>

          <div class="row">
            <div class="formField">
              <label for="height">Height(in cms.)<span>*</span></label>
              <input type="number" name="height" id="height" require_once>
            </div>
            <div class="formField">
              <label for="weight">Weight(in kgs.)<span>*</span></label>
              <input type="number" name="weight" id="weight" required>
            </div>
          </div>
          
          <br>
          <h1>Address Information</h1>
          <div class="row">
            <div class="formField">
              <label for="state">State<span>*</span></label>
              <input type="text" name="state" class="state" id="state" required>
            </div>
            <div class="formField">
              <label for="district">District<span>*</span></label>
              <input type="text" name="district" class="district" id="district" required>
            </div>
          </div>

          <div class="row">
            <div class="formField">
              <label for="city">City<span>*</span></label>
              <input type="text" name="city" id="city" required>
            </div>
            <div class="formField">
              <label for="landmark">Landmark<span>*</span></label>
              <input type="text" name="landmark" id="landmark" required>
            </div>
          </div>

          <div class="row">
            <div class="formField">
              <label for="pincode">Pin/Postal Code<span>*</span></label>
              <input type="number" name="pincode" id="pincode" pattern="[0-9]{6}" required>
            </div>
          </div>

        </div>
        <br><br>
        <hr>
        <br>
        <input type="submit" name="donor_register" value="Submit">
      </form>
      <div class="custom_validate"><?php if (isset($_GET["error"])) {
        echo $_GET["error"];
      } ?></div>
    </div>
  </div>
  </div>



</body>
<script src="script/donorPro.js"></script>

</html>