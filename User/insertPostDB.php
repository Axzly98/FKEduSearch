
<?php

// servername => localhost
// username => root
// password => empty
// database name => foody
//$conn = mysqli_connect("localhost", "root", "", "miniproject");


$link = mysqli_connect("localhost", "root") or die(mysqli_connect_error());
mysqli_select_db($link, "miniproject") or die(mysqli_error());

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

// Taking all 5 values from the form data(input)

$title =  $_REQUEST['title'];
$post = $_REQUEST['post'];
$category = $_REQUEST['category'];

// Performing insert query execution
// here our table name is addPost
$query = "INSERT INTO post VALUES('', '', '', '$title', '$post', '', '', '', '', '')"
  or die(mysqli_connect_error());
//$query = "INSERT INTO addpost VALUES('', '$category', '$title', '$post')"
//   or die(mysqli_connect_error());

  $result = mysqli_query($link, $query);


//if ($conn->query($sql) === TRUE) {

    // if ($usertype == "General User") {
    //     $sql2 = "INSERT INTO `userlist`(`userLoginID`,`contactNo`,`userAddress`,`guType`) VALUES ('$last_id',
    //         'null','null','null')";

    //     if ($conn->query($sql2) === TRUE) {
    //         echo "<script>alert('Record added');window.location.href='../../views/user/user_ui.php?userLoginID=" . $last_id . "';</script>";
    //         die();
    //     } else {
    //         echo "Error: " . $sql2 . "<br>" . $conn->error;
    //         die();
    //     }; 
    // } Paan kata tk penting utk aku
      if($result) {
        $alert_message = "Post has been submitted!";
        echo "<script>alert('$alert_message');</script>";
        echo "<script type='text/javascript'>window.location='addPostUI.php'</script>";
      } else {
        $alert_message = "Post not submitted!";
        echo "<script>alert('$alert_message');</script>";
        echo "<script type='text/javascript'>window.location='addPostUI.php'</script>";
      }
  /*  die();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    die();
};
*/
// Close connection
mysqli_close($conn);
?>