<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .checkout-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .cart-items {
            padding-bottom: 20px;
            border-bottom: 1px solid #dee2e6;
            margin-bottom: 20px;
        }

        .cart-items .item {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        .item-name {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .item-description {
            color: #6c757d;
            margin-bottom: 10px;
        }

        .order-summary {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        .total-price {
            font-size: 20px;
            font-weight: bold;
        }

        .place-order-btn {
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 8px;
            padding: 12px 20px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .place-order-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="checkout-header">
            <h1>Checkout</h1>
            <p>Review your cart items and proceed to checkout.</p>
        </div>
        <div class="cart-items">
            <h2>Cart Items</h2>
            <?php
            require_once 'cart_functions.php';

            $cartItems = getCartItems();

            if (!empty($cartItems)) {
                foreach ($cartItems as $item) {
                    echo "<div class='item'>";
                    echo "<h3 class='item-name'>{$item['name']}</h3>";
                    echo "<p class='item-description'>{$item['description']}</p>";
                    echo "<p>Quantity: {$item['quantity']}</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>Your cart is empty.</p>";
            }
            ?>
        </div>
        <div class="order-summary">
            <h2>Order Summary</h2>
            <div class="total-price">
                <?php
                // Display order total price
                echo "Total: $" . calculateTotalPrice();
                ?>
            </div>
            <form action="place_order.php" method="post">
                <button type="submit" class="place-order-btn">Place Order</button>
            </form>
        </div>
    </div>
</body>
</html>

