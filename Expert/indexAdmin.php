<?php
session_start();
	include'headerAdmin.php';

	// Establish a database connection (replace the placeholder values with your actual credentials)
	$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
	mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

	// Fetch data from the admin, user, and expert tables using inner joins
	$query = "SELECT expert_userName, expert_ID
		FROM expert";

$queryU = "SELECT user_userName, user_ID
		FROM user";

	$result = mysqli_query($link, $query);
	$resultU = mysqli_query($link, $queryU);

	// Close the database connection
	mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		.content {
			overflow-y: scroll;
			height: 1000px; /* Set the desired height for the scrollable area */
			width: 100%; /* Adjust the width as needed */
			margin: 0 auto; /* Center the content horizontally */
		}
	</style>
</head>
<body align="center">
	<div class="content">
	<form action="register.php" method="post">
		<h2>Registered New User</h2>
		
		<?php if(isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p> 
		<?php } ?>
		
		<label>Username :</label>
		<input type="text" name="uname" placeholder="Username"><br><br>
		<label>Full Name: </label>
		<input type="text" name="fname" placeholder="Fullname"><br><br>
		
	
		
		<label>Email :</label>
		<input type="text" name="email" placeholder="Email"><br><br>
		
		<label>Password :</label>
		<input type="text" name="password" placeholder="Password"><br><br>
		
			<label>Select Role :</label>
		<select name="role">
			<option value="">Role</option>
			<option value="Admin">Admin</option>
			<option value="Expert">Expert</option>
			<option value="User">User</option>
		</select><br><br>
		
		<p><a href="index.php">Log in here</a></p>
		<button type="submit">Add Registration</button><br><br>
		
		
		
	</form>
	<table border="1" class="table" style="width: 100%">
<tr class="thread">
  <th class="th" scope="col">No</th>
  <th class="th" scope="col">Expert Username</th>
  <th class="th" scope="col">Expert ID</th>
  <th class="th" scope="col">Reactivate Approval</th>
            </tr>
            <tr>
<?php  if (mysqli_num_rows($result) > 0){
    // output data of each row
    $no = 0;
    while($row = mysqli_fetch_assoc($result) ){
    $no = $no + 1;
    $expertname = $row["expert_userName"];
    $expertid = $row["expert_ID"];   
?>	
 <td class="td"><?php echo $no; ?></td>
    <td class="td"><?php echo $expertname; ?></td>
		<td class="td"><?php echo $expertid; ?></td>
	<td align="center"> 
	<a><button class="button-48" type="button" onclick="updateExpert(<?php echo $expertid; ?>)">Update</button></a>
	<a><button class="button-48" type="button" onclick="deleteExpert(<?php echo $expertid; ?>)">Delete</button></td>
	</tr>
<?php
    }
} else {
    echo "0 results";

}
?>
</table>

<br><br>

<table border="1" class="table" style="width: 100%">
<tr class="thread">
  <th class="th" scope="col">No</th>
  <th class="th" scope="col">User Username</th>
  <th class="th" scope="col">User ID</th>
  <th class="th" scope="col">Reactivate Approval</th>
            </tr>
            <tr>
<?php  if (mysqli_num_rows($resultU) > 0){
    // output data of each row
    $no = 0;
    while($rowU = mysqli_fetch_assoc($resultU) ){
    $no = $no + 1;
    $username = $rowU["user_userName"];
    $userid = $rowU["user_ID"];   
?>	
 <td class="td"><?php echo $no; ?></td>
    <td class="td"><?php echo $username; ?></td>
    <td class="td"><?php echo $userid; ?></td>
	<td align="center">
	<a><button class="button-48" type="button" onclick="updateUser(<?php echo $userid; ?>)">Update</button></a>
	<a><button class="button-48" type="button" onclick="deleteUser(<?php echo $userid; ?>)">Delete</button></a></td>
	</tr>
<?php
    }
} else {
    echo "0 results";

}
?>
</table>
</div>
<script>
	function updateExpert(expertID) {
		window.location.href = "/FKEduSearch/Complaint/Admin/update.php?expert_id=" + expertID;
	}

	function deleteExpert(expertID) {
		// Send an AJAX request to delete.php passing expertID as a parameter
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				// Process the response here if needed
				// For example, display a success message or refresh the table
			}
		};
		xhttp.open("GET", "/FKEduSearch/Complaint/Admin/delete.php?expert_id=" + expertID, true);
		xhttp.send();
	}

	function updateUser(userID) {
		window.location.href = "/FKEduSearch/Complaint/Admin/update.php?user_id=" + userID;
	}

	function deleteUser(userID) {
		// Send an AJAX request to delete.php passing userID as a parameter
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				// Process the response here if needed
				// For example, display a success message or refresh the table
			}
		};
		xhttp.open("GET", "/FKEduSearch/Complaint/Admin/delete.php?user_id=" + userID, true);
		xhttp.send();
	}
</script>
</body>
</html>



<?php
	include'footerAdmin.php';
?>