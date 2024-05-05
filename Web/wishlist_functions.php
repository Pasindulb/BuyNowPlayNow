<?php
require_once 'db_connection.php';

// Function to add item to wishlist
function addItemToWishlist($sessionId, $itemName, $itemDescription) {
    global $conn;
    $sql = "INSERT INTO wishlist_items (session_id, item_name, item_description) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $sessionId, $itemName, $itemDescription);
    $stmt->execute();
    $stmt->close();
}

// Function to retrieve wishlist items for a session
function getWishlistItems($sessionId) {
    global $conn;
    $sql = "SELECT * FROM wishlist_items WHERE session_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $sessionId);
    $stmt->execute();
    $result = $stmt->get_result();
    $wishlistItems = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $wishlistItems;
}

// Function to remove item from wishlist
function removeItemFromWishlist($itemId) {
    global $conn;
    $sql = "DELETE FROM wishlist_items WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $itemId);
    $stmt->execute();
    $stmt->close();
}
?>
