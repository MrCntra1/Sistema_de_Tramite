const fileInput = document.getElementById('documento');

fileInput.addEventListener('change', (event) => {
  const file = event.target.files[0];
  const fileName = file.name;
  const extension = fileName.split('.')[1];

  // Check if the file type is allowed
  const allowedTypes = ['ppt', 'docx', 'pdf', 'xls'];
  if (!allowedTypes.includes(extension)) {
    // Show an error message
    alert(`El archivo que ha seleccionado no es válido. Solo se permiten archivos de PowerPoint, Excel, Word o PDF.`);

    // Clear the file input field
    fileInput.value = '';

    // Allow the user to try again
    fileInput.disabled = false;
  }
});
