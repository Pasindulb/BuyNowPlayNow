<?php
session_start();
require_once 'cart_functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];

    // Add item to cart
    addToCart($product_id, $product_name, $product_description, 1); // Assuming quantity is 1

    // Redirect back to wishlist page
    header('Location: cart.php');
    exit();
} else {
    // Handle invalid request
    echo "Invalid request.";
}
?>
