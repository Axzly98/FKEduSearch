<?php

	$name= "localhost";
	$uname= "root";
	$password= "";
	
	$db_name= "test_db";
	
	$conn = mysql_connetc($sname, $uname, $password, $db_name);
	
	if(!$conn){
		echo "Connection Failed";
	}
?>