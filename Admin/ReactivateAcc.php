<?php
	include 'headerAdmin.php';

	// Establish a database connection (replace the placeholder values with your actual credentials)
	$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
    mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

	// Fetch data from the admin, user, and expert tables
	$query = "SELECT * FROM admin UNION SELECT * FROM user UNION SELECT * FROM expert";
	$result = mysqli_query($link, $query);

	// Check if there are any rows returned
	if (mysqli_num_rows($result) > 0) {
		$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
	} else {
		$users = [];
	}

	// Close the database connection
	mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body align="center">
	<h2>Registered New Users</h2>
	
	<table border='1' align="center">
		<tr>
			<td>No.</td>
			<td>Username</td>
			<td>ID</td>
			<td>Reason</td>
			<td>Acc Status</td>
			<td colspan='2'>Reactivate Approval</td>
		</tr>
		
		<?php foreach ($users as $index => $user): ?>
			<tr>
				<td><?php echo $index + 1; ?></td>
				<td><?php echo $user['username']; ?></td>
				<td><?php echo $user['id']; ?></td>
				<td><?php echo $user['reason']; ?></td>
				<td><?php echo $user['acc_status']; ?></td>
				<td colspan='2'>Reactivate Approval</td>
			</tr>
		<?php endforeach; ?>
		
	</table>
</body>
</html>

<?php
	include 'footerAdmin.php';
?>
