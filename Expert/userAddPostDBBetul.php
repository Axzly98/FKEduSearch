<?php
session_start();
$page = 'add post';
?>
<html> 
<body>
 
 <?php 
$link = mysqli_connect("localhost", "root") or die(mysqli_connect_error($link));
mysqli_select_db($link, "miniproject") or die(mysqli_error($link)); //'link' tu main letak sebab kalau tkde, error

$user_ID = $_REQUEST['userID'];

  // Get the current date and time
	$post_createdDate = date('Y-m-d');

$post_categories = $_REQUEST["category"];
$postTitle = $_REQUEST["postTitle"];
$postQuestion = $_REQUEST["postQuestion"];



// insert into maksudnya masukkan data dalam db

$query = "INSERT INTO post (user_ID, post_title, post_content, post_createdDate, post_categories) 
          VALUES ('$user_ID', '$postTitle', '$postQuestion', '$post_createdDate', '$post_categories')";

$result = mysqli_query($link, $query);

if($result) {
  $alert_message = "Post Has Been Submitted!";
  echo "<script>alert('$alert_message');</script>";
  echo "<script type='text/javascript'>window.location='addPostUIAminBetul.php'</script>";
} else {
  $alert_message = "Post Not Submitted!";
  echo "<script>alert('$alert_message');</script>";
  echo "<script type='text/javascript'>window.location='addPostUIAminBetul.php'</script>";
}

// Close the database connection
mysqli_close($link);
?>

  </body>
  </html>
