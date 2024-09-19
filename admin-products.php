<?php
  session_start();
  
  if (isset($_SESSION['error'])) {
      echo '<p style="color: red; position: absolute;">' . $_SESSION['error'] . '</p>';
      unset($_SESSION['error']);
  }
  if (isset($_SESSION['success'])) {
      echo '<p style="color: green; position: absolute;">' . $_SESSION['success'] . '</p>';
      unset($_SESSION['success']);
  }
?>






<?php
  

  
?>
  







<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FarFella</title>
  <link rel="stylesheet" href="style/admin-products.css">
  <link rel="stylesheet" href="style/admin-header.css">

  
</head>
<body>
  
  <button class="new-product-button">+ &#160;New Product</button>
  
  
  <div class="products">
  
  <?php
  // render_products.php
  require_once "includes/dbh-inc.php";
  try {
    
  
    $displayProducts_sql = "SELECT prod_name, prod_image FROM Products;";
  
    $displayProducts_stmt = $pdo->prepare($displayProducts_sql);
  
  
  
    $displayProducts_stmt->execute();
  
  
  
    $results = $displayProducts_stmt->fetchAll(PDO::FETCH_ASSOC);
  
    $pdo = null;
    $displayProducts_stmt = null;
  
   
  
  
  } catch (PDOException $e) {
    echo "Query Failed: " . $e->getMessage();
    die();
    
  
  }
  if (empty($results)) {

    echo "Add Some Products bIGGA";
    
  } else {
    
    
  
    foreach ($results as $row) {
      

      
      echo "<div class='cloth'>";
      echo "<img class='product-1' src='" . htmlspecialchars($row['prod_image']) . "'>";
      echo "<div class='update-buttons'>";
      echo "<form action='edit_product.php' method='post'>";
      echo "<input type='hidden' name='prod_name_to_edit' value='" . htmlspecialchars($row['prod_name']) . "'>";
      echo "<button class='edit-button' type='submit'>Edit</button>";
      echo "</form>";
      echo "<form action='includes/delete.product.php' method='post'>";
      echo "<input type='hidden' name='prod_name_to_delete' value='" . htmlspecialchars($row['prod_name']) . "'>";
      echo "<button class='delete-button' type='submit'>Delete</button>";
      echo "</form>";
      echo "</div>";
      echo "</div>";
    }
  }
  ?>
    
  </div>
  
  
  <form id="myForm" action="includes/productshandler.php" method="post">
    <div class="products-pop-up">
      
      
    
      <div class="new-product-desc-section">
        <div class="add-product-info">

          <input id="prodName" class="prod-info" type="text" name="prod_name" placeholder="Product Name">
          <input id="prodDesc" class="prod-info" type="text" name="prod_desc" placeholder="Product Description">
          <input id="prodStock" class="prod-info" type="text" name="stock" placeholder="Product Stock">
          <input id="prodCategory" class="prod-info" type="text" name="category" placeholder="Product Category">
          <input id="prodPrice" class="prod-info" type="text" name="price" placeholder="Product Price">
          <input id="prodColors" class="prod-info" type="text" name="color" placeholder="Product Color">
          <input id="prodImage" class="prod-info" type="hidden" name="prod_image" value="">
            
          <div class="color-container">
            
          </div>
          <button id="addProduct" class="add-product-button" type="submit">Add Product</button>
          
        </div>
      </div>
    
      <div class="container">
        <img id="backgroundImage" src="" alt="">
        <button type="button" id="uploadButton">Choose Image</button>
        <input type="file" id="fileInput" accept="image/*" style="display: none;">
      </div>
      
    
    </div>
  </form>
  
  
  
  



  















  <div class="header">
    <div class="left-header">
      <div class="redirect" onclick="location.href='sales.html'">Sales</div>
      <div class="redirect" onclick="location.href='deliveries.html'">Deliveries</div>
      
    </div>
    <div class="logo" onclick="location.href='admin-main.html'">
      <img class="logo-img" src="uploads/PHOTO-2023-07-31-21-50-23.png" style="
        width: 100%;
        height: 100%;
      ">
    </div>
    <div class="right-header">

      <div class="redirect" onclick="location.href='user-accounts.html'">Accounts</div>
      <div class="redirect" onclick="location.href='admin-products.php'">Products</div>
    </div>
    
  </div>
  <div class="header-line"></div>


  



 
  
  

  

  

  
  
  
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="js/admin-products.js"></script>
  
</body>
</html>