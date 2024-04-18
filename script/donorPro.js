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

function toggleEditForm() {
  var editForm = document.querySelector(".editForm");
  if (
    editForm.style.transform === "translateX(-200%)" ||
    editForm.style.transform === ""
  ) {
    editForm.style.transform = "translateX(0%)";
  } else {
    editForm.style.transform = "translateX(-200%)";
  }
  document
    .getElementById("menuToggle")
    .querySelector("input[type='checkbox']").checked = false;
}
