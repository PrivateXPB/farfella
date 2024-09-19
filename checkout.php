<?php
session_start();

require __DIR__ . "/vendor/autoload.php";

$stripe_secret_key = "sk_test_51PldgvP3Sdsyx4a2CLzF3TOFru3BpVMvr21PWnWGeFb69B60Az3VTPL04d8KFFYVEzJRPj79B8nFF8qZF9qEFrun00Dbcn8odm";

\Stripe\Stripe::setApiKey($stripe_secret_key);

$line_items = [];

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $index => $item) {


    $line_items[] = [
      'price_data' => [
          'currency' => 'aed',
          'unit_amount' => $item['price'] * 100,
          'product_data' => [
              'name' => $item['name'],
          ],
      ],
      'quantity' => $item['quantity'],
    ];
  }
} else {
  header("Location: cart.php");
  die();
}


    

$checkout_session = \Stripe\Checkout\Session::create([
  "mode" => "payment",
  "success_url" => "http://localhost/Aryan/success.php",
  "cancel_url" => "http://localhost/Aryan/main.php",
  "line_items" => $line_items
]);


  



http_response_code(303);
header("Location: " . $checkout_session->url)






?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FarFella</title>
  <link rel="stylesheet" href="style/header.css">
  <link rel="stylesheet" href="style/search.css">
</head>
<body>
















































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
  <script src="js/search.js"></script>
</body>
</html>