<?php
require_once 'cart_functions.php';

// Get product ID from the request
$productId = $_POST['product_id'];

// Remove the product from the cart
removeFromCart($productId);

// Redirect back to the cart page
header("Location: cart.php");
exit();
?>