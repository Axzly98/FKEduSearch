<?php
session_start();
$page = 'page';

//Connect to the database server.
$link = mysqli_connect("localhost", "root") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "miniproject") or die(mysqli_error($link));
// Retrieve the expert ID from the session
$postAssignedID = $_POST['postAssignedID'];
//$complaintID = $_POST['complaintID'];
$expertID = $_POST['expertID'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the answer from the form
    $answer = $_POST['answer'];

    // Insert the answer into the post_answer table
    $insertQuery = "INSERT INTO post_answer (postAssigned_ID, expert_ID, post_answer)
                    VALUES ('$postAssignedID', '$expertID', '$answer')";
    mysqli_query($link, $insertQuery) or die(mysqli_error($link));

    // Update the post_assigned table to change the status to Completed
    $updateQuery = "UPDATE post_assigned SET postAssigned_status = 'Completed' WHERE postAssigned_ID = '$postAssignedID'";
    mysqli_query($link, $updateQuery) or die(mysqli_error($link));

					
		$alert_message = "Post Answer Has Been Submitted !!!";	
		echo "<script>alert('$alert_message');</script>";
		 echo "<script type = 'text/javascript'> window.location='expertPost.php' </script>";

    // Redirect to a success page or display a success message
  //  header("Location: expertPost.php");
    exit();
}

?>
