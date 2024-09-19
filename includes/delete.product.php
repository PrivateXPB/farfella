<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    require_once "dbh-inc.php";

    // Get the product name to delete
    $prod_name_to_delete = $_POST['prod_name_to_delete'];

    // Validate data
    if (empty($prod_name_to_delete)) {
        $_SESSION['error'] = "Product name to delete cannot be empty";
        header("Location: ../admin-products.php");
        die();
    }

    try {
        // Prepare SQL statement
        $deleteProd_sql = "DELETE FROM Products WHERE prod_name = :prod_name_to_delete";

        $deleteProd_stmt = $pdo->prepare($deleteProd_sql);

        // Bind parameter
        $deleteProd_stmt->bindParam(':prod_name_to_delete', $prod_name_to_delete, PDO::PARAM_STR);

        // Execute the statement
        $deleteProd_stmt->execute();

        if ($deleteProd_stmt->rowCount() > 0) {
            $_SESSION['success'] = "Product deleted successfully";
        } else {
            $_SESSION['error'] = "No product found with that name";
        }

    } catch (PDOException $e) {
        $_SESSION['error'] = "Error deleting product: " . $e->getMessage();
    }

    // Redirect back to the product list page
    header("Location: ../admin-products.php");
    die();

} else {
    // If not a POST request, redirect to the main page
    header("Location: ../main.html");
    die();
}
?>