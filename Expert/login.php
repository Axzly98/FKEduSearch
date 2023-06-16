<?php
session_start();
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

// Get the entered username and password from the form
$enteredUsername = $_REQUEST["userName"];
$enteredPassword = $_REQUEST["password"];
$chosenRole = $_REQUEST["role"];

// SQL query to check if the entered username and password match with the data in the login and admin tables
$query = "
    SELECT 
        login.login_ID, 
        login.login_userName, 
        admin.admin_ID, 
        admin.admin_userName, 
        admin.admin_password,
        expert.expert_ID,
        expert.expert_userName,
        expert.expert_password,
        user.user_ID,
        user.user_userName,
        user.user_password
    FROM login
    LEFT JOIN admin ON login.admin_ID = admin.admin_ID
    LEFT JOIN expert ON login.expert_ID = expert.expert_ID
    LEFT JOIN user ON login.user_ID = user.user_ID
    WHERE login.login_userName = '$enteredUsername' 
        AND (
            admin.admin_password = '$enteredPassword' 
            OR expert.expert_password = '$enteredPassword' 
            OR user.user_password = '$enteredPassword'
        );
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
	$adminID = $row["admin_ID"];
	$expertID = $row["expert_ID"];
	$userID = $row["user_ID"];
	$adminUsername = $row["admin_userName"];
	$expertUsername = $row["expert_userName"];
	$userUsername = $row["user_userName"];

	// Store the user's login ID and admin ID in session variables for further use
	
	$_SESSION["loginID"] = $loginID;
	$_SESSION["adminID"] = $adminID;
	$_SESSION["expertID"] = $expertID;
	$_SESSION["userID"] = $userID;
	
	// Redirect to the next page based on the chosen role
if ($chosenRole == "Admin") {
    $alert_message = "Admin Successful Login!";
    echo "<script>alert('$alert_message');</script>";
    echo "<script>setTimeout(function() { window.location.href = 'indexAdmin.php'; }, 250);</script>";
    exit();
	} elseif ($chosenRole == "Expert") {
	$alert_message = "Expert Successful Login!";
    echo "<script>alert('$alert_message');</script>";
    echo "<script>setTimeout(function() { window.location.href = 'expertHome.php'; }, 250);</script>";
    exit();
	} elseif ($chosenRole == "User") {
		// Redirect to the user 
		$alert_message = "User Successful Login!";
    echo "<script>alert('$alert_message');</script>";
    echo "<script>setTimeout(function() { window.location.href = 'userHomeAmin.php'; }, 250);</script>";
		header("Location: userHomeAmin.php");
		exit();
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

