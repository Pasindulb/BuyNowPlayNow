<?php
// Start the session if it hasn't already been started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Add item to cart
function addToCart($productId, $productName, $productDescription) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the product is already in the cart
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] === $productId) {
            // Increment quantity if the product is already in the cart
            $item['quantity']++;
            return;
        }
    }

    // Add the product to the cart
    $_SESSION['cart'][] = [
        'id' => $productId,
        'name' => $productName,
        'description' => $productDescription,
        'quantity' => 1
    ];
}

// Remove item from cart
function removeFromCart($productId) {
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $productId) {
                unset($_SESSION['cart'][$key]);
                return;
            }
        }
    }
}

// Get cart items
function getCartItems() {
    return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
}


// Calculate total price of items in cart
function calculateTotalPrice() {
    // Since all items are free, return 0 as the total price
    return 0;
}
?>
