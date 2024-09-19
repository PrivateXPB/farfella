
const button = document.querySelector('.new-product-button');
const popup = document.querySelector('.products-pop-up');
const addColorButton = document.querySelector('.add-color-button');
const colorContainer = document.querySelector('.color-container');
const productsContainer = document.querySelector('.products');

const prodName = document.getElementById('prodName');
const prodPrice = document.getElementById('prodPrice');
const prodStock = document.getElementById('prodStock');
const prodCategory = document.getElementById('prodCategory');
const prodColor = document.getElementById('prodColors');
const prodImage = document.getElementById('prodImage');

const editButtons = document.querySelector('.edit-button');
const deleteButtons = document.querySelectorAll('.delete-button');

const uploadButton = document.getElementById('uploadButton');
const fileInput = document.getElementById('fileInput');
const backgroundImage = document.getElementById('backgroundImage');
const addProduct = document.getElementById('addProduct');



let storedImageSrc = '';

let productsArray = [];
let idNumber = 0;




prodColor.addEventListener('blur', () => {
  if (prodColor.value) {
    let circleColorDiv = `
      <div style="
        width: 20px;
        height: 20px;
        border-radius: 10px;
        background-color: #${prodColor.value};
        border-style: none;
        margin-right: 10px;
        margin-bottom: 5px;
      "></div>
    `;
    colorContainer.innerHTML = circleColorDiv;
  }
  
});

function displayPopUp(button) {
  button.addEventListener('click', () => {
    popup.style.display = 'flex';
  });
}

displayPopUp(button);





document.addEventListener('click', (event) => {
  if (!popup.contains(event.target) && event.target !== button) {
    closeBigDiv();
  }
});

function resetInputs() {
  prodName.value = '';
  prodPrice.value = '';
  prodStock.value = '';
  prodCategory.value = '';
  prodColor.value = '';
  prodImage.value = '';
  fileInput.value = '';
  backgroundImage.src = '';
  backgroundImage.style.display = 'none';
  colorContainer.innerHTML = '';
  storedImageSrc = '';
}




uploadButton.addEventListener('click', () => {
  fileInput.click();
});


fileInput.addEventListener('change', (event) => {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = (e) => {
      storedImageSrc = e.target.result;
      backgroundImage.src = storedImageSrc;
      backgroundImage.style.display = 'block'
      prodImage.value = 'uploads/' + file.name;
    };
    reader.readAsDataURL(file);
  }
});








function closeBigDiv() {
  popup.style.display = 'none';
  resetInputs();
}


// Get all edit buttons


// Add event listener to each edit button
/*
editButtons.forEach(button => {
  button.addEventListener('click', (e) => {
    
    popup.style.display = 'flex';
    
    // Populate form fields with product data
    prodName.value = productNameEdit;
    prodStock.value = productStockEdit;
    prodCategory.value = productCategoryEdit;
    prodPrice.value = productPriceEdit;
    prodColor.value = productColorEdit;
    prodImage.value = productImageEdit;
    
    // Set the background image
    backgroundImage.src = productImageEdit;
    backgroundImage.style.display = 'block';
    
    // Update color circle
    updateColorCircle(productColorEdit);
    
    // Store the image source
    storedImageSrc = productImageEdit;
  });
});

// Function to update color circle
function updateColorCircle(color) {
  let circleColorDiv = `
    <div style="
      width: 20px;
      height: 20px;
      border-radius: 10px;
      background-color: #${color};
      border-style: none;
      margin-right: 10px;
      margin-bottom: 5px;
    "></div>
  `;
  colorContainer.innerHTML = circleColorDiv;
}

// Modify the existing event listener for prodColor
prodColor.addEventListener('blur', () => {
  if (prodColor.value) {
    updateColorCircle(prodColor.value);
  }
});




*/


