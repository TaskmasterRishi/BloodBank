function uploadFile() {
    document.getElementById('fileInput').click();
}

function handleFileChange(event) {
    document.getElementById("uploadForm").submit();
}

function toggleEditForm() {
    var editForm = document.querySelector('.editForm');
    if (editForm.style.transform === 'translateX(-200%)' || editForm.style.transform === '') {
        editForm.style.transform = 'translateX(0%)';
    } else {
        editForm.style.transform = 'translateX(-200%)';
    }
    document.getElementById("menuToggle").querySelector("input[type='checkbox']").checked = false;
}
