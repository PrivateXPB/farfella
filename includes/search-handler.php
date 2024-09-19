<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $prod_search = htmlspecialchars($_POST["search"]);

  if (empty($prod_search)) {
    
    $previous_page = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'main.php';

    // Redirect back to the previous page
    header("Location: $previous_page");
    die();
  }

  
  

  try {
    require_once "dbh-inc.php";

    $findProduct_sql = "SELECT * FROM Products WHERE prod_name LIKE :prod_search || prod_desc LIKE :prod_search || stock LIKE :prod_search || category LIKE :prod_search || price LIKE :prod_search || color LIKE :prod_search || prod_image LIKE :prod_search;";


    $findProduct_stmt = $pdo->prepare($findProduct_sql);

    $findProduct_stmt->bindParam(":prod_search", $prod_search, PDO::PARAM_STR);
 

    $findProduct_stmt->execute();

    // Handle file upload here if needed

    $pdo = null;
    $findProduct_stmt = null;


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