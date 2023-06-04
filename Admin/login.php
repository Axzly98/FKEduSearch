<?php>
	session_start();
	include "db_conn.php";
	
	if (isset($_POST['uname']) && isset($_POST['password'])){
		
		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return data;
		}
	}
	
	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	
	if(empty($uname)){
		header("Location: index.php?error=username is required");
		exit();
	}
	else if(empty($uname)){
		header("Location: index.php?error=Password is required");
		exit();	
	}
	
	$sql = "SELECT * FROM users WHERE user_name='$uname' AND padssword='$pass'";
	
	$result = mysqli_query($conn, $sql);
	
	if(mysql_num_row($result) === 1){
		$row = mysql_fetch_assoc($result);
		if($row['username']) === $uname && $row['password'] === $pass){
			echo "Logged In!";
			$SESSION['user_name'] = $row['user_name'];
			$SESSION['name'] = $row['name'];
			$SESSION['id'] = $row['id'];
			header("Location: home.php");
			exit();
		}
		else{
			header("Location: index.php?error=Incorrect Username or Password");
			exit();
		}
	}
	else{
		header("location: index.php");
		exit();
	}
<?php?>