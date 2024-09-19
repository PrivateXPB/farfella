<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $prod_name = htmlspecialchars($_POST["prod_name"]);
  $prod_desc = htmlspecialchars($_POST["prod_desc"]);
  $stock = htmlspecialchars($_POST["stock"]);
  $category = htmlspecialchars($_POST["category"]);
  $price = htmlspecialchars($_POST["price"]);
  $color = htmlspecialchars($_POST["color"]);
  $prod_image = htmlspecialchars($_POST["prod_image"]);

  if (empty($prod_name) || empty($prod_desc) || empty($stock) || empty($category) || empty($price) || empty($color) || empty($prod_image)) {
    $_SESSION['error'] = "Please enter all data";
    header("Location: ../admin-products.php");
    die();
  }

  
  if (isset($_SESSION['error'])) {
    header("Location: ../admin-products.php");
    die();
  }

  try {
    require_once "dbh-inc.php";

    $addProduct_sql = "INSERT INTO Products (prod_name, prod_desc, stock, category, price, color, prod_image) VALUES (:prod_name, :prod_desc, :stock, :category, :price, :color, :prod_image);";

    $addProduct_stmt = $pdo->prepare($addProduct_sql);

    $addProduct_stmt->bindParam(":prod_name", $prod_name, PDO::PARAM_STR);
    $addProduct_stmt->bindParam(":prod_desc", $prod_desc, PDO::PARAM_STR);
    $addProduct_stmt->bindParam(":stock", $stock, PDO::PARAM_INT);
    $addProduct_stmt->bindParam(":category", $category, PDO::PARAM_STR);
    $addProduct_stmt->bindParam(":price", $price, PDO::PARAM_INT);
    $addProduct_stmt->bindParam(":color", $color, PDO::PARAM_STR);
    $addProduct_stmt->bindParam(":prod_image", $prod_image);

    $addProduct_stmt->execute();

    // Handle file upload here if needed

    $pdo = null;
    $addProduct_stmt = null;

    $_SESSION['success'] = "Product added successfully";
    header("Location: ../admin-products.php");
    die();

  } catch (PDOException $e) {
    $_SESSION['error'] = "Query Failed: " . $e->getMessage();
    header("Location: ../admin-products.php");
    die();
  }

} else {
  header("Location: ../main.html");
  die();
}