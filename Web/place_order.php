<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 5px;
        }

        h1 {
            color: #f26522;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        .btn-primary {
            background-color: #f26522;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #d9534f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Place Your Order</h1>
        <form action="process_order.php" method="post">
            <h3>Shipping Information</h3>
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Address" required>
            </div>
            <h3>Payment Information</h3>
            <div class="form-group">
                <input type="text" class="form-control" name="card_number" placeholder="Card Number" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="expiry_date" placeholder="Expiry Date (MM/YY)" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Place Order</button>
        </form>
    </div>
</body>
</html>
