// Function to show the disease info section
function showDiseaseInfo() {
  document.getElementById("disease_info").style.display = "block";
}

// Function to hide the disease info section
function hideDiseaseInfo() {
  document.getElementById("disease_info").style.display = "none";
}
function validateForm(event) {
  // Prevent form submission
  event.preventDefault();

  // Gather validated form values
  var fname = document.getElementById("fname").value.trim();
  var lname = document.getElementById("lname").value.trim();
  var dob = document.getElementById("dob").value.trim();
  var mail = document.getElementById("mail").value.trim();
  var phone = document.getElementById("phone").value.trim();
  var gender = document.querySelector('input[name="gender"]:checked');
  var height = document.getElementById("height").value.trim();
  var weight = document.getElementById("weight").value.trim();
  var state = document.getElementById("state").value.trim();
  var district = document.getElementById("district").value.trim();
  var city = document.getElementById("city").value.trim();
  var pincode = document.getElementById("pincode").value.trim();

  // Validation logic
  if (
    fname === "" ||
    lname === "" ||
    dob === "" ||
    mail === "" ||
    phone === "" ||
    gender === null ||
    height === "" ||
    weight === "" ||
    state === "" ||
    district === "" ||
    city === "" ||
    pincode === ""
  ) {
    alert("Please fill out all fields.");
    return false;
  }

  // Regular expressions for validation
  var phonePattern = /^\d{10}$/;
  var pincodePattern = /^\d{6}$/;

  // Phone number and pin code validation
  if (!phonePattern.test(phone)) {
    alert("Please enter a valid 10-digit phone number.");
    return false;
  }

  if (!pincodePattern.test(pincode)) {
    alert("Please enter a valid 6-digit pin code.");
    return false;
  }

  // If all validations pass, send data to PHP file
  var formData = new FormData();
  formData.append("fname", fname);
  formData.append("lname", lname);
  formData.append("dob", dob);
  formData.append("mail", mail);
  formData.append("phone", phone);
  formData.append("gender", gender.value); // Extract the value of the selected radio button
  formData.append("height", height);
  formData.append("weight", weight);
  formData.append("state", state);
  formData.append("district", district);
  formData.append("city", city);
  formData.append("pincode", pincode);

  // Send data to PHP file using AJAX
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "php/donor_register.php", true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      // Handle success response if needed
      alert("Form submitted successfully!");
    } else {
      // Handle error response if needed
      alert("Error submitting form. Please try again later.");
    }
  };
  xhr.send(formData);

  // Prevent form submission
  return false;
}
