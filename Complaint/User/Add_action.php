<?php
//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

    $iduser = $_POST["id"];
	$type = $_POST["complaint_type"];
	$desc = $_POST["description"];
	
//link to query
$sql = "INSERT INTO complaint SET user_ID = '$iduser', complaint_Type = '$type', complaint_Desc = '$desc'";

$result = mysqli_query($link,$sql) or die ("Could not add a query");
if($result){
	echo "<script type = 'text/javascript'> window.location='display.php' </script>";
}
?>