<?php
session_start();
require_once 'wishlist_functions.php';

// Check if item_id is set in the request
if(isset($_POST['item_id'])) {
    // Get the item ID from the POST data
    $itemId = $_POST['item_id'];
    
    // Remove the item from the wishlist
    removeItemFromWishlist($itemId);
    
    // Redirect back to the wishlist page
    header("Location: wishlist.php");
    exit();
} else {
    // Redirect back to the wishlist page if item_id is not set
    header("Location: wishlist.php");
    exit();
}
?>

