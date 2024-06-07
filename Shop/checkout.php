<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: register_login.php");
    exit();
}
include 'config.php';

// Retrieve cart items with product details from the database
$sql = "SELECT cart.*, products.name AS product_name, products.price AS product_price, products.logo_img AS product_image FROM cart INNER JOIN products ON cart.product_id = products.id";
$result = $conn->query($sql);
$total_price = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
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
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .text-end {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <!-- Left Container - Item List -->
        <div class="col-md-8">
            <h2 class="mb-4">Checkout</h2>
            <!-- Cart Items List -->
            <div class="items">
                <?php if ($result->num_rows > 0): ?>
                    <?php 
                    $total_price = 0;
                    while($row = $result->fetch_assoc()): 
                        $total_price += $row["product_price"] * $row["quantity"];
                    ?>
                        <div class="item d-flex align-items-center mb-3">
                            <img src="<?php echo $row["product_image"]; ?>" alt="<?php echo $row["product_name"]; ?>" class="img-fluid rounded" style="width: 100px; height: 100px; object-fit: cover; margin-right: 20px;">
                            <div>
                                <h5><?php echo $row["product_name"]; ?></h5>
                                <p>Quantity: <?php echo $row["quantity"]; ?></p>
                                <p>Price: $<?php echo $row["product_price"]; ?></p>
                                
                                <a href='remove_from_cart.php?id=<?php echo $row["id"]; ?>&redirect=checkout' class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Remove</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No items in cart</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Right Container - Total, Discounts, etc. -->
        <div class="col-md-4">
            <h2 class="mb-4">Order Summary</h2>
            <!-- Total Price -->
            <div class="total-price mb-3">Total: $<?php echo $total_price; ?></div>
            
            <!-- Payment Method Section -->
            <div class="payment-method mb-3">
    <h4>Payment Method</h4>
    <!-- Card Details Form -->
    <form action="thank_you.php" method="post">
        <div class="mb-3">
            <label for="card-number" class="form-label">Card Number</label>
            <input type="text" class="form-control" id="card-number">
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="expiry-date" class="form-label">Expiration Date</label>
                <input type="text" class="form-control" id="expiry-date">
            </div>
            <div class="col">
                <label for="cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="cvv">
            </div>
        </div>
        <button type="submit" class="btn btn-danger">Submit Payment</button>
    </form>
</div>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

