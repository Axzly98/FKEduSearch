<?php
	include 'headerAdmin.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body align="center">
	<form action="admin.php" method="post">
		<h2>Registered New User</h2>
		
		<?php if(isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		
		<label>Username</label>
		<input type="text" name="uname" placeholder="Username"><br><br>
		<label>Full Name</label>
		<input type="text" name="fname" placeholder="Fullname"><br><br>
		
		<select name="role">
			<option value="">Role</option>
			<option value="admin">Admin</option>
			<option value="expert">Expert</option>
			<option value="student">Student</option>
		</select><br><br>
		
		<label>Email</label>
		<input type="text" name="email" placeholder="Email"><br><br>
		
		<p><a href="#">Log in here</a></p>
		<button type="submit" name="addRegistration">Add Registration</button><br><br>
	</form>

	<table border='1' align="center">
		<tr>
			<td>No.</td>
			<td>Username</td>
			<td>Fullname</td>
			<td>Role</td>
			<td>Email</td>
			<td colspan='2'>Actions</td>
		</tr>

		<?php
		// Connect to your database
		$dbhost = "localhost";  // Replace with your database host
		$dbuser = "username";   // Replace with your database user
		$dbpass = "password";   // Replace with your database password
		$dbname = "database";   // Replace with your database name
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		// Check if the addRegistration form is submitted
		if (isset($_POST['addRegistration'])) {
			// Get form data
			$username = $_POST['uname'];
			$fullname = $_POST['fname'];
			$role = $_POST['role'];
			$email = $_POST['email'];

			// Validate form data (you can add your own validation checks here)

			// Insert the new registration into the database
			$sql = "INSERT INTO registrations (username, fullname, role, email) VALUES ('$username', '$fullname', '$role', '$email')";
			if (mysqli_query($conn, $sql)) {
				// Redirect back to admin.php with success message
				header("Location: admin.php?success=Registration added successfully");
				exit;
			} else {
				// Redirect back to admin.php with error message
				header("Location: admin.php?error=Error adding registration: " . mysqli_error($conn));
				exit;
			}
		}

		// Fetch and display existing registrations from the database
		$sql = "SELECT * FROM registrations";
		$result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
			// Loop through each row of data
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . $row['username'] . "</td>";
				echo "<td>" . $row['fullname'] . "</td>";
				echo "<td>" . $row['role'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td><a href='view.php?id=" . $row['id'] . "'>View</a></td>";
				echo "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
				echo "</tr>";
			}
		} else {
			echo "<tr><td colspan='7'>No registrations found.</td></tr>";
		}

		mysqli_close($conn);
		?>
	</table>
</body>
</html>

<?php
	include 'footerAdmin.php';
?>

