<?php
//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

$complainid = $_POST["complain"];
$iduser = $_POST["id"];
$type = $_POST["complainttype"];
$desc = $_POST["description"];

$query = "UPDATE complaint SET user_ID = '$iduser', complaint_Type = '$type', complaint_Desc = '$desc' WHERE complaint_ID = '$complainid'";

$result = mysqli_query($link,$query) or die ("Could not execute query in update.php");
if($result){
	echo "<script type = 'text/javascript'> window.location='ComplaintInterface.php' </script>";
}
?>