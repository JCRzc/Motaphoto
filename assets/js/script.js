// Get the modal 
const modal = document.getElementById('myModal');
// Get the button that opens the modal
const btn = document.getElementById("menu-item-29");

// Displays the modal when the button is clicked and prevents default link redirection
btn.addEventListener('click', function (e) {
  e.preventDefault();
  modal.style.display = "block";
});

// Disappears the modal when clicked outside the zone
window.addEventListener('click', function (event) {
  if (event.target === modal) {
    modal.classList.add("modal-fade-out");
    setTimeout(() => {
      modal.style.display = "none"; // Hide modal after fade
      modal.classList.remove('modal-fade-out'); // Reset class for next opening
    }, 300); // Wait for the end of the transition (0.3s)
  }
});