<?php
// Include auth.php to check login status
require_once ("auth.php");
require_once ("php/connection.php");
if (isset($_POST["camp_id"])) {
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
  <div class="campbackground">
    <div class="campholdercontainer">
      <i class="fa-solid fa-xmark" onclick="toggleCamps(event)"></i>
      <div class="campcontainer">

        <?php

        require_once ("php/connection.php");
        $query = "SELECT * FROM camp INNER JOIN campdetail ON campdetail.id=camp.campid AND camp.present='no' AND camp.donorid=" . $_SESSION["user_id"];
        $result = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($result)) {

          echo '
                
                <div class="campholder">
                
                <div class="infoholder"><span>Name: </span><br>' . $row["name"] . '</div>
                <div class="infoholder"><span>Date: </span><br>' . $row["date"] . '</div>
                <div class="infoholder"><span>Time: </span><br>' . substr($row["time1"], 0, 8) . "am-" . substr($row["time2"], 0, 8) . 'pm</div>
                <div class="infoholder"><span>Organized By: </span><br>' . $row["organizedBy"] . '</div>
                <div class="infoholder"><span>Contact: </span><br>' . $row["contact"] . '</div>
                <div class="infoholder"><span>Address: </span><br>' . $row["address"] . '</div>
  
                <button class="design"><span>Download<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAdmit<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCard<span>
                  <input type="hidden" class="campid" name="campid" value="' . $row["campid"] . '">
                </button>
                </div>
                
                ';

        }

        ?>

        <a href="become_donor.php">
          <div class="campholder campadd" style="height:300px;width:350px;">
            <div class="plus">
              <div class="stick1"></div>
              <div class="stick2"></div>
              <br>
              <div class="register">Register For Camps</div>
            </div>
          </div>
        </a>


      </div>
    </div>
  </div>

  <div class="admitcardpopup">
    <div class="admitcardtext">Admit Card</div>
    <din class="close">
      <div class="cross1"></div>
      <div class="cross2"></div>
    </din>
    <iframe src="" frameborder="0"></iframe>
    <!-- <div class="downloadbuttonholder"><form action=""><button class="downloadbutton" name="download" value="download">Download</button></div> -->
  </div>


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
        <a href="index.php">
          <li>Home</li>
        </a>
        <a href="#" class="edit_button" onclick="toggleEditForm(event)">
          <li>Edit Profile</li>
        </a>
        <a href="#" class="camp_button" onclick="toggleCamps(event)">
          <li>My Registered camps</li>
        </a>
        <div class="buttons">
          <a href="#" onclick="return showalert()">
            <li>Delete Account</li>
          </a>
          <a href="php/signout.php" class="Signout">
            <li>Signout</li>
          </a>
        </div>
      </ul>
    </div>
  </nav>

  <div class="error-card" id="errorCard">
    <i class="fa-solid fa-xmark"></i>
    <div class="error-content" id="error-content">
      <?php
      if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
      } else {
        echo "ERROR";
      }
      ?>
    </div>
    <button onclick="triggerOK()">OK</button>
  </div>

  <div class="message-card" id="messageCard">
    <i class="fa-regular fa-circle-check"></i>
    <div class="message-content" id="message-content">
      <?php
      if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
      } else {
        echo "MESSAGE";
      }
      ?>
    </div>
    <button onclick="triggerOKMessage()">OK</button>
  </div>
  </div>

  <div class="card">
    <div class="left">
      <div class="photo" style="background-image: url('<?php if (isset($data2["imagename"])) {
        echo 'profilePhotos/' . $data2["imagename"];
      } else {
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
        <h2><?php echo $data["email"] ?></h2>
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
          <td><?php echo $data["landmark"] . ", " . $data["city"] . ", " . $data["district"] . ", " . $data["state"]; ?></td>
        </tr>
        <tr>
          <td>Pincode</td>
          <td><?php echo $data["pincode"] ?></td>
        </tr>
      </table>
    </div>
  </div>

  <div class="editForm">
    <form id="hospitalForm" action="php/editProfile.php" class="details" method="post">
      <div class="editcard">
        <div class="header">First Name
          <i class="fa-solid fa-xmark" onclick="toggleEditForm()"></i>
        </div>
        <div class="row">
          <div class="field">
            <div class="label">Full Name</div>
            <input type="text" placeholder="Full Name *" name="fullName" required
              value="<?php echo isset($data["name"]) ? $data["name"] : '' ?>" />
          </div>
          <div class="field">
            <div class="label">Contact Number</div>
            <input type="text" placeholder="Contact Number *" name="contactNumber"
              value="<?php echo isset($data["contact"]) ? $data["contact"] : '' ?>" />
          </div>
          <div class="field">
            <div class="label">Select Gender</div>
            <select name="gender" id="gender" required>
              <option value="" disabled selected>Select type *</option>
              <option value="male" <?php echo (isset($data["gender"]) && $data["gender"] == "male") ? 'selected' : '' ?>>
                Male</option>
              <option value="female" <?php echo (isset($data["gender"]) && $data["gender"] == "female") ? 'selected' : '' ?>>Female</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="field">
            <div class="label">Date of Birth</div>
            <input type="date" placeholder="Date of Birth *" name="dob" required
              value="<?php echo isset($data["dob"]) ? $data["dob"] : '' ?>" />
          </div>
          <div class="field">
            <div class="label">Select Blood Group</div>
            <select id="bloodgroup" name="bloodGroup" required>
              <option value="" disabled selected>Select Blood Group</option>
              <option value="A+" <?php echo (isset($data["bloodGroup"]) && $data["bloodGroup"] == "A+") ? 'selected' : '' ?>>A+</option>
              <option value="A-" <?php echo (isset($data["bloodGroup"]) && $data["bloodGroup"] == "A-") ? 'selected' : '' ?>>A-</option>
              <option value="B+" <?php echo (isset($data["bloodGroup"]) && $data["bloodGroup"] == "B+") ? 'selected' : '' ?>>B+</option>
              <option value="B-" <?php echo (isset($data["bloodGroup"]) && $data["bloodGroup"] == "B-") ? 'selected' : '' ?>>B-</option>
              <option value="AB+" <?php echo (isset($data["bloodGroup"]) && $data["bloodGroup"] == "AB+") ? 'selected' : '' ?>>AB+</option>
              <option value="AB-" <?php echo (isset($data["bloodGroup"]) && $data["bloodGroup"] == "AB-") ? 'selected' : '' ?>>AB-</option>
              <option value="O+" <?php echo (isset($data["bloodGroup"]) && $data["bloodGroup"] == "O+") ? 'selected' : '' ?>>O+</option>
              <option value="O-" <?php echo (isset($data["bloodGroup"]) && $data["bloodGroup"] == "O-") ? 'selected' : '' ?>>O-</option>
            </select>
          </div>
          <div class="field">
            <div class="label">Height</div>
            <input type="number" placeholder="Height *" name="height" required
              value="<?php echo isset($data["height"]) ? $data["height"] : '' ?>" />
          </div>
        </div>
        <div class="row">
          <div class="field">
            <div class="label">Weight</div>
            <input type="number" placeholder="Weight *" name="weight" required
              value="<?php echo isset($data["weight"]) ? $data["weight"] : '' ?>" />
          </div>
        </div>
        <br><br>
        <div class="header">Address Details</div>
        <div class="row">
          <div class="field">
            <div class="label">State</div>
            <input type="text" placeholder="State *" name="state" required
              value="<?php echo isset($data["state"]) ? $data["state"] : '' ?>" />
          </div>
          <div class="field">
            <div class="label">District</div>
            <input type="text" placeholder="District *" name="district"
              value="<?php echo isset($data["district"]) ? $data["district"] : '' ?>" />
          </div>
          <div class="field">
            <div class="label">City</div>
            <input type="text" placeholder="City / Village *" name="city"
              value="<?php echo isset($data["city"]) ? $data["city"] : '' ?>" />
          </div>
        </div>
        <div class="row">
          <div class="field">
            <div class="label">Landmark</div>
            <input type="text" placeholder="Landmark *" name="landmark" required
              value="<?php echo isset($data["landmark"]) ? $data["landmark"] : '' ?>" />
          </div>
          <div class="field">
            <div class="label">Pincode</div>
            <input type="number" placeholder="Pincode *" id="pincode" name="pincode" required
              value="<?php echo isset($data["pincode"]) ? $data["pincode"] : '' ?>" />
          </div>
        </div>
      </div>
      <button type="submit" class="sub-btn" name="donor_register" onclick="validateForm(event)">Submit</button>
    </form>
  </div>



  </div>


  <script>
    let userid = "<?php echo $_SESSION["user_id"]; ?>";
    const button = document.querySelectorAll(".design");

    button.forEach(element => {
      element.addEventListener("click", () => {

        document.querySelector(".admitcardpopup").classList.add("admitcardpopupdisplay");
        let campid = element.querySelector(".campid").value;
        document.querySelector("iframe").src = "admitCards/" + userid + campid + ".pdf";

      });
    });


  </script>
</body>
<script src="script/donorPro.js"></script>
<script>
  // Show error card
  window.onload = function () {
    var errorCard = document.getElementById("errorCard");
    var errorMessage = "<?php echo isset($_SESSION['error']) ? $_SESSION['error'] : ''; ?>";

    var messageCard = document.getElementById("messageCard");
    var message = "<?php echo isset($_SESSION['message']) ? $_SESSION['message'] : ''; ?>";

    if (messageCard && message && message !== "MESSAGE") {
      messageCard.classList.add("show"); // Add the class to show the message card
    }
    if (errorCard && errorMessage && errorMessage !== "ERROR") {
      errorCard.classList.add("show"); // Add the class to show the error card
    }
  }

  function triggerOK() {
    var errorCard = document.getElementById("errorCard");
    errorCard.classList.remove("show"); // Remove the class to hide the error card
    <?php unset($_SESSION['error']); ?> // Clear session value
  }


  function triggerOKMessage() {
    var messageCard = document.getElementById("messageCard");
    messageCard.classList.remove("show"); // Remove the class to hide the message card
    <?php unset($_SESSION['message']); ?> // Clear session value
  }


</script>

</html>