<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: black;
        }
         
        h1{
            color: #f26522;
            font-weight: bolder;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
        }
        .card5 {
            transition: box-shadow 0.3s;
        }

        .card5:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }
        h1{
            color: #f26522;
            font-weight: bolder;
            
        }
        .navbar-brand img {
            width: 100px; /* Adjust logo width */
            height: auto;}
            .container {
            
            max-width: 800px;
            margin-top: 100px; /* Adjust top margin */
            margin-bottom: 50px; /* Adjust bottom margin */
        }

        .card5 {
    min-height: 170px;
    margin: 0;
    padding: 1.7rem 1.2rem;
    border: none;
    border-radius: 0;
    color: white;
    letter-spacing: 0.05rem;
    font-family: "Oswald", sans-serif;
    box-shadow: 0 0 21px rgba(0, 0, 0, 0.27);
  }
  .card5.txt {
    margin-left: -3rem;
    z-index: 1;
    color: black;
  }
  .card5.txt h1 {
    color: black;
    font-size: 1.5rem;
    font-weight: 300;
    text-transform: uppercase;
  }
  .card5-text{
    color: black;
    
  }
      h5.card5-title{
        font-weight: bold;
      }
  

    </style>
</head>
<body><nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark opacity-75 fixed-top custom_menu" data-bs-theme="dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="Home.html"><img src="images/main logo.png" alt="Bootstrap"></a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="Home.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="store.html">Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About us</a>
                    </li>
                   
                </ul>
                
            </div>
        </div>
    </nav>
    <div class="container">
        <h1 class="text-center mb-4">My Cart</h1>
        <?php
        require_once 'cart_functions.php';

        $cartItems = getCartItems();

        if (!empty($cartItems)) {
            foreach ($cartItems as $item) {
                echo "<div class='card5 mb-3'>";
                echo "<div class='card5-body'>";
                echo "<h5 class='card5-title'>" . ($item['name'] ?? 'Unknown') . "</h5>";
                echo "<p class='card5-text'>" . ($item['description'] ?? '') . "</p>";
                echo "<p class='card5-text'>Quantity: " . ($item['quantity'] ?? '') . "</p>";
                echo "<form action='remove_from_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . ($item['id'] ?? '') . "'>";
                echo "<button type='submit' class='btn btn-danger'>Remove</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }
            // Checkout Button
            echo "<div class='text-center'>";
            echo "<a href='checkout.php' class='btn btn-success'>Checkout</a>";
            echo "</div>";
        } else {
            echo "<p class='text-muted'>Your cart is empty.</p>";
        }
        ?>
    </div>
</body>
</html>
