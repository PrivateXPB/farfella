

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FarFella</title>
  <link rel="stylesheet" href="style/search.css">
  <link rel="stylesheet" href="style/products.css">
</head>
<body style="padding-bottom: 10000px;">

  <?php



  require_once "includes/dbh-inc.php";
  try {
    

    $displayPants_sql = "SELECT * FROM Products WHERE category = 'hoodies';";

    $displayPants_stmt = $pdo->prepare($displayPants_sql);



    $displayPants_stmt->execute();



    $results = $displayPants_stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    $displayPants_stmt = null;

    


  } catch (PDOException $e) {
    echo "Query Failed: " . $e->getMessage();
    die();
    

  }
  if (empty($results)) {

    echo "Add Some Products bIGGA";
    
  } else {
    
    
    ?>

    <div class="products">

    <?php foreach ($results as $row): ?>
      <div class="cloth">
        <button class="prod-button" onclick="showPopup(this)" 
          data-name="<?php echo htmlspecialchars($row['prod_name']); ?>"
          data-desc="<?php echo htmlspecialchars($row['prod_desc']); ?>"
          data-stock="<?php echo htmlspecialchars($row['stock']); ?>"
          data-category="<?php echo htmlspecialchars($row['category']); ?>"
          data-price="<?php echo htmlspecialchars($row['price']); ?>"
          data-color="<?php echo htmlspecialchars($row['color']); ?>"
          data-image="<?php echo htmlspecialchars($row['prod_image']); ?>">
          <img class="product-1" src="<?php echo htmlspecialchars($row['prod_image']); ?>">
          <p style="margin-bottom: 3px;"><?php echo htmlspecialchars($row['prod_name']); ?></p>
          <p style="margin-bottom: 3px;"><?php echo htmlspecialchars($row['prod_desc']); ?></p>
          <p>AED <?php echo htmlspecialchars($row['price']); ?></p>
        </button>
      </div>
    <?php endforeach; ?>
    </div>
    <?php
  }





  ?>
  
















    
  






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



  <div id="productPopup" class="product-1-info" style="display: none;">
    
  </div>
  

  <script src="js/search.js"></script>
  <script src="js/products.js"></script>
  <script src="js/products-pant-copy.js"></script>
  
  
  
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>