function uploadFile() {
    // Get the file input element
    var fileInput = document.getElementById('fileInput');
    
    // Add event listener to detect changes in file input
    fileInput.addEventListener('change', function() {
      // Get the form element
      var form = document.getElementById('uploadForm');
      // Submit the form
      form.submit();
    });
    
    // Trigger click event on file input to open file dialog
    fileInput.click();
  }