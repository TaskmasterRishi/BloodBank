function validateForm(event) {
  event.preventDefault(); // Prevent form submission

  // Validation for Contact Number
  var contactNumber = document.forms["hospitalForm"]["contactNumber"].value;
  if (!/^\d{10}$/.test(contactNumber)) {
      alert("Please enter a valid 10-digit contact number.");
      return false;
  }

  // Validation for Pincode
  var pincode = document.forms["hospitalForm"]["pincode"].value;
  if (!/^\d{6}$/.test(pincode)) {
      alert("Please enter a valid 6-digit pincode.");
      return false;
  }

  // If both validations pass, submit the form
  document.getElementById("hospitalForm").submit();
}
