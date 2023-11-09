// Get the modal 
const modal = document.getElementById('myModal');
// Get the button that opens the modal
const btnMobile = document.getElementById("btn-mobile");

const btnDesktop = document.getElementById("btn-desktop");


// Displays the modal when the button is clicked and prevents default link redirection
btnDesktop.addEventListener('click', function (e) {
  e.preventDefault();
  modal.style.display = "block";
});

btnMobile.addEventListener('click', function (e) {
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
    }, 1000); // Wait for the end of the transition (0.3s)
  }
});


// Hamburger menu 
document.addEventListener("DOMContentLoaded", function () {
  const menuToggle = document.querySelector(".menu-toggle");
  const mobileLinks = document.querySelector(".mobile-links");
  const firstLine = document.querySelector(".first-line");
  const secondLine = document.querySelector(".second-line");
  const thirdLine = document.querySelector(".third-line");
  const navBar = document.querySelector(".nav-container");

  menuToggle.addEventListener("click", function () {
    mobileLinks.classList.toggle("show-mobile-links");
    firstLine.classList.toggle("first-line-anim");
    secondLine.classList.toggle("second-line-anim");
    thirdLine.classList.toggle("third-line-anim");
    navBar.classList.toggle("nav-container-toggle");
  });
});



