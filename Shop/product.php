<?php
include 'config.php';

$sql = "SELECT id, name, description, price, image_url, character_image_url, carousel_img, logo_img FROM products";
$result = $conn->query($sql);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if product ID is provided in URL
if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Fetch product details from database
    $sql = "SELECT id, name, description, price, image_url, character_image_url, carousel_img, logo_img FROM products WHERE id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Product found, display product details
        $product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <!-- basic -->
   <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>BuyNowPlayNow</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <!-- CSS Files -->
      
      <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/services/service-2/assets/css/service-2.css" />
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      
      
      <link rel="stylesheet" type="text/css" href="style2.css" >
       <!-- Favicon-->
       <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
       <!-- Bootstrap icons-->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesoeet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">








      
</head>
<body><div style="background-color: #111111;">
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark opacity-75 fixed-top custom_menu" data-bs-theme="dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="Home.php"><img src="images/main logo.png" alt="Bootstrap" width="100" height="auto"></a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="store.php">Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about us.html">About us</a>
                    </li>
                    
                </ul>
            </div>
            <form class="d-flex" role="search">
                
                <ul>
                    <li><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                </ul>
                
            </form>
        </div>
    </nav>
    <div class="container ">
        <div class="game-title" style="margin-top: 70px;"><?php echo $product['name']; ?></div>
        <div class="content">
            <div class="left-container">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="<?php echo $product['carousel_img']; ?>" alt="<?php echo $product['name']; ?>" style="width:100%;"> 
                        </div>
                    </div>
                </div>

                <div class="game-description">
                    <p><?php echo $product['description']; ?></p>
                </div>
            </div>

            <div class="right-container">
                <div class="game-logo">
                    <img src="<?php echo $product['logo_img']; ?>" alt="game-logo">
                </div>
                <div class="base-game">Base Game</div>
                <div class="price">Price: $ <?php echo $product['price']; ?></div>

                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
                    <input type="hidden" name="product_description" value="<?php echo $product['description']; ?>">
                    <input type="submit" class="btn btn-lg btn-primary" style="width: 100%; border-radius: 6px; border: solid white 1px; margin-top: 10px; height: 30px; display: flex; justify-content: center; align-items: center; background-color: transparent; color: white; font-size: 10px" value="GET">
                </form>
                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $product['name']; ?>">
                    <input type="hidden" name="product_description" value="<?php echo $product['description']; ?>">
                    <input type="submit" class="btn btn-lg btn-cart" style="width: 100%; border-radius: 6px; border: solid white 1px; margin-top: 10px; height: 30px; display: flex; justify-content: center; align-items: center; background-color: transparent; color: white; font-size: 10px" value="Add to Cart">
                </form>
                
                  
                  </div>

               

                
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/main.js"></script>
      <!-- sidebar -->
     
      <script src="js/custom.js"></script>
</body>
</html>

<?php
    } else {
        // Product not found, display error message or redirect to error page
        echo "Product not found!";
    }
} else {
    // Product ID not provided, display error message or redirect to error page
    echo "Product ID not provided!";
}

// Close database connection
$conn->close();
?>
