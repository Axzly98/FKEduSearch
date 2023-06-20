<?php
	include 'headerAdmin.php';

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
</head>
<body align="center">
	<h2>Reactivate Account</h2>
	


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
	<td align="center"><a><button class="button-48" type="button" onclick="window.location.href='/FKEduSearch/Complaint/Admin/add.php';">Reason</button></a> 
	<a><button class="button-48" type="button" onclick="window.location.href='/FKEduSearch/Complaint/Admin/add.php';">Reject</button></a>
	<a><button class="button-48" type="button" onclick="window.location.href='/FKEduSearch/Complaint/Admin/add.php';">Approve</button></a></td>
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
	<td align="center"><a><button class="button-48" type="button" onclick="window.location.href='/FKEduSearch/Complaint/Admin/add.php';">Reason</button></a>
	<a><button class="button-48" type="button" onclick="window.location.href='/FKEduSearch/Complaint/Admin/add.php';">Reject</button></a>
	<a><button class="button-48" type="button" onclick="window.location.href='/FKEduSearch/Complaint/Admin/add.php';">Approve</button></a></td>
	</tr>
<?php
    }
} else {
    echo "0 results";

}
?>
</table>
</body>
</html>

<?php
	include 'footerAdmin.php';
?>
