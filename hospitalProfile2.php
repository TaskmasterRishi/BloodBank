<?php
// Include auth.php to check login status
session_start();
require 'php/connection.php';
$id = $_SESSION["hospital_id"];

$fetch = "SELECT * FROM bloodcenterdetail where id = '$id'";
$result = mysqli_query($con, $fetch);
if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
}

$fetch = "SELECT * FROM hospitallogin where id = '$id'";
$result2 = mysqli_query($con, $fetch);
if ($result2 && mysqli_num_rows($result2) > 0) {
    $data2 = mysqli_fetch_assoc($result2);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donor Profile</title>
    <link rel="stylesheet" href="CSS/hospitalProfile2.css" />
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
                <a href="index.php">
                    <li>Home</li>
                </a>
                <a href="#" onclick="toggleEditForm()">
                    <li>Edit Profile</li>
                </a>
                <a href="hospital_profile.php">
                    <li>Add camps</li>
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
                unset($_SESSION['error']);
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
                unset($_SESSION['message']);
            } else {
                echo "MESSAGE";
            }
            ?>
        </div>
        <button onclick="triggerOKMessage()">OK</button>
    </div>

    <div class="card">
        <div class="left">
            <div class="photo" style="background-image: url('<?php if (isset($data2["imagename"])) {
                echo 'profilePhotosHospital/' . $data2["imagename"];
            } else {
                echo 'Image/empty_profile.jpg';
            }
            ?>')">
                <form id="uploadForm" action="php/profileUploadHospital.php" method="post"
                    enctype="multipart/form-data">
                    <input type="file" id="fileInput" name="profile" style="display: none;"
                        onchange="handleFileChange(event)">
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
                    <td>Parent Hospital Name</td>
                    <td><?php if (isset($data["hospitalName"])) {
                        echo $data["hospitalName"];
                    } else {
                        echo "Not Defined";
                    }
                    ?></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td><?php if (isset($data["category"])) {
                        echo $data["category"];
                    } else {
                        echo "Not Defined";
                    } ?></td>
                </tr>
                <tr>
                    <td>Contact Number</td>
                    <td><?php if (isset($data["contact"])) {
                        echo $data["contact"];
                    } else {
                        echo "Not Defined";
                    } ?></td>
                </tr>
                <tr>
                    <td>Helpline Numner</td>
                    <td><?php if (isset($data["helplineNo"])) {
                        echo $data["helplineNo"];
                    } else {
                        echo "Not Defined";
                    } ?></td>
                </tr>
                <tr>
                    <td>Fax No</td>
                    <td><?php if (isset($data["faxNo"])) {
                        echo $data["faxNo"];
                    } else {
                        echo "Not Defined";
                    } ?></td>
                </tr>
                <tr>
                    <td>Licence No</td>
                    <td><?php if (isset($data["licenceNo"])) {
                        echo $data["licenceNo"];
                    } else {
                        echo "Not Defined";
                    } ?></td>
                </tr>
                <tr>
                    <td>Hospital Website</td>
                    <td><?php if (isset($data["website"])) {
                        echo $data["website"];
                    } else {
                        echo "Not Defined";
                    } ?></td>
                </tr>
                <tr>
                    <td>Number of Beds</td>
                    <td><?php if (isset($data["beds"])) {
                        echo $data["beds"];
                    } else {
                        echo "Not Defined";
                    } ?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="editForm">
        <form id="hospitalForm" action="php/hospitalEdit.php" class="details" method="post">
            <div class="editcard">
                <div class="header">Blood Bank Details
                    <i class="fa-solid fa-xmark" onclick="toggleEditForm()"></i>
                </div>
                <div class="row">
                    <div class="field">
                        <div class="label">Blood Bank Name</div>
                        <input type="text" placeholder="Blood Bank Name *" name="bloodBankName" required
                            value="<?php echo isset($data["name"]) ? $data["name"] : '' ?>" />
                    </div>
                    <div class="field">
                        <div class="label">Parent Hospital Name</div>
                        <input type="text" placeholder="Parent Hospital Name" name="hospitalName"
                            value="<?php echo isset($data["hospitalName"]) ? $data["hospitalName"] : '' ?>" />
                    </div>
                    <div class="field">
                        <div class="label">Select Category</div>
                        <select name="category" id="category" required>
                            <option value="" disabled selected>Select type *</option>
                            <option value="Govt." <?php echo (isset($data["category"]) && $data["category"] == "Govt.") ? 'selected' : '' ?>>Govt.</option>
                            <option value="Private" <?php echo (isset($data["category"]) && $data["category"] == "Private") ? 'selected' : '' ?>>Private</option>
                            <option value="Charitable/Vol" <?php echo (isset($data["category"]) && $data["category"] == "Charitable/Vol") ? 'selected' : '' ?>>Charitable/Vol</option>
                            <option value="Red Cross" <?php echo (isset($data["category"]) && $data["category"] == "Red Cross") ? 'selected' : '' ?>>Red Cross</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="field">
                        <div class="label">Contact Number</div>
                        <input type="tel" placeholder="Contact Number *" name="contact" required
                            value="<?php echo isset($data["contact"]) ? $data["contact"] : '' ?>" />
                    </div>
                    <div class="field">
                        <div class="label">Fax No.</div>
                        <input type="text" placeholder="Fax no." name="faxNo"
                            value="<?php echo isset($data["faxNo"]) ? $data["faxNo"] : '' ?>" />
                    </div>
                    <div class="field">
                        <div class="label">Licence No.</div>
                        <input type="text" placeholder="Licence No. *" name="licenceNo" required
                            value="<?php echo isset($data["licenceNo"]) ? $data["licenceNo"] : '' ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="field">
                        <div class="label">Helpline Number</div>
                        <input type="tel" placeholder="Helpline Number *" name="helplineNo" required
                            value="<?php echo isset($data["helplineNo"]) ? $data["helplineNo"] : '' ?>" />
                    </div>
                    <div class="field">
                        <div class="label">Hospital Website</div>
                        <input type="url" placeholder="Hospital Website" name="website"
                            value="<?php echo isset($data["website"]) ? $data["website"] : '' ?>" />
                    </div>
                    <div class="field">
                        <div class="label">Number of Beds</div>
                        <input type="number" placeholder="Number of Beds *" name="beds" required
                            value="<?php echo isset($data["beds"]) ? $data["beds"] : '' ?>" />
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
            <button type="submit" class="sub-btn" value="hospital-details-submit"
                onclick="validateForm(event)">Submit</button>
        </form>
    </div>

    </div>



</body>
<script src="script/hospitalPro.js"></script>

</html>