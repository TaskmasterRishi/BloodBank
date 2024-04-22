

var counter = 1;
setInterval(function () {
  document.getElementById("radio" + counter).checked = true;
  counter++;
  if (counter > 4) {
    counter = 1;
  }
}, 5000);

var elScroll = document.querySelectorAll(".scroll");

var elScroll = document.querySelectorAll('.reveal');

// Function to reveal elements in viewport
function revealOnScroll() {
  elScroll.forEach(function(el) {
    var positionEl = el.getBoundingClientRect();
    var alturaEl = positionEl.top;

    if (alturaEl < 750 && alturaEl > -450) {
      // Set value to start animation of scroll
      el.classList.add("revealed");
    } else {
      el.classList.remove("revealed");
    }
  });
}

// Function to check if an element is in viewport
function isInViewport(element) {
  var rect = element.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
  );
}

// Reveal elements on page load
window.addEventListener('DOMContentLoaded', function() {
  revealOnScroll();
});

// Event listener for scroll
window.addEventListener('scroll', revealOnScroll);