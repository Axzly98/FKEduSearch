<?php
//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

    $iduser = $_POST["id"];
	$idadmin = $_POST["idadmin"];
	$idexpert = $_POST["idexpert"];
	$type = $_POST["complainttype"];
	$desc = $_POST["description"];
	$statusid = $_POST["complain"];
	
//link to query
$sql = "INSERT INTO complaint (user_ID, admin_ID,expert_ID, complaintStatus_ID, complaint_Type, complaint_Desc) VALUES ('$iduser','$idadmin','$idexpert','$statusid', '$type', '$desc')";


$result = mysqli_query($link,$sql) or die ("Could not add a query");

if($result){
	echo "<script type = 'text/javascript'> window.location='ComplaintInterface.php?id=$iduser' </script>";
}
?>