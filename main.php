<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FarFella</title>
  <link rel="stylesheet" href="style/main.css">
  <link rel="stylesheet" href="style/main-search.css">
</head>
<body style="padding-bottom: 10000px;">
  
  <div class="front-page">
    
    <img src="uploads/Screenshot 2024-03-21 at 3.37.02 PM.png" class="front-page-img">

    
    <button class="shop-now-button" onclick="
      scrollToBottom();
      
    ">Shop now!</button>
    
  </div>
  
  <div class="scroll-content">
    <div class="category-img" style="background-color: lightblue;" onclick="location.href='full-sets.php'">Full Sets</div>
    <div class="category-img" style="background-color: lightpink;" onclick="location.href='hoodies.php'">Hoodies</div>
    <div class="category-img" style="background-color: lightblue;" onclick="location.href='pants.php'">Pants</div>
  </div>
  
  <div class="header">
    <div class="left-header">
      <div class="redirect" onclick="location.href='full-sets.php'">Full Sets</div>
      <div class="redirect" onclick="location.href='hoodies.php'">Hoodies</div>
      <div class="redirect" onclick="location.href='pants.php'">Pants</div>
    </div>
    <div class="logo" onclick="location.href='main.php'">
      FarFella
    </div>
    <div class="right-header">
      <div class="search">Search</div>
      
      <div class="redirect" onclick="location.href='account.php'">Account</div>
      <div class="redirect" onclick="location.href='cart.php'">Bag</div>
    </div>
    
  </div>

  <div class="form__group__field">
    <form action="product-search.php" method="get">
      <input type="search" class="form__field" name="search" placeholder="Search" autocomplete="off">
      <button type="submit" class="search-button"><ion-icon class="search-icon" name="arrow-forward-outline"></ion-icon></button>
    </form>
  </div>
  
  <script src="js/main.js"></script>
  
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>