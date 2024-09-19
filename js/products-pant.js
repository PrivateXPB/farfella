let pants = [{
  id: 0,
  name: "Black Pant",
  img: "img/WhatsApp Image 2024-07-14 at 18.05.05 (2).jpeg",
  price: 200,
  color: "black",
  category: "pant",
  clothClicked: '.product-1'
}, {
  id: 1,
  name: "Brown Pant",
  img: "img/WhatsApp Image 2024-07-14 at 18.05.05 (6).jpeg",
  price: 150,
  color: "brown",
  category: "pant",
  clothClicked: '.product-2'
}, {
  id: 2,
  name: "Purple Pant",
  img: "img/WhatsApp Image 2024-07-14 at 18.05.05 (10).jpeg",
  price: 130,
  color: "purple",
  category: "pant",
  clothClicked: '.product-3'
}]






const singleProduct = document.querySelector('.product-1-info');
const cloth = document.querySelectorAll('.cloth');
const clothInspectImage = document.querySelector('.product-img-after-click');




let clothClicked = '';
let displayDetails = '';
let selected = '';
let idNumber = 987;
let quantityOfProducts = 1;



cloth.forEach(item => {
  item.addEventListener('click', () => {
    
    
    if (idNumber !== 987) {
      
      let html = `
      <div class="product-img-after-click"><img class="product-1-inspect-img" src="${pants[idNumber].img}"></div>
      <div class="product-desc">
        <h1 style="
          text-align:center;
          margin-top: 50px;
          font-family: Bree Serif, serif;
          font-weight: 400;
          font-style: normal;
          font-size: 40px;
        ">${pants[idNumber].name}</h1>
        <p style="
          font-size: larger;
          word-wrap: break-word;
          margin-top: 40px;
          margin-left: 20px;
          margin-right: 20px;
        ">Description: ...............................................................................................................................................................................................................................................................................</p>
        <p style="
          font-size: 35px;
          margin-top: 35px;
          margin-left: 20px;
          margin-bottom: 0;
          font-family: Roboto, sans-serif;
          font-weight: 500;
        
        ">AED ${pants[idNumber].price}</p>
        <form action="includes/add_to_cart.php" method="post">
          <input type="hidden" name="product_id" value="${pants[idNumber].id}">
          <input type="hidden" name="product_name" value="${pants[idNumber].name}">
          <input type="hidden" name="product_price" value="${pants[idNumber].price}">
          <input type="hidden" name="product_color" value="${pants[idNumber].color}">
          <input type="hidden" id="selected_size" name="selected_size" value="M">
          <input type="hidden" id="quantity" name="quantity" value="1">
          <div class="product-customize">
          <div class="product-customize">
            
            
            <div class="size-container">
              <span class="size-text">Size</span>
              <button type="button" class="size-value-s" onclick="toggleClick1('.size-value-s');">S</button>
              <button type="button" class="size-value-m" onclick="toggleClick1('.size-value-m');">M</button>
              <button type="button" class="size-value-l" onclick="toggleClick1('.size-value-l');">L</button>
                
            </div>
            <div class="color-container">
              <span class="color-text">Color</span>
              <span type="button" class="color-value-bl" style="background-color: ${pants[idNumber].color};"></span>
              
              
                
            </div>
            
            <div class="adding">
              <div class="quantity-container">
                <div class="quantity-controls">
                  <span class="quantity-btn-neg" id="decreaseBtn">-</span>
                  <span class="quantity-value" id="quantityValue">${quantityOfProducts}</span>
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
      singleProduct.innerHTML = html;

      // Add event listeners for quantity buttons
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

      const AddToBag = document.querySelector('.add-to-bag-button');
      AddToBag.disable = true;


     

      
    }
    if (clothClicked) {
      
      
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
    }
    
  });
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









function toggleClick1(buttonType) {
  const AddToBag = document.querySelector('.add-to-bag-button');
  AddToBag.disable = false;
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