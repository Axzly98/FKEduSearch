<?php
session_start();
include 'headerAdmin.php';

// Check if the expert_id or user_id parameter is present in the URL
if (isset($_GET['expert_id'])) {
    $id = $_GET['expert_id'];
    $table = "expert";
} elseif (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];
    $table = "user";
} else {
    // Redirect or display an error message
    header("Location: index.php?error=Invalid ID");
    exit();
}

// Establish a database connection (replace the placeholder values with your actual credentials)
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

// Retrieve the expert/user record from the database
$query = "SELECT * FROM $table WHERE ";
if ($table === "expert") {
    $query .= "expert_ID = $id";
} elseif ($table === "user") {
    $query .= "user_ID = $id";
}

$result = mysqli_query($link, $query);

// Check if the record exists
if (mysqli_num_rows($result) === 0) {
    // Redirect or display an error message
    header("Location: index.php?error=Record not found");
    exit();
}

// Process the record here (e.g., display a form for updating the data)

mysqli_close($link);

include 'footerAdmin.php';
?>
