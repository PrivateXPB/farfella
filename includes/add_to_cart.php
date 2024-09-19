<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = [
        'id' => $_POST['prod_id'],
        'name' => $_POST['prod_name'],
        'desc' => $_POST['prod_desc'],
        'stock' => $_POST['prod_stock'],
        'category' => $_POST['prod_category'],
        'price' => $_POST['prod_price'],
        'color' => $_POST['prod_color'],
        'size' => $_POST['selected_size'],
        'quantity' => $_POST['quantity'],
        'image' => $_POST['prod_image']
    ];

    

    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [];
    }

    // Check if the product is already in the cart
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $product['id'] && $item['size'] == $product['size']) {
            $item['quantity'] += $product['quantity'];
            $found = true;
            break;
        }
    }

    if (!$found) {
        $_SESSION['cart'][] = $product;
    }

    $previous_page = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'main.php';

    // Redirect back to the previous page
    header("Location: $previous_page");
    
    
}