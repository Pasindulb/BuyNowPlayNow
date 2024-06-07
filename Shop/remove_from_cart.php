<?php
include 'config.php';

if (isset($_GET['id'])) {
    $cart_item_id = $_GET['id'];
    $redirect_page = isset($_GET['redirect']) ? $_GET['redirect'] : 'cart';

    $sql = "DELETE FROM cart WHERE id = '$cart_item_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: $redirect_page.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Cart item ID not provided";
}

$conn->close();
?>
