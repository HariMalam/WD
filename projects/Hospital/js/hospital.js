// script.js
const step1 = document.getElementById('step1');
const step2 = document.getElementById('step2');
const authForm = document.getElementById('auth-form');
const loginBtn = document.getElementById('login-btn');
const signupBtn = document.getElementById('signup-btn');
const hospitalInfoForm = document.getElementById('hospital-info-form');
const addDoctorBtn = document.getElementById('add-doctor-btn');
const doctorsList = document.getElementById('doctors-list');

loginBtn.addEventListener('click', () => {
  // Perform login authentication logic
  // For this example, let's just simulate successful login
  step1.style.display = 'none';
  step2.style.display = 'block';
});

signupBtn.addEventListener('click', () => {
  // Perform signup authentication logic
  // For this example, let's just simulate successful signup
  step1.style.display = 'none';
  step2.style.display = 'block';
});

addDoctorBtn.addEventListener('click', () => {
  // Open doctor enrollment modal or form
  // For this example, let's just simulate adding a doctor to the list
  const doctorName = prompt('Enter doctor\'s name:');
  if (doctorName) {
    const doctorItem = document.createElement('div');
    doctorItem.textContent = doctorName;
    doctorsList.appendChild(doctorItem);
  }
});

hospitalInfoForm.addEventListener('submit', (event) => {
  event.preventDefault();

  // Get hospital information from the form
  const hospitalData = {
    hospitalName: hospitalInfoForm.hospitalName.value,
    // Add other fields here
  };

  // Process hospitalData as needed
  // (You can store it in a database or perform other actions)

  // Clear the doctors list and the form
  doctorsList.innerHTML = '';
  hospitalInfoForm.reset();
});