<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="login.php" method="post">
		<h1>Welcome To FK-Edu Search</h1>
		<h5>Login</h5>
		<?php if(isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p> 
		<?php } ?>
		
		<label>Username</label>
		<input type="text" name="uname" placeholder="Username"><br><br>
		<label>Password</label>
		<input type="password" name="password" placeholder="Password"><br><br>
		
		<select name="role">
			<option value="">Role</option>
			<option value="admin">Admin</option>
			<option value="expert">Expert</option>
			<option value="student">Student</option>
		</select><br><br>
		
		<label>
			<input type="checkbox" name="remember" value="1"> Remember my password
		</label><br><br>
		
		<p><a href="#">Forgot username or password?</a></p>
		<button type="submit">Login</button>
	</form>
	<div class=footer>
		<table>
			<td><a href="#">UMP.Official<a></td>
			<td><a href="#">Kalam</a></td>
			<td><a href="#">E-Comm</a></td>
		</table>
		
	</div>
</body>
</html>
