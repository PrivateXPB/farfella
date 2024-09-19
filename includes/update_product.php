<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    require_once "dbh-inc.php";

    // Collect form data
    $prod_name = htmlspecialchars($_POST['prod_name']);
    $prod_desc = htmlspecialchars($_POST['prod_desc']);
    $stock = htmlspecialchars($_POST['stock']);
    $category = htmlspecialchars($_POST['category']);
    $price = htmlspecialchars($_POST['price']);
    $color = htmlspecialchars($_POST['color']);
    $prod_image = htmlspecialchars($_POST['prod_image']);

    // Validate data (add more validation as needed)
    if (empty($prod_name) || empty($prod_desc) || empty($stock) || empty($category) || empty($price) || empty($color) || empty($prod_image)) {
        $_SESSION['error'] = "Product name cannot be empty";
        header("Location: ../edit_product.php");
        exit();
    }

    try {
        // Prepare SQL statement
        $updateProduct_sql = "UPDATE Products SET
                prod_name = :prod_name,
                prod_desc = :prod_desc, 
                stock = :stock, 
                category = :category, 
                price = :price, 
                color = :color, 
                prod_image = :prod_image
                WHERE prod_name = :prod_name";

        $updateProduct_stmt = $pdo->prepare($updateProduct_sql);

        // Bind parameters
        $updateProduct_stmt->bindParam(':prod_name', $prod_name, PDO::PARAM_STR);
        $updateProduct_stmt->bindParam(':prod_desc', $prod_desc, PDO::PARAM_STR);
        $updateProduct_stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
        $updateProduct_stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $updateProduct_stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $updateProduct_stmt->bindParam(':color', $color, PDO::PARAM_STR);
        $updateProduct_stmt->bindParam(':prod_image', $prod_image, PDO::PARAM_STR);

        // Execute the statement
        $updateProduct_stmt->execute();

        if ($updateProduct_stmt->rowCount() > 0) {
            $_SESSION['success'] = "Product updated successfully";
        } else {
            $_SESSION['error'] = "No changes made to the product";
        }

    } catch (PDOException $e) {
        $_SESSION['error'] = "Error updating product: " . $e->getMessage();
    }

    // Redirect back to the edit page or a product list page
    header("Location: ../admin-products.php");
    exit();

} else {
    // If not a POST request, redirect to the main page
    header("Location: ../main.html");
    exit();
}
?>