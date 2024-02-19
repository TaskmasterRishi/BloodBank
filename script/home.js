const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");
}

document.addEventListener("click", function (event) {
  const isClickInsideNav = navMenu.contains(event.target);
  const isClickInsideHamburger = hamburger.contains(event.target);

  if (!isClickInsideNav && !isClickInsideHamburger) {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
  }

  if (event.target.classList.contains("nav-link")) {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
  }
});

var counter = 1;
setInterval(function () {
  document.getElementById("radio" + counter).checked = true;
  counter++;
  if (counter > 4) {
    counter = 1;
  }
}, 5000);
