<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: register_login.php");
    exit();
}
include 'config.php';

// Pagination variables
$items_per_page = 10;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $items_per_page;

$sql = "SELECT COUNT(*) AS total_items FROM cart";
$result = $conn->query($sql);
$total_items = $result->fetch_assoc()['total_items'];

// Retrieve cart items with product details from the database
$sql = "SELECT cart.*, products.name AS product_name, products.description AS product_description, products.price AS product_price, products.image_url AS product_image FROM cart INNER JOIN products ON cart.product_id = products.id LIMIT $items_per_page OFFSET $offset";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="styles.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Custom Styles */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .card-text {
            color: #6c757d;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .text-end {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Cart</h2>

    <!-- Error Message -->
    <?php if ($conn->connect_error || $result === false): ?>
        <div class="alert alert-danger" role="alert">
            Error: <?php echo $conn->connect_error ? "Connection failed: " . $conn->connect_error : "Query failed."; ?>
        </div>
    <?php else: ?>
        <!-- Cart Items -->
        <?php if ($result->num_rows > 0): ?>
            <div class="row">
                <?php 
                $total_price = 0;
                while($row = $result->fetch_assoc()): 
                    $total_price += $row["product_price"] * $row["quantity"];
                ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row["product_name"]; ?></h5>
                                <p class="card-text">Quantity: <?php echo $row["quantity"]; ?></p>
                                <p class="card-text">Price: $<?php echo $row["product_price"]; ?></p>
                                
                                <a href='remove_from_cart.php?id=<?php echo $row["id"]; ?>&redirect=cart' class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>No items in cart</p>
        <?php endif; ?>
        <?php if ($total_items > 0): ?>
        <div class="text-end">
            <a href="checkout.php" class="btn btn-danger">Go to Checkout</a>
        </div>
    <?php endif; ?>
        <!-- Pagination -->
        <!-- You can add pagination here if needed -->
    <?php endif; ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
