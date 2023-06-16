<?php
	include'headerAdminUpper.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="styleSheets/style.css">
	<link rel="stylesheet" type="text/css" href="styleSheets/styleHeadFoot.css">
</head>
<body>
	<form action="login.php" method="post" align="center">
		<h1>Welcome To FK-Edu Search</h1>
		<h2>Login</h2>
		
		<label>Username :</label>
		<input type="text" name="userName" placeholder="Enter Username"><br><br>
		<label>Password :</label>
		<input type="password" name="password" placeholder="Enter Password"><br><br>
		
		<select name="role">
			<option value="">Role</option>
			<option value="Admin">Admin</option>
			<option value="Expert">Expert</option>
			<option value="User">User</option>
		</select><br><br>
		
		<label>
			<input type="checkbox" name="remember" value="1"> Remember My Password
		</label><br><br>
		
		<p><a href="#">Forgot username or password?</a></p>
		<button type="submit">Login</button>
	</form>
</body>
</html>
<?php
	include'footerAdmin.php';
?>