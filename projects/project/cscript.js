// Handle the change of reporter type to show/hide the hospital name field
document.getElementById('reporter-type').addEventListener('change', function() {
    const hospitalNameGroup = document.getElementById('hospital-name-group');
    if (this.value === 'hospital') {
      hospitalNameGroup.style.display = 'block';
    } else {
      hospitalNameGroup.style.display = 'none';
    }
  });
  
  // Handle form submission (placeholder, no actual submission logic)
  document.getElementById('report-form').addEventListener('submit', function(event) {
    event.preventDefault();
    // Here you would handle the form submission, e.g., send data to the server
  });