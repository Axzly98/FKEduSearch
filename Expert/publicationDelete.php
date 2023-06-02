<?php
if (isset($_REQUEST['id'])) {
    $idDelete = $_REQUEST['id'];
    
   $link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());


	mysqli_select_db($link, "miniproject") or die(mysqli_error($link));
    
    // Retrieve the publication record
    $query = "SELECT * FROM publication WHERE publication_ID = $idDelete";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    
    // Delete the file
    $file_path = 'uploads/' . $row['publicationFile'];
    if (file_exists($file_path)) {
        unlink($file_path);
    }
    
    // Delete the record from the database
    $delete_query = "DELETE FROM publication WHERE publication_ID = $idDelete";
    mysqli_query($link, $delete_query);
    
    // Close the database connection
    mysqli_close($link);
  	$alert_message = "Data Has Been Deleted !!!";	
	echo "<script>alert('$alert_message');</script>";
	echo "<script type = 'text/javascript'> window.location='expertPublication.php' </script>";
    exit;
} else {
    // ID not provided
    echo 'Invalid request !!!';
}
?>
