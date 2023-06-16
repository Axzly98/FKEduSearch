<?php
session_start();
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

// Get the entered username and password from the form
$enteredUsername = $_REQUEST["userName"];
$enteredPassword = $_REQUEST["password"];
$chosenRole = $_REQUEST["role"];


// Define the table name based on the chosen role
$tableName = "";
if ($chosenRole == "Admin") {
    $tableName = "admin";
} elseif ($chosenRole == "Expert") {
    $tableName = "expert";
} elseif ($chosenRole == "User") {
    $tableName = "user";
}



// SQL query to check if the entered username and password match with the data in the login table and the specific role table
$query = "
    SELECT 
        login.login_ID, 
        login.login_userName,
        $tableName.${tableName}_ID,
        $tableName.${tableName}_userName,
        $tableName.${tableName}_password
    FROM login
    INNER JOIN $tableName ON login.${tableName}_ID = $tableName.${tableName}_ID
    WHERE login.login_userName = '$enteredUsername' 
        AND $tableName.${tableName}_password = '$enteredPassword';
";

// Execute the query
$result = mysqli_query($link, $query) or die(mysqli_error($link));

// Check if the query returned any rows
if (mysqli_num_rows($result) > 0) {
	// Authentication successful
	$loginSuccessful = true;

	// Get the logged-in user's details
    $row = mysqli_fetch_assoc($result);
    $loginID = $row["login_ID"];
    $roleID = $row["${tableName}_ID"];
    $roleUsername = $row["${tableName}_userName"];
	$adminID = $row["admin_ID"];
	$expertID = $row["expert_ID"];
	$userID = $row["user_ID"];
	$adminUsername = $row["admin_userName"];
	$expertUsername = $row["expert_userName"];
	$userUsername = $row["user_userName"];

// Store the user's login ID and role ID in session variables for further use
    $_SESSION["loginID"] = $loginID;
    $_SESSION["roleID"] = $roleID;

    // Redirect to the next page based on the chosen role
    if ($chosenRole == "Admin") {
        $_SESSION["adminID"] = $roleID;
        $_SESSION["adminUsername"] = $roleUsername;
		 $alert_message = "Admin Successful Login!";
		echo "<script>alert('$alert_message');</script>";
		echo "<script>setTimeout(function() { window.location.href = 'indexAdmin.php'; }, 250);</script>";
		exit();
        // Redirect to admin page
    } elseif ($chosenRole == "Expert") {
       // $_SESSION["expertID"] = $roleID;
	   $_SESSION['expertID'] = $row['expert_ID'];
        $_SESSION["expertUsername"] = $roleUsername;
		$alert_message = "Expert Successful Login!";
		echo "<script>alert('$alert_message');</script>";
		echo "<script>setTimeout(function() { window.location.href = 'expertHome.php'; }, 250);</script>";
		exit();
        // Redirect to expert page
    } elseif ($chosenRole == "User") {
        $_SESSION["userID"] = $roleID;
        $_SESSION["userUsername"] = $roleUsername;
		$alert_message = "User Successful Login!";
		echo "<script>alert('$alert_message');</script>";
		echo "<script>setTimeout(function() { window.location.href = 'userHomeAmin.php'; }, 250);</script>";
		header("Location: userHomeAmin.php");
		exit();
        // Redirect to user page
    }
} else {
	// Authentication failed
	$loginSuccessful = false;
}

// If the login was unsuccessful, display an error message or perform any necessary actions
if (!$loginSuccessful) {
	echo "Invalid username or password. Please try again.";
}


mysqli_close($link);
?>

