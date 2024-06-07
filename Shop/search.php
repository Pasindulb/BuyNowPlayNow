<?php
include 'config.php';

// Check if the search query is provided
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search_query'])) {
    // Sanitize the search query to prevent SQL injection
    $search_query = mysqli_real_escape_string($conn, $_GET['search_query']);

    // Perform the search query
    $sql = "SELECT * FROM products WHERE name LIKE '%$search_query%'";
    $result = $conn->query($sql);

    // Prepare the search results
    $search_results = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $search_results[] = $row;
        }
    }

    // Return the search results as JSON
    header('Content-Type: application/json');
    echo json_encode($search_results);
} else {
    // If no search query is provided, return an empty response
    echo json_encode(array());
}

// Close the database connection
$conn->close();
?>
