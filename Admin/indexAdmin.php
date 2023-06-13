<?php
	include'headerAdminUpper.php';
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
		<input type="text" name="fname" placeholder="Fullname"><br><br>
		
		<p><a href="#">Log in here</a></p>
		<button type="submit">Add Registration</button><br><br>
	</form>
	<table border='1' align="center">
		<tr>
			<td>No.</td>
			<td>Username</td>
			<td>Fullname</td>
			<td>Role</td>
			<td>Email</td>
			<td colspan='2'><button>Update</button></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
</body>
</html>
<?php
	include'footerAdmin.php';
?>