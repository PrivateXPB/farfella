<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="style/search.css">
    <link rel="stylesheet" href="style/bag.css">
    <style>
        .cart-item {
          display: flex;
          max-width: 60%;
          height: 170px;
          padding: 10px;
          border: 1px solid #3A3335;
          margin-bottom: 15px;
          margin-left: 20px;

          
        }
        .cart-item img {
            
          height: 100%;
          margin-right: 20px;
          object-fit: cover;
        }
        .cart-item-details {
          display: block;
        }

        .prod-name {
          font-size: 23px;
          font-weight: 500;
          margin-top: 0px;
          margin-bottom: 20px;
        }

        .prod-desc {
          margin-bottom: 3px;
          margin-top: 0;
        }

        .prod-price {
          position: relative;
          bottom: 170px;
          left: 560px;
          font-size: 24px;
          font-weight: 900;
          display: block;
        }
        .remove {
          margin: 0;
          position: relative;
          width: 70px;
          height: 25px;
          bottom: 62px;
          left: 624px;
          border-style: none;
          background-color: transparent;
          display: block;
        }

        .remove:hover {
          text-decoration: underline;
          cursor: pointer;
        }
        .divider {
          position: absolute;
          background-color: #798086;
          height: 100vh;
          width: 1px;
          top: 0px;
          bottom: 10px;
          left: 987px;
          bottom: 10px;
        }

        .checkout-container {
          width: 400px;
          min-height: 100px;
          background-color: white;
          border-style: solid;
          border-width: 1px;
          border-color: black;
          position: absolute;
          top: 100px;
          right: 20px;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .subtotal {
          text-align: center;
          font-size: 20px;
          margin-bottom: 50px;
          
        }
        .list-of-products {
          
          font-size: 16px;
          
          margin-left: 90px;
          margin-top: 0;
          margin-bottom: 0;
          padding-top: 0;
          padding-bottom: 0;
          position: relative;
          
        }

        .center-button {
          display: flex;
          justify-content: center;
          align-items: center;
        }

        .checkout-button {
          width: 150px;
          height: 50px;
          background-color: yellow;
          color: black;
          border-style: solid;
          border-radius: 25px;
          
          border-color: black;
          font-weight: bold;
          margin-bottom: 0;

          
          position: relative;
          bottom: 20px;
          margin-top: 40px;





          transition: all 0.2s
        }

        .checkout-button:hover {
          opacity: 0.8;
          cursor: pointer;
        }


        
    </style>
</head>
<body>
  <div style="margin-top: 100px;"></div>
  <?php
  $productNames = [];
  $totalItems = 0;
  $totalPrice = 0;
  if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $index => $item) {
      echo "<div style='margin-top: 0px;'>";
      echo "<div class='cart-item'>";

      echo "<img src='{$item['image']}' alt='{$item['name']}'>";

      

      echo "<div class='cart-item-details'>";

      echo "<p class='prod-name'>{$item['name']}</p>";

      array_push($productNames, "{$item['name']}<br>");

      if ($item['color'] === "382516") {
        echo "<p class='prod-desc'>Color: Brown</p>";
      } else if ($item['color'] === "967FA2") {
        echo "<p class='prod-desc'>Color: Purple</p>";
      } else {
        echo "<p class='prod-desc'>Color: Black</p>";
      }
      

      echo "<p class='prod-desc'>Size: {$item['size']}</p>";

      
      if ($item['stock'] > 0) {
        echo "<p class='prod-desc' style='color: #81C14B;'>In Stock</p>";
      } else {
        echo "<p class='prod-desc' style='color: #DF2935;'>Out Of Stock</p>";
      }

      

      echo "<p class='prod-quantity'>Quantity: {$item['quantity']}</p>";

      $totalItems += $item['quantity'];

      echo "<p class='prod-price'>AED {$item['price']}</p>";

      $totalPrice += $item['price'] * $item['quantity'];
      
      echo "<form action='includes/remove_from_cart.php' method='post'>";
      echo "<input type='hidden' name='index' value='{$index}'>";
      echo "<button class='remove' type='submit'>Remove</button>";
      echo "</form>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
      echo "<div class='divider'></div>";
    }
  } else {
    echo "<p>There's nothing in your cart.</p>";
  }
  ?>

<div class="checkout-container">
  <?php
  
  echo "<p class='subtotal'>Subtotal ($totalItems Items): <strong>AED $totalPrice</strong></p>";

  foreach ($productNames as $name) {
    echo "<p class='list-of-products'>&#8226; $name <br></p>";
  }
  ?>
  <div class='center-button'>
    <form action="checkout.php" method="post">
      <button class='checkout-button'>Checkout</button>
    </form>
  </div>
  <?php
  
  
  
  
  
  ?>
</div>




    

<div class="header">
    <div class="left-header">
      <div class="redirect" onclick="location.href='full-sets.php'">Full Sets</div>
      <div class="redirect" onclick="location.href='hoodies.php'">Hoodies</div>
      <div class="redirect" onclick="location.href='pants.php'">Pants</div>
    </div>
    <div class="logo" onclick="location.href='main.php'">
      <img class="logo-img" src="uploads/PHOTO-2023-07-31-21-50-23.png" style="
        width: 100%;
        height: 100%;
      ">
    </div>
    <div class="right-header">
      <div class="search">Search</div>
      <div class="redirect" onclick="location.href='account.php'">Account</div>
      <div class="redirect" onclick="location.href='cart.php'">Bag</div>
    </div>
    
  </div>
  


  <div class="form__group__field">
    <input type="input" class="form__field" placeholder="Search">
    <ion-icon class="search-icon" name="arrow-forward-outline"></ion-icon>
  </div>



  
  
  

  

  <script src="js/search.js"></script>
</body>
</html>