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

// Function to display the modal
function displayModal() {
  modal.style.display = "block";
  // Check whether refPhotoField is present on the page and whether it contains anything
  if (refPhotoField && refPhotoField.innerText.trim() !== "") {
    const photoRef = refPhotoField.innerText;
    formRefPhotoField.value = photoRef;
  }
}

// Function to hide the modal
function hideModal() {
  modal.classList.add("modal-fade-out");
  
  setTimeout(() => {
    modal.style.display = "none";
    modal.classList.remove('modal-fade-out');
  }, 300);
}

// DOM elements
const modal = document.getElementById('myModal');
const btnMobile = document.getElementById("btn-mobile");
const btnDesktop = document.getElementById("btn-desktop");
const btnPost = document.getElementById("single-post-contact-button");
const refPhotoField = document.getElementById("ref-photo");
const formRefPhotoField = document.getElementById("form-ref-photo");


// Adding EventListeners
btnDesktop.addEventListener('click', function (e) {
  e.preventDefault();
  displayModal();
});

btnMobile.addEventListener('click', function (e) {
  e.preventDefault();
  displayModal();
});

window.addEventListener('click', function (event) {
  if (event.target === modal) {
    hideModal();
  }
});

btnPost.addEventListener('click', function (e) {
  e.preventDefault();
  displayModal();
});