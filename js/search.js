const searchPopUp = document.querySelector('.form__group__field');
const searchPopUpTextBox = document.querySelector('.form__field');
const searchButton = document.querySelector('.search');
const body = document.body;

let isTextboxDisplayed = false;



document.addEventListener('click', event => {
  if (event.target !== searchPopUpTextBox) {
    if (event.target === searchButton && isTextboxDisplayed) {
      searchPopUp.style.display = 'none';
      
      body.classList.remove('click-to-search-blur');
      
      
      body.classList.remove('no-scroll');
      isTextboxDisplayed = false;
    }
    if (event.target === searchButton && !isTextboxDisplayed) {
      searchPopUp.style.display = 'block';

      
      body.classList.add('click-to-search-blur');
      
      body.classList.remove('no-click-to-search-blur');

      body.classList.add('no-scroll');

      isTextboxDisplayed = true;
    }
    if (event.target !== searchButton && isTextboxDisplayed) {
      searchPopUp.style.display = 'none';


      body.classList.remove('click-to-search-blur');


      body.classList.remove('no-scroll');
      
      isTextboxDisplayed = false;
    }

    
  }
});
