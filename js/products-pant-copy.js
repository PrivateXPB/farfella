let pants = [{
  id: 0,
  name: "Black Pant",
  img: "img/WhatsApp Image 2024-07-14 at 18.05.05 (2).jpeg",
  price: 200,
  color: "black",
  category: "pant",
  clothClicked: '.product-1',
  stock: 14
}, {
  id: 1,
  name: "Brown Pant",
  img: "img/WhatsApp Image 2024-07-14 at 18.05.05 (6).jpeg",
  price: 150,
  color: "#382516",
  category: "pant",
  clothClicked: '.product-2',
  stock: 0
}, {
  id: 2,
  name: "Purple Pant",
  img: "img/WhatsApp Image 2024-07-14 at 18.05.05 (10).jpeg",
  price: 130,
  color: "#967FA2",
  category: "pant",
  clothClicked: '.product-3',
  stock: 45
}]






const singleProduct = document.querySelector('.product-1-info');
const cloth = document.querySelectorAll('.cloth');
const clothInspectImage = document.querySelector('.product-img-after-click');




  // Add event listeners for quantity buttons


 
  

    
/*
cloth.addEventListener('click', () => {
  
  if (singleProduct.style.display === 'flex') {
    
    singleProduct.style.display = 'none';
    body.classList.remove('click-to-blur-product');
    
    body.classList.remove('no-scroll');
    
    
  } else {
    singleProduct.style.display = 'flex';
    body.classList.add('click-to-blur-product');
    body.classList.remove('no-click-to-blur-product');
    
    body.classList.add('no-scroll');
    
    
    

    }
});

document.addEventListener('click', (event) => {
  if (event.target !== singleProduct && !singleProduct.contains(event.target) && !event.target.classList.contains('cloth') && clothClicked) {
    let clothFirstImage = document.querySelector(clothClicked);
    singleProduct.style.display = 'none';
    body.classList.remove('click-to-blur-product');
    
    body.classList.remove('no-scroll');
    clothFirstImage.classList.remove('border-add');
  } 
});

document.addEventListener('click', (event) => {


  // Check if the click is outside the popup content
  if (event.target !== singleProduct && !singleProduct.contains(event.target) && !event.target.classList.contains('cloth')) {
    popup.style.display = 'none';
    document.body.classList.remove('no-scroll');
    // Remove any additional classes you might have added
  }
});

*/





function showPopup(element) {
  var popup = document.getElementById("productPopup");
  let quantityOfProducts = 1;
  
  var id = element.getAttribute("data-id");
  var name = element.getAttribute("data-name");
  var desc = element.getAttribute("data-desc");
  var price = element.getAttribute("data-price");
  var image = element.getAttribute("data-image");
  var stock = element.getAttribute("data-stock");
  var category = element.getAttribute("data-category");
  var color = element.getAttribute("data-color");
  
  popup.innerHTML = `
    <div class="product-img-after-click"><img class="product-1-inspect-img" src="${image}"></div>
    <div class="product-desc">
      <h1 style="text-align:center; margin-top: 50px; font-family: Bree Serif, serif; font-weight: 400; font-style: normal; font-size: 40px;">${name}</h1>
      <p style="font-size: larger; word-wrap: break-word; margin-top: 40px; margin-left: 20px; margin-right: 20px;">${desc}</p>
      <p style="font-size: 35px; margin-top: 35px; margin-left: 20px; margin-bottom: 0; font-family: Roboto, sans-serif; font-weight: 500;">AED ${price}</p>
      <form action="includes/add_to_cart.php" method="post">
        <input type="hidden" name="prod_id" value="${id}">
        <input type="hidden" name="prod_name" value="${name}">
        <input type="hidden" name="prod_desc" value="${desc}">
        <input type="hidden" name="prod_stock" value="${stock}">
        <input type="hidden" name="prod_category" value="${category}">
        <input type="hidden" name="prod_price" value="${price}">
        <input type="hidden" name="prod_color" value="${color}">
        <input type="hidden" name="prod_image" value="${image}">
        <input type="hidden" id="selected_size" name="selected_size" value="M">
        <input type="hidden" id="quantity" name="quantity" value="1">

        <div class="product-customize">
          <div class="size-container">
            <span class="size-text">Size</span>
            <button type="button" class="size-value-s" onclick="toggleClick1('.size-value-s');">S</button>
            <button type="button" class="size-value-m" onclick="toggleClick1('.size-value-m');">M</button>
            <button type="button" class="size-value-l" onclick="toggleClick1('.size-value-l');">L</button>
          </div>
          <div class="color-container">
            <span class="color-text">Color</span>
            <span type="button" class="color-value" style="background-color: #${color};"></span>
          </div>
          <div class="adding">
            <div class="quantity-container">
              <div class="quantity-controls">
                <span class="quantity-btn-neg" id="decreaseBtn">-</span>
                <span class="quantity-value" id="quantityValue">1</span>
                <span class="quantity-btn-pos" id="increaseBtn">+</span>
              </div>
            </div>
            <div class="add-to-bag">
              <button type="submit" class="add-to-bag-button">Add to Bag</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  `;
  
  popup.style.display = "flex";
  document.body.classList.add('no-scroll');

  const decreaseBtn = document.getElementById('decreaseBtn');
  const increaseBtn = document.getElementById('increaseBtn');
  const quantityValue = document.getElementById('quantityValue');

  decreaseBtn.addEventListener('click', () => {
    if (quantityOfProducts > 1) {
      quantityOfProducts--;
      updateQuantity();
    }
  });

  increaseBtn.addEventListener('click', () => {
    if (quantityOfProducts < 10) {
      quantityOfProducts++;
      updateQuantity();
    }
  });

  function updateQuantity() {
    quantityValue.innerText = quantityOfProducts;
    document.getElementById('quantity').value = quantityOfProducts;
  }
}

// Event listener for closing the popup
document.addEventListener('click', (event) => {
  var popup = document.getElementById("productPopup");

  // Check if the popup is displayed and the click is outside the popup
  if (popup.style.display === "flex" && !popup.contains(event.target) && !event.target.classList.contains('prod-button')) {
    popup.style.display = 'none';
    document.body.classList.remove('no-scroll');
  }
});

// Prevent clicks within the popup from closing it
document.getElementById("productPopup").addEventListener('click', (event) => {
  event.stopPropagation();
});


// Size selection
function toggleClick1(buttonType) {
  
  let button = document.querySelector(buttonType);
  let previousButtonElement = document.querySelector('.button-is-clicked-size');
  if (!button.classList.contains('button-is-clicked-size')) {
    if (previousButtonElement) {
      previousButtonElement.classList.remove('button-is-clicked-size');
    }
    button.classList.add('button-is-clicked-size');
    document.getElementById('selected_size').value = button.textContent;
  } else {
    button.classList.remove('button-is-clicked-size');
    document.getElementById('selected_size').value = 'M';
  }
}