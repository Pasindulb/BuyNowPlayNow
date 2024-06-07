<?php
session_start();
include 'config.php';

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    
    // Check if user is logged in
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id']; 
        $quantity = 1;

        // Check if the item is already in the cart
        $sql = "SELECT * FROM cart WHERE product_id = $product_id AND user_id = $user_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Item already in cart, update quantity
            $row = $result->fetch_assoc();
            $new_quantity = $row['quantity'] + 1;
            $sql = "UPDATE cart SET quantity = $new_quantity WHERE product_id = $product_id AND user_id = $user_id";
        } else {
            // Item not in cart, insert new record
            $sql = "INSERT INTO cart (product_id, user_id, quantity) VALUES ($product_id, $user_id, $quantity)";
        }

        if ($conn->query($sql) === TRUE) {
            header("Location: cart.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "User not logged in.";
    }
} else {
    echo "Product ID not provided";
}

$conn->close();
?>
