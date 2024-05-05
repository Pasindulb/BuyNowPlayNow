<!-- Product Page HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Product Name</h1>
        <p>Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <p>Price: $10.00</p>
        <!-- Add to Cart Form -->
        <form action="add_to_cart.php" method="post">
            <!-- Hidden input fields for product details -->
            <input type="hidden" name="product_id" value="1">
            <input type="hidden" name="product_name" value="Product Name">
            <input type="hidden" name="product_description" value="Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit.">
            <!-- Add to Cart Button -->
            <button type="submit" class="btn btn-primary">Add to Cart</button>
        </form>
    </div>
</body>
</html>
