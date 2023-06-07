<?php
$host = 'localhost';      // Hostname of the MySQL server
$username = 'root';   // MySQL username
$password = '';   // MySQL password
$database = 'miniproject';   // Database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

echo 'Connected successfully!';

// Close the connection
$conn->close();
?>