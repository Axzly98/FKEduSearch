<?php
//_SERVER REQUEST METHOD...LEBIH KURANG MACAM ISSET....UNTUK CHECKED SUBMITTED FORM
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['uname'];
    $fullName = $_POST['fname'];
    $role = $_POST['role'];
    $email = $_POST['email'];
	$password = $_POST['password'];

    // Perform necessary validations and checks here

    $link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
    mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

    // Insert dalam tables masing2 based on the selected role
    switch ($role) {
        case 'Admin':
            $adminQuery = "INSERT INTO admin (admin_userName, admin_password, admin_email) 
                           VALUES ('$username', '$password', '$email')";
            mysqli_query($link, $adminQuery);
            $adminId = mysqli_insert_id($link);
			// insert jugak dalam login table...sebab nak synchronize kan username dengan password mase login nanti
            $loginQuery = "INSERT INTO login ('admin_ID', login_userName, login_password,)
                           VALUES ('$adminId', '$username', '$password')";
            mysqli_query($link, $loginQuery);
            break;

        case 'Expert':
           $expertQuery = "INSERT INTO expert (expert_userName, expert_password, expert_email, expert_fullName) 
                            VALUES ('$username', '$password', '$email', '$fullName')";

            mysqli_query($link, $expertQuery);
            $expertId = mysqli_insert_id($link);

            $loginQuery = "INSERT INTO login (expert_ID,, login_userName, login_password)
                           VALUES ('$expertId', '$username', '$password')";
            mysqli_query($link, $loginQuery);
            break;

        case 'User':
            $userQuery = "INSERT INTO user (user_userName, user_password, user_email, user_fullName) 
                          VALUES ('$username', '$password', '$email','$fullName')";
            mysqli_query($link, $userQuery);
            $userId = mysqli_insert_id($link);

            $loginQuery = "INSERT INTO login (user_ID, login_userName, login_password)
                           VALUES ('$userId', '$username', '$password')";
            mysqli_query($link, $loginQuery);
            break;

        default:
            // Handle the case when no role is selected
            break;
    }

    // Close the database connection
    mysqli_close($link);

    $alert_message = "Done Registration New Account !!!";	
		echo "<script>alert('$alert_message');</script>";
		 echo "<script type = 'text/javascript'> window.location='indexAdmin.php' </script>";
}
?>
