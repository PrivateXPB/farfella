<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FarFella</title>
  <link rel="stylesheet" href="style/register.css">
  
  <link rel="stylesheet" href="style/search.css">
</head>
<body>
  <main>
    <form action="includes/registerhandler.php" method="post">
      <div class="register-page-format">
        <p class="register">Register</p>
        
        <input class="firstname" type="text" name="first_name" placeholder="First Name">
        <input class="lastname" type="text" name="last_name" placeholder="Last Name">
      
        <input class="input-email" type="email" name="email" placeholder="Email" >
        <input class="input-password" type="password" name="pwd" placeholder="Password">
        <input class="input-confirm-password" type="password" name="confirmpwd" placeholder="Confirm Password">
        
        
        
        <button class="create-account-button" type="submit">Create Account</button>
        
  
        
        
      </div>
    </form>
    <div class="already-have-account-format">
      <button class="already-have-account-button" onclick="location.href='account.php'">Already Registered? Login</button>
    </div>
    
  </main>
  
    

    
  
  

  <div class="header">
    <div class="left-header">
      <div class="redirect" onclick="location.href='full-sets.php'">Full Sets</div>
      <div class="redirect" onclick="location.href='hoodies.php'">Hoodies</div>
      <div class="redirect" onclick="location.href='pants.php'">Pants</div>
    </div>
    <div class="logo">
      <img class="logo-img" onclick="location.href='main.php'" src="uploads/PHOTO-2023-07-31-21-50-23.png" style="
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
  <script src="js/accounts.js"></script>
  
  
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>