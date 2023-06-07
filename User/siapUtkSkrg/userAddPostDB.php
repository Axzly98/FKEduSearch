<html> 


<?php

$page = 'add post';

?>

<body>
 
 <?php 
$link = mysqli_connect("localhost", "root") or die(mysqli_connect_error());
mysqli_select_db($link, "miniproject") or die(mysqli_error());

  // Get the current date and time
	$publicationCreatedDate = date('Y-m-d');

$postTitle = $_REQUEST["postTitle"];
$postQuestion = $_REQUEST["postQuestion"];

$query = "INSERT INTO post VALUES('', '', '', '$postTitle', '$postQuestion', '$publicationCreatedDate', '', '', '', '')"
  or die(mysqli_connect_error());

$result = mysqli_query($link, $query);

if($result) {
  $alert_message = "Post has been submitted!";
  echo "<script>alert('$alert_message');</script>";
  echo "<script type='text/javascript'>window.location='addPost.php'</script>";
} else {
  $alert_message = "Post not submitted!";
  echo "<script>alert('$alert_message');</script>";
  echo "<script type='text/javascript'>window.location='addPost.php'</script>";
}

// Close the database connection
mysqli_close($link);
?>

  </body>
  </html>
