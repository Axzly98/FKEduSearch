<?php
// Database configuration
$servername = "localhost";
$username = "FKEduSearch";
$password = "";
$dbname = "miniproject";

// Create a connection
$conn = new mysqli($servername, $username, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["uname"];
    $fullname = $_POST["fname"];
    $role = $_POST["role"];
    $email = $_POST["email"];

    // Perform validation (you can add more specific validation as per your requirements)

    // Insert the new registration into the database
    $sql = "INSERT INTO users (username, fullname, role, email) VALUES ('$username', '$fullname', '$role', '$email')";
    if ($conn->query($sql) === TRUE) {
        // Registration added successfully
        header("Location: admin.php"); // Redirect to the admin page to refresh the table
        exit();
    } else {
        // Error in adding registration
        $error = "Error: " . $sql . "<br>" . $conn->error;
        header("Location: admin.php?error=" . urlencode($error)); // Redirect to the admin page with an error message
        exit();
    }
}
?>

include 'footerAdmin.php

