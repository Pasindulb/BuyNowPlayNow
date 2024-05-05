<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wishlist</title>
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
            color: #333;
        }
         
        h1{
            color: #f26522;
            font-weight: bolder;
        }
        h3{
            color: #f26522;
            font-weight: bolder;
        }
        .container {
            
            max-width: 800px;
            margin-top: 100px; /* Adjust top margin */
            margin-bottom: 50px; /* Adjust bottom margin */
        }

        .wishlist-item {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .wishlist-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .wishlist-item h3 {
            margin-top: 0;
            margin-bottom: 10px;
            color: black;
        }

        .wishlist-item p {
            margin-bottom: 0;
        }

        .remove-btn, .add-to-cart-btn {
            background-color: #dc3545;
            border: none;
            color: #fff;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
            margin-bottom: 10px; /* Add margin between buttons */
        }

        .remove-btn:hover, .add-to-cart-btn:hover {
            background-color: #c82333;
        }

        .navbar-brand img {
            width: 100px; /* Adjust logo width */
            height: auto;
        }
        .p{
            color: black;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark opacity-75 fixed-top custom_menu" data-bs-theme="dark">
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

    <div class="container  "> <!-- Add margin top to the container -->
        <h1 class="text-center mb-4 ">My Wishlist</h1>
        <?php
        session_start();
        require_once 'wishlist_functions.php';

        // Start session and get session ID
        $sessionId = session_id();

        // Retrieve wishlist items for the session
        $wishlistItems = getWishlistItems($sessionId);

        if (!empty($wishlistItems)) {
            foreach ($wishlistItems as $item) {
                echo "<div class='wishlist-item'>";
                echo "<h3>{$item['item_name']}</h3>";
                echo "<p>{$item['item_description']}</p>";
                // Add to Cart Button
                echo "<form action='add_to_cart_from_wishlist.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='{$item['id']}'>";
                echo "<input type='hidden' name='product_name' value='{$item['item_name']}'>";
                echo "<input type='hidden' name='product_description' value='{$item['item_description']}'>";
                echo "<button type='submit' class='add-to-cart-btn'>Add to Cart</button>";
                echo "</form>";
                // Remove Button
                echo "<button class='remove-btn' onclick='removeItem({$item['id']})'>Remove</button>";
                echo "</div>";
            }
        } else {
            echo "<p class='text-muted'>No items in wishlist.</p>";
        }
        ?>
    </div>

    <script>
        function removeItem(itemId) {
            if (confirm("Are you sure you want to remove this item from your wishlist?")) {
                // Send AJAX request to remove item
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "remove_from_wishlist.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Reload the page after item is removed
                        window.location.reload();
                    }
                };
                xhr.send("item_id=" + itemId);
            }
        }
    </script>
</body>
</html>
