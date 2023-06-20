<?php
session_start();
include 'headerAdmin.php';

// Check if the expert_id or user_id parameter is present in the URL
if (isset($_GET['expert_ID'])) {
    $id = $_GET['expert_ID'];
    $table = "expert";
} elseif (isset($_GET['user_ID'])) {
    $id = $_GET['user_ID'];
    $table = "user";
} else {
    // Redirect or display an error message
    header("Location: index.php?error=Invalid ID");
    exit();
}

// Establish a database connection (replace the placeholder values with your actual credentials)
$link = mysqli_connect("localhost", "root", "", "miniproject") or die(mysqli_connect_error());

// Prepare the SQL statement with parameterized queries
$query = "";
if ($table === "expert") {
    $query = "SELECT * FROM expert WHERE expert_ID = ?";
} elseif ($table === "user") {
    $query = "SELECT * FROM user WHERE user_ID = ?";
}

// Prepare the statement
$stmt = mysqli_prepare($link, $query);

// Bind the parameter
mysqli_stmt_bind_param($stmt, "i", $id);

// Execute the statement
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

// Check if the record exists
if (mysqli_num_rows($result) === 0) {
    // Redirect or display an error message
    header("Location: index.php?error=Record not found");
    exit();
}

// Process the record here (e.g., display a form for updating the data)

mysqli_stmt_close($stmt);
mysqli_close($link);

include 'footerAdmin.php';
?>
