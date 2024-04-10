// Get references to the radio buttons and the disease info section
const diseaseYes = document.getElementById('disease_yes');
const diseaseInfo = document.getElementById('disease_info');

// Add event listener to the radio buttons
diseaseYes.addEventListener('change', function() {
  // Check if 'Yes' option is selected
  if (this.checked) {
    // Show the disease info section
    diseaseInfo.style.display = 'block';
  } else {
    // Hide the disease info section
    diseaseInfo.style.display = 'none';
  }
});
