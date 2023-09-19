// script.js
document.getElementById('patient-form').addEventListener('submit', function(event) {
    event.preventDefault();
  
    const formData = new FormData(event.target);
    const patientData = {};
    formData.forEach((value, key) => {
      patientData[key] = value;
    });
  
    // Now you can send patientData to the backend using fetch API or any other method
    // For demonstration purposes, let's just log the data here
    console.log('Patient Data:', patientData);
  
    // Reset the form after submission
    event.target.reset();
  });