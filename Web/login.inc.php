<?php
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["userGmail"];
    $password = $_POST["userPassword"];

    $sql = "SELECT * FROM user_details WHERE userGmail = '$email'
    AND userPassword = '$password'";
 
    $results = $conn->query($sql); // Using mysqli extension
    if ($results && $results->num_rows == 1) {
        echo "<script>alert('User login successful')</script>";
        echo "<script>window.location.href='Home.html'</script>";
    } else {
        echo "<script>alert('Invalid')</script>";
        echo "<script>window.location.href='login.php'</script>";
    }

    $conn->close();
}
?>
