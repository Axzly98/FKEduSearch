<?php
	include'headerAdmin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body align="center">
	<form action="admin.php" method="post">
		<h2>Registerd New User</h2>
		
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
		
		<p><a href="/FKEduSearch/Admin/index.php">Log in here</a></p>
		<button type="submit">Add Registration</button><br><br>
	</form>
	<table border='1' align="center">
	<?php
		// Fetch registered users from the database
		$sql = "SELECT * FROM users";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
   		 $counter = 1;
   		 while ($row = $result->fetch_assoc()) {
       		 echo "<tr>";
        	 echo "<td>" . $counter . "</td>";
       		 echo "<td>" . $row["username"] . "</td>";
       		 echo "<td>" . $row["fullname"] . "</td>";
       		 echo "<td>" . $row["role"] . "</td>";
       		 echo "<td>" . $row["email"] . "</td>";
       		 echo "<td colspan='2'><button>Update</button></td>";
       		 echo "</tr>";
        $counter++;
    }
	}
?>
	</table>
</body>
</html>
<?php
	include'footerAdmin.php';
?>