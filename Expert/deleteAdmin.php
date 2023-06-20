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

// Delete the expert/user record from the database
$query = "DELETE FROM $table WHERE ";
if ($table === "expert") {
    $query .= "expert_ID = $id";
} elseif ($table === "user") {
    $query .= "user_ID = $id";
}

$result = mysqli_query($link, $query);

// Check if the record was successfully deleted
if ($result) {
    // Redirect or display a success message
    header("Location: index.php?success=Record deleted successfully");
    exit();
} else {
    // Redirect or display an error message
    header("Location: index.php?error=Failed to delete record");
    exit();
}

mysqli_close($link);

include 'footerAdmin.php';
?>
