<?php

$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

// Get the entered username and password from the form
$enteredUsername = $_REQUEST["userName"];
$enteredPassword = $_REQUEST["password"];
$chosenRole = $_REQUEST["role"];

// SQL query to check if the entered username and password match with the data in the login and admin tables
$query = "
	SELECT login.login_ID, login.login_userName, admin.admin_ID, admin.admin_userName, admin.admin_password
	FROM login
	INNER JOIN admin ON login.admin_id = admin.admin_id
	WHERE login.login_userName = '$enteredUsername' AND admin.admin_password = '$enteredPassword';
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
	$adminUsername = $row["admin_userName"];

	// Store the user's login ID and admin ID in session variables for further use
	session_start();
	$_SESSION["loginID"] = $loginID;
	$_SESSION["adminID"] = $adminID;
	
	// Redirect to the next page based on the chosen role
	if ($chosenRole == "Admin") {
		$alert_message = "Admin Successful Login!";
	echo "<script>alert('$alert_message');</script>";
		// Redirect to the admin page
		header("Location: indexAdmin.php");
		exit();
	} elseif ($chosenRole == "Expert") {
		// Redirect to the expert page
		header("Location: expert_page.php");
		exit();
	} elseif ($chosenRole == "User") {
		// Redirect to the user page
		header("Location: user_page.php");
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

?>


while ($row = mysqli_fetch_assoc($result)) {

    // Check if entered username and password match with the database values
    if ($enteredUsername == $user_name && $enteredPassword == $password) {
        $loginSuccessful = true;
        break;
    }
}


// Check if the login was successful
if ($loginSuccessful) {
    // If correct, start the session and set the "Login" session variable to "YES"
    session_start();
    $_SESSION["Login"] = "YES";
	$alert_message = "Successful Login!";
	echo "<script>alert('$alert_message');</script>";
    echo "<p>Welcome " . $name . ".</p> Click here to <a href='logout.php'> Logout </a>";
	
	  // Check if the logout is clicked
    if (isset($_REQUEST["logout"])) {
        // Destroy the session
        session_destroy();
     
    }
	
} else {
    // If not correct, set the "Login" session variable to "NO"
    session_start();
    $_SESSION["Login"] = "NO";
	
    echo "<h2 align='center'>No User Data in Database.</h2>";
    echo "<h3 align='center'><a href='lab10_q1.php'>Login Page</a></h3>";
}

/*
// Check if username and password are correct
if ($enteredUsername == $user_name && $enteredPassword == $password) {
// If correct, we set the session to YES
 session_start();
 $_SESSION["Login"] = "YES";
 echo "<p>Welcome " . $name  . ".</p> Click here to <a href='lab10_q1.php'> Logout</a>" ;
}
else {
	
// If not correct, we set the session to NO
 session_start();
 $_SESSION["Login"] = "NO";
 echo "<h3>You are NOT logged correctly in </h3>";
 echo "<p><a href='lab10_q1.php'>Login Page</a></p>";
}
*/


?>
