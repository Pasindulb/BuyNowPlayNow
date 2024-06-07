<?php
include 'config.php';

$sql = "SELECT id, name, description, price, image_url, character_image_url FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Page</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <!-- CSS Files -->
      
      <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/services/service-2/assets/css/service-2.css" />
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="css/animate.css">
      <link rel="stylesheet" type="text/css" href="css/style.scss">
      <link rel="stylesheet" type="text/css" href="css/review.css">
      <link rel="stylesheet" type="text/css" href="css/product.css">
      <link rel="stylesheet" type="text/css" href="css/progress.css">
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
<body>
<div style="background-color: #111111;">
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
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button" data-bs-toggle="popover" data-bs-title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <ul>
                    <li><a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                </ul>
                <ul>
                    <li><a href="register_login.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                </ul>
            </form>
        </div>
    </nav>

    <section class="section-products min-vh-100">
        <div class="container ">
            

            <div class="row" >
                
                <!-- Single Product -->
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='col-md-6 col-lg-4 col-xl-3 mt-6'>";
                        echo "<div id='product-" . $row["id"] . "' class='single-product'>";
                        echo "<a href='product.php?product_id=" . $row["id"] . "'>";
                        echo "<div class='card2'>";
                        echo "<div class='wrapper'>";
                        echo "<img src='" . $row["image_url"] . "' class='cover-image' />";
                        echo "</div>";
                        echo "<div class='title'><h4 style='color: white; text-align: center;'>" . $row["name"] . "</h4></div>";
                        echo "<img src='" . $row["character_image_url"] . "' class='character' />";
                        echo "</div>";
                        echo "</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "0 results";
                }
                ?>
                
            </div>
        </div>
    </section>
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
// Close database connection
$conn->close();
?>