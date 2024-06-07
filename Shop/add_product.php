<?php
include 'config.php';

// Define variables and initialize with empty values
$name = $description = $price = $image_url = $carousel_img = $logo_img = "";
$name_err = $description_err = $price_err = $image_url_err = $carousel_img_err = $logo_img_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter a name.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate description
    if (empty(trim($_POST["description"]))) {
        $description_err = "Please enter a description.";
    } else {
        $description = trim($_POST["description"]);
    }

    // Validate price
    if (empty(trim($_POST["price"]))) {
        $price_err = "Please enter a price.";
    } else {
        $price = trim($_POST["price"]);
    }

    // Validate image URL
    if (empty(trim($_POST["image_url"]))) {
        $image_url_err = "Please enter an image URL.";
    } else {
        $image_url = trim($_POST["image_url"]);
    }

    // Validate carousel image URL
    if (empty(trim($_POST["carousel_img"]))) {
        $carousel_img_err = "Please enter a carousel image URL.";
    } else {
        $carousel_img = trim($_POST["carousel_img"]);
    }

    // Validate logo image URL
    if (empty(trim($_POST["logo_img"]))) {
        $logo_img_err = "Please enter a logo image URL.";
    } else {
        $logo_img = trim($_POST["logo_img"]);
    }

    // Check input errors before inserting into database
    if (empty($name_err) && empty($description_err) && empty($price_err) && empty($image_url_err) && empty($carousel_img_err) && empty($logo_img_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO products (name, description, price, image_url, carousel_img, logo_img) VALUES (?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssss", $param_name, $param_description, $param_price, $param_image_url, $param_carousel_img, $param_logo_img);

            // Set parameters
            $param_name = $name;
            $param_description = $description;
            $param_price = $price;
            $param_image_url = $image_url;
            $param_carousel_img = $carousel_img;
            $param_logo_img = $logo_img;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to product page
                header("location: add_product.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .error-message {
            color: red;
            font-size: 14px;
        }

        .preview-image {
            display: block;
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Add Product</h2>
        <form action="add_product.php" method="post">
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
                <?php echo (!empty($name_err)) ? '<span class="error-message">' . $name_err . '</span>' : ''; ?>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                <?php echo (!empty($description_err)) ? '<span class="error-message">' . $description_err . '</span>' : ''; ?>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                <?php echo (!empty($price_err)) ? '<span class="error-message">' . $price_err . '</span>' : ''; ?>
            </div>
            <div class="form-group">
                <label for="image_url">Image URL:</label>
                <input type="text" class="form-control" id="image_url" name="image_url" required>
                <?php echo (!empty($image_url_err)) ? '<span class="error-message">' . $image_url_err . '</span>' : ''; ?>
            </div>
            <div class="form-group">
                <label for="character_image_url">Character Image URL:</label>
                <input type="text" class="form-control" id="character_image_url" name="character_image_url">
                <?php echo (!empty($character_image_url_err)) ? '<span class="error-message">' . $character_image_url_err . '</span>' : ''; ?>
            </div>
            <?php if (!empty($character_image_url)) : ?>
            <img src="<?php echo $character_image_url; ?>" class="preview-image" alt="Character Image Preview">
            <?php endif; ?>
            <div class="form-group">
    <label for="carousel_img">Carousel Image URL:</label>
    <input type="text" class="form-control" id="carousel_img" name="carousel_img">
    <?php echo (!empty($carousel_img_err)) ? '<span class="error-message">' . $carousel_img_err . '</span>' : ''; ?>
</div>

<div class="form-group">
    <label for="logo_img">Logo Image URL:</label>
    <input type="text" class="form-control" id="logo_img" name="logo_img">
    <?php echo (!empty($logo_img_err)) ? '<span class="error-message">' . $logo_img_err . '</span>' : ''; ?>
</div>
            <button type="submit" class="btn btn-primary btn-block mt-3">Add Product</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
