const scrollBtn = document.querySelector('.shop-now-button');
const scrollElement = document.querySelector('.scroll-content');




scrollBtn.addEventListener('click', scrollToBottom);

function scrollToBottom() {

  //scrollIntoView
  scrollElement.scrollIntoView({
    behavior: 'smooth',
    block: 'end',
  });
  
}


let head = document.querySelector('.header');

window.addEventListener("scroll", () => {
  if (window.scrollY > 100) {
    head.classList.add('when-not-visible');
  } else {
    head.classList.remove('when-not-visible');
  }
});










//SEARCH

const searchPopUp = document.querySelector('.form__group__field');
const searchPopUpTextBox = document.querySelector('.form__field');
const searchButton = document.querySelector('.search');
const searchIcon = document.querySelector('.search-icon');
const body = document.body;

let isTextboxDisplayed = false;



document.addEventListener('click', event => {
  if (event.target !== searchPopUpTextBox) {
    if (event.target === searchButton && isTextboxDisplayed) {
      searchPopUp.style.display = 'none';
      
      body.classList.remove('click-to-search-blur');
      
      
      body.classList.remove('no-scroll');
      isTextboxDisplayed = false;
      scrollBtn.disabled = false;
      scrollElement.classList.remove('disabled-div');
    }
    if (event.target === searchButton && !isTextboxDisplayed) {
      searchPopUp.style.display = 'block';

      
      body.classList.add('click-to-search-blur');
      
      body.classList.remove('no-click-to-search-blur');

      body.classList.add('no-scroll');

      isTextboxDisplayed = true;
      scrollBtn.disabled = true;
      scrollElement.classList.add('disabled-div');
    }
    if (event.target !== searchButton && isTextboxDisplayed) {
      searchPopUp.style.display = 'none';


      body.classList.remove('click-to-search-blur');


      body.classList.remove('no-scroll');
      
      isTextboxDisplayed = false;
      scrollBtn.disabled = false;
      scrollElement.classList.remove('disabled-div');
    }

    
  }
});

window.addEventListener("scroll", () => {
  if (window.scrollY > 700) {
    searchPopUp.style.borderColor = "black";
    searchPopUpTextBox.style.color = "black";
    searchIcon.style.color = "black";
    
    // Add these lines
    searchPopUpTextBox.style.setProperty('--placeholder-color', 'black');
 
  } else {
    searchPopUp.style.borderColor = "white";
    searchPopUpTextBox.style.color = "white";
    searchIcon.style.color = "white";
    
    // Add these lines
    searchPopUpTextBox.style.setProperty('--placeholder-color', 'white');

  }
});

