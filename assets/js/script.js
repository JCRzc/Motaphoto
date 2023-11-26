// Hamburger menu 
document.addEventListener("DOMContentLoaded", function () {

  function disableBodyScroll() {
    document.body.classList.add("no-scroll");
  }

  function enableBodyScroll() {
    document.body.classList.remove("no-scroll");
  }
  const menuToggle = document.querySelector(".menu-toggle");
  const mobileLinks = document.querySelector(".mobile-links");
  const firstLine = document.querySelector(".first-line");
  const secondLine = document.querySelector(".second-line");
  const thirdLine = document.querySelector(".third-line");
  const navBar = document.querySelector(".nav-container");
  const header = document.querySelector("header");

  // DOM elements
  const modal = document.getElementById('myModal');
  const btnMobile = document.getElementById("btn-mobile");
  const btnDesktop = document.getElementById("btn-desktop");
  const btnPost = document.getElementById("single-post-contact-button");
  const refPhotoField = document.getElementById("ref-photo");
  const formRefPhotoField = document.getElementById("form-ref-photo");


  menuToggle.addEventListener("click", function () {
    if (mobileLinks.classList.contains("show-mobile-links")) {
      // If the menu is already open, remove the classes and add closing animations
      mobileLinks.classList.remove("show-mobile-links");
      firstLine.classList.remove("first-line-anim");
      secondLine.classList.remove("second-line-anim");
      thirdLine.classList.remove("third-line-anim");
      navBar.classList.remove("nav-container-toggle");
      mobileLinks.classList.add("show-mobile-links-reverse");
      header.classList.remove("fixed-header");
      enableBodyScroll();

      // Add an event listener for the end of the animation to remove the background color class
      mobileLinks.addEventListener("animationend", function () {
        mobileLinks.classList.remove("show-mobile-links-reverse");
      }, { once: true });

    } else {
      // If the menu is closed, add the classes and add opening animations
      mobileLinks.classList.add("show-mobile-links");
      firstLine.classList.add("first-line-anim");
      secondLine.classList.add("second-line-anim");
      thirdLine.classList.add("third-line-anim");
      mobileLinks.classList.remove("show-mobile-links-reverse");
      navBar.classList.add("nav-container-toggle");
      header.classList.add("fixed-header");
      disableBodyScroll();

      // Add an event listener for the end of the animation to remove the background color class
      mobileLinks.addEventListener("animationend", function () {
        mobileLinks.classList.remove("show-mobile-links-reverse");
      }, { once: true });
    }
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
    // mobile
    if (window.innerWidth <= 767.98) {
      modal.classList.add("modal-slide-left-to-right");
      setTimeout(() => {
        modal.style.display = "none";
        modal.classList.remove("modal-slide-left-to-right");
      }, 500);
    } else {
      //desktop
      modal.classList.add("modal-fade-out");
      setTimeout(() => {
        modal.style.display = "none";
        modal.classList.remove('modal-fade-out');
      }, 300);
    }
  }

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
    if (event.target.id == 'myModal') {
      hideModal();
    }
  });

  if (btnPost) {
    btnPost.addEventListener('click', function (e) {
      e.preventDefault();
      displayModal();
    });
  }
});