<?php
$servername = "localhost";
$username = "root"; // change to your database username
$password =""; // change to your database password
$dbname = "shop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
