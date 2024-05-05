<?php
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the email already exists
    $checkQuery = "SELECT * FROM user_details WHERE userGmail = '$email'";
    $results = $conn->query($checkQuery);
    if ($results && $results->num_rows > 0) {
        echo "<script>alert('This Gmail address is already registered!')</script>";
        echo "<script>window.location.href='insert.php'</script>";
    } else {
        // If the email doesn't exist, proceed with insertion
        $sql = "INSERT INTO user_details (userName, userGmail, userPassword)
                VALUES('$username', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registered Successfully')</script>";
            echo "<script>window.location.href='Home.html'</script>";
        } else {
            echo "Error : " . $sql . "<br>" . $conn->error;
        }
    }
}
$conn->close();
?>
