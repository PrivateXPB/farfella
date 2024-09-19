<?php

session_start();
if(isset($_SESSION['error'])) {
  echo '<p style="
    color: red;
    position: absolute;
    margin-top: 200px;
  ">' . $_SESSION['error'] . '</p>';
  unset($_SESSION['error']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FarFella</title>
  <link rel="stylesheet" href="style/header.css">
  <link rel="stylesheet" href="style/account.css">
  <link rel="stylesheet" href="style/search.css">
</head>
<body>
  <main>
    <form action="includes/accounthandler.php" method="post">
      <div class="login-page-format">
        <p class="login">Login</p>
        
        
        <input class="input-email" type="email" name="email" placeholder="Email" >
        <input class="input-password" type="password" name="pwd" placeholder="Password">
        
        
        
        <button class="sign-in-button" type="submit">Sign In</button>
        
  
        <p class="fg">forgot password?</p>
        
      </div>
    </form>
    <div class="register-an-account-format">
      <button class="regester-an-account-button" onclick="location.href='register.php'">Register An Account</button>
    </div>
    
  </main>
  
    

    
  
  

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
    <form action="product-search.php" method="get">
      <input type="search" class="form__field" name="search" placeholder="Search" autocomplete="off">
      <button type="submit" class="search-button"><ion-icon class="search-icon" name="arrow-forward-outline"></ion-icon></button>
    </form>
  </div>

  

  <script src="js/search.js"></script>
  <script src="js/accounts.js"></script>
  
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>