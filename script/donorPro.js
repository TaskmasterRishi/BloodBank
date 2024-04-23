
function uploadFile() {
  document.getElementById("fileInput").click();
}

function handleFileChange(event) {
  document.getElementById("uploadForm").submit();
}

function showalert() {
    // Display the first confirmation dialog
    var firstConfirm = confirm("Are you sure you want to delete your account?");

    // If the user clicks "OK" (true), proceed with the action
    if (firstConfirm) {
        // Display the second confirmation dialog
        var secondConfirm = confirm("Think again!");

        // If the user clicks "OK" (true), proceed with the action
        if (secondConfirm) {
            // Display the third confirmation dialog
            var thirdConfirm = confirm("One more time!");

            // If the user clicks "OK" (true), proceed with the action
            if (thirdConfirm) {
                // Display the fourth confirmation dialog
                var fourthConfirm = confirm("You are about to delete your account!");

                // If the user clicks "OK" (true), redirect to the delete account page
                if (fourthConfirm) {
                    window.location.href = "php/deleteProfile.php";
                }
            }
        }
    }
    
    // Return false to prevent the default link behavior
    return false;
}

var click1=0;var click2=0;

function toggleEditForm(e) {
 
  if(click2%2==1){toggleCamps();}

  var editForm = document.querySelector(".editForm");
  if (
    editForm.style.transform === "translateY(-200%)" ||
    editForm.style.transform === ""
  ) {
    editForm.style.transform = "translateY(0%)";
  } else {
    editForm.style.transform = "translateY(-200%)";
  
  }
  document
    .getElementById("menuToggle")
    .querySelector("input[type='checkbox']").checked = false;
    click1++;
}

function toggleCamps(e){

if(click1%2==1){
 toggleEditForm();
}

  document.querySelector(".campbackground").classList.toggle("afterclickcamp");
 
  document
  .getElementById("menuToggle")
  .querySelector("input[type='checkbox']").checked = false;
  click2++;
}



document.querySelector(".close").addEventListener("click",() => {

  document.querySelector(".admitcardpopup").classList.remove("admitcardpopupdisplay");
});

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
