<?php
// Set CORS headers
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: GET, POST');
// header("Access-Control-Allow-Headers: X-Requested-With");

// Handle CORS preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit();
}
// Include your database connection logic or configuration file

// Assuming you have connected to your MySQL database using mysqli
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "virtualearncampus";

$mysqli = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Perform a SELECT query (replace 'your_table' and 'your_columns' with your actual table and columns)
$sql = "SELECT * FROM courses;";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // Fetch the data as an associative array
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Close the database connection
    $mysqli->close();

    // Set the appropriate headers for JSON response
    header('Content-Type: application/json');

    // Send the JSON-encoded data to the client
    echo json_encode($data);
} else {
    // No data found
    echo json_encode([]);
}

// Close the database connection
// $mysqli->close();
?>
