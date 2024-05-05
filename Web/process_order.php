<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $address = $_POST['address'];
    $cardNumber = $_POST['card_number'];
    $expiryDate = $_POST['expiry_date'];

    // Validate form data (you may add more validation)
    if (empty($name) || empty($address) || empty($cardNumber) || empty($expiryDate)) {
        // Handle validation errors
        $error = "All fields are required.";
        // You can redirect back to the form with an error message
        header("Location: place_order.php?error=$error");
        exit;
    }

    // Process the order (e.g., save to database, send confirmation email)
    // Your code for processing the order goes here

    // Redirect to a thank you page or display a success message
    header("Location: thank_you.php");
    exit;
}
?>
