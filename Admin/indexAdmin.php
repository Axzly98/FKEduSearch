<?php
	include'headerAdmin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<<<<<<< HEAD
<body>
	<div>
		<h5>Universiti Malaysia Pahang</h5>
	</div>
	<div>
		<table>
			<tr>
				<td><a href="ReactivateAcc.php">Reactivate Acc</a></td>
				<td><a href="#">Complaint</td>
			</tr>
			<tr>
				<td><a href="#">Manage Acc</td>
				<td><a href="#">Logout</td>
			</tr>
		</table>
	</div>
	
=======
<body align="center">
>>>>>>> 1061d955996b013e2f047a538db09f669cd74f45
	<form action="admin.php" method="post">
		<h2>Registered New User</h2>
		
		<?php if(isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p> 
		<?php } ?>
		
		<label>Username :</label>
		<input type="text" name="uname" placeholder="Username"><br><br>
		<label>Full Name: </label>
		<input type="text" name="fname" placeholder="Fullname"><br><br>
		
		<label>Select Role :</label>
		<select name="role">
			<option value="">Role</option>
			<option value="Admin">Admin</option>
			<option value="Expert">Expert</option>
			<option value="User">User</option>
		</select><br><br>
		
		<label>Email :</label>
		<input type="text" name="email" placeholder="Email"><br><br>
		
		<label>Password :</label>
		<input type="text" name="password" placeholder="Password"><br><br>
		
		<p><a href="index.php">Log in here</a></p>
		<button type="submit">Add Registration</button><br><br>
	</form>
	<table border='1' align="center">
	<?php /*
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
	}	*/
?>
	</table>
</body>
</html>



<?php
	include'footerAdmin.php';
?>