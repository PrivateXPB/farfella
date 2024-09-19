document.addEventListener('DOMContentLoaded', function() {
  const inputs = document.querySelectorAll('input');

  inputs.forEach(input => {
      // Set initial opacity
      input.style.opacity = '0.5';

      // Focus event (clicking on the input)
      input.addEventListener('focus', function() {
          this.style.opacity = '1';
      });

      // Blur event (clicking out of the input)
      input.addEventListener('blur', function() {
          if (this.value === '') {
              this.style.opacity = '0.5';
          }
      });

      // Input event (typing in the input)
      input.addEventListener('input', function() {
          this.style.opacity = '1';
          this.style.backgroundColor = 'white';
      });
  });
});




