<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Details</title>
</head>
<link rel="stylesheet" href="CSS/hospitaldetails.css">
<style>
    span {
        color: red;
    }
</style>

<body>
    <div class="main">
        <form id="hospitalForm" action="php/hospital_registration.php" class="details" method="post">
            <div class="card">
                <div class="header">Blood Bank Details</div>
                <div class="row">
                    <div class="field">
                        <input type="text" placeholder="Blood Bank Name *" name="bloodBankName" required />
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Parent Hospital Name " name="hospitalName" />
                    </div>

                    <div class="field">
                        <select name="category" id="category" required>
                            <option value="" disabled selected>Select type *</option>
                            <option value="Govt.">Govt.</option>
                            <option value="Private">Private</option>
                            <option value="Charitable/Vol">Charitable/Vol</option>
                            <option value="Red Cross">Red Cross</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="field">
                        <input type="tel" placeholder="Contact Number *" name="contact" required />
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Fax no." name="faxNo" />
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Licence No. *" name="licenceNo" required />
                    </div>
                </div>

                <div class="row">
                    <div class="field">
                        <input type="tel" placeholder="Helpline Number *" name="helplineNo" required />
                    </div>
                    <div class="field">
                        <input type="url" placeholder="Hospital Website" name="website" />
                    </div>
                    <div class="field">
                        <input type="number" placeholder="Number of Beds *" name="beds" required />
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="header">Address Details</div>
                <div class="row">
                    <div class="field">
                        <input type="text" placeholder="State *" name="state" required />
                    </div>
                    <div class="field">
                        <input type="text" placeholder="District *" name="district" />
                    </div>
                    <div class="field">
                        <input type="text" placeholder="City / Village *" name="city" />
                    </div>
                </div>

                <div class="row">
                    <div class="field">
                        <input type="text" placeholder="Landmark *" name="landmark" required />
                    </div>
                    <div class="field">
                        <input type="number" placeholder="Pincode *" id="pincode" name="pincode" required />
                    </div>
                </div>
            </div>

            <button type="submit" class="sub-btn" value="hospital-details-submit" onclick="validateForm(event)">Submit</button>
        </form>
    </div>

    <script>
        function validateForm(event) {
            event.preventDefault(); // prevent default form submission

            var mobile = document.querySelector("input[name='contact']").value;
            var pincode = document.getElementById("pincode").value;

            // Mobile Number validation
            var mobilePattern = /^[6-9]\d{9}$/;
            if (!mobile.match(mobilePattern)) {
                alert("Please enter a valid mobile number.");
                return false;
            }

            // PIN Code validation
            var pincodePattern = /^\d{6}$/;
            if (!pincode.match(pincodePattern)) {
                alert("Please enter a valid PIN code. It must Contain 6 digits ");
                return false;
            }

            document.getElementById("hospitalForm").submit(); // submit the form if validation passes
        }
    </script>
</body>

</html>
