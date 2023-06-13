<?php
//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

$complainid = $_GET["id"];
$adminid = $_POST["idadmin"];
$desc = $_POST["description"];
	
//link to query
$sql = "INSERT INTO complaint_reply (admin_ID,complaint_ID, CR_reply) VALUES ('$adminid','$complainid','$desc')";

$result = mysqli_query($link,$sql) or die ("Could not add a query");
if($result){
	echo "<script type = 'text/javascript'> window.location='ComplaintListInterface.php' </script>";
}
?>