/**
 * MyCore Theme - Main JavaScript
 */
(function () {
  'use strict';

  // Example: mobile menu toggle (customize as needed)
  var nav = document.getElementById('site-navigation');
  if (nav) {
    // Add ARIA / mobile menu logic here if needed
  }

  // Smooth scroll for anchor links (optional)
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      var target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth' });
      }
    });
  });
})();
