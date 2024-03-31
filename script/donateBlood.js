document.getElementById("bloodDonationForm").addEventListener("submit", function(event) {
    var form = event.target;
    var isValid = true;

    // Check if all fields are filled
    form.querySelectorAll("input, select, textarea").forEach(function(field) {
        if (!field.checkValidity()) {
            isValid = false;
            displayWarning(field.validationMessage);
            event.preventDefault();
        }
    });

    // Custom validation for email
    var emailField = form.querySelector("#email");
    if (emailField.value.length > 50 || !validateEmail(emailField.value)) {
        isValid = false;
        displayWarning("Please enter a valid email address.");
        event.preventDefault();
    }

    // Custom validation for mobile number
    var mobileField = form.querySelector("#mobile");
    if (mobileField.value.length !== 10 || !validateMobileNumber(mobileField.value)) {
        isValid = false;
        displayWarning("Please enter a valid 10-digit mobile number.");
        event.preventDefault();
    }

    // Custom validation for blood group selection
    var bloodGroupField = form.querySelector("#bloodgroup");
    if (bloodGroupField.value === "") {
        isValid = false;
        displayWarning("Please select a blood group.");
        event.preventDefault();
    }

    // Additional custom validation if needed
    if (!isValid) {
        event.preventDefault();
    }
});

// Function to validate email address
function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

// Function to validate 10-digit mobile number
function validateMobileNumber(mobile) {
    var re = /^[0-9]{10}$/;
    return re.test(mobile);
}

// Function to display warning messages
function displayWarning(message) {
    alert(message);
}
