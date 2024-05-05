<?php
session_start();
require_once 'wishlist_functions.php';

// Start session and get session ID
$sessionId = session_id();

// Get item details from POST data
$itemName = $_POST['item_name'];
$itemDescription = $_POST['item_description'];

// Add item to wishlist
addItemToWishlist($sessionId, $itemName, $itemDescription);

// Redirect back to the product page or wishlist page
header("Location: wishlist.php");
exit();
?>
