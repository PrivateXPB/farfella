<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Product</title>
  <link rel="stylesheet" href="style/admin-products-edit.css">
</head>
<body>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prod_name_to_edit = $_POST["prod_name_to_edit"];
    require_once "includes/dbh-inc.php";

    try {
      $productInfo_sql = "SELECT * FROM Products WHERE prod_name = :prod_name_to_edit;";
      $productInfo_stmt = $pdo->prepare($productInfo_sql);
      $productInfo_stmt->bindParam(':prod_name_to_edit', $prod_name_to_edit, PDO::PARAM_INT);
      $productInfo_stmt->execute();
      $prodInfo_results = $productInfo_stmt->fetch(PDO::FETCH_ASSOC);

      
      
      if ($prodInfo_results) {
        ?>
        <form action="includes/update_product.php" method="POST">
          <div class="products-pop-up">
            <div class="new-product-desc-section">
              <div class="add-product-info">
                <input id="prodName" class="prod-info" type="text" name="prod_name" placeholder="Product Name" value="<?php echo htmlspecialchars($prodInfo_results['prod_name']); ?>">
                <input id="prodDesc" class="prod-info" type="text" name="prod_desc" placeholder="Product Description" value="<?php echo htmlspecialchars($prodInfo_results['prod_desc']); ?>">
                <input id="prodStock" class="prod-info" type="text" name="stock" placeholder="Product Stock" value="<?php echo htmlspecialchars($prodInfo_results['stock']); ?>">
                <input id="prodCategory" class="prod-info" type="text" name="category" placeholder="Product Category" value="<?php echo htmlspecialchars($prodInfo_results['category']); ?>">
                <input id="prodPrice" class="prod-info" type="text" name="price" placeholder="Product Price" value="<?php echo htmlspecialchars($prodInfo_results['price']); ?>">
                <input id="prodColors" class="prod-info" type="text" name="color" placeholder="Product Color" value="<?php echo htmlspecialchars($prodInfo_results['color']); ?>">
                <input id="prodImage" class="prod-info" type="hidden" name="prod_image" value="<?php echo htmlspecialchars($prodInfo_results['prod_image']); ?>">
                <div class="color-container"></div>
                <button id="updateProduct" class="add-product-button" type="submit">Update Product</button>
              </div>
            </div>
            <div class="container">
              <img id="backgroundImage" src="<?php echo htmlspecialchars($prodInfo_results['prod_image']); ?>" alt="Product Image">
              <button type="button" id="uploadButton">Choose Image</button>
              <input type="file" id="fileInput" accept="image/*" style="display: none;">
            </div>
          </div>
        </form>
        <?php
      } else {
        echo "Product not found.";
      }
    } catch (PDOException $e) {
      error_log("Query Failed: " . $e->getMessage());
      echo "An error occurred while fetching product information.";
    }
  } else {
    header("Location: ../main.html");
    die();
  }
  ?>
  <script src=''></script>
</body>
</html>