<?php
require_once 'cart_functions.php';

// Get product details from the request
$productId = $_POST['product_id'];
$productName = $_POST['product_name'];
$productDescription = $_POST['product_description'];

// Add the product to the cart
addToCart($productId, $productName, $productDescription);

// Redirect back to the product page or cart page
header("Location: cart.php");
exit();
?>