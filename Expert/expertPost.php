<?php
$page = 'post';
include 'headerExpert.php';
?>



   <div data-aos="fade" class="page-title">
          
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="expertHome.php">Home</a></li>
            <li>Post</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->
	
	<?php
	
	$link = mysqli_connect("localhost", "root") or die(mysqli_connect_error());
	mysqli_select_db($link, "miniproject") or die(mysqli_error());

	$queryView = "SELECT * FROM post" or die(mysqli_connect_error());
	$result = mysqli_query($link, $queryView);

	
	//post -> parent table
	//user -> untuk ambik information dari user (foreign_key) ,letak dlm statement post

	if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_assoc()) {
        // SQL statement to fetch the user's attributes based on the user_ID foreign key
        $query = "SELECT user_userName FROM user WHERE user_ID = $row[user_ID]";
        $userResult = mysqli_query($link, $query);

        if ($result && mysqli_num_rows($userResult) > 0) {
            $user = mysqli_fetch_assoc($userResult);
            $userName = $user['user_userName'];
        } else {
            $userName = 'Unknown userName'; // Default value if the user is not found
        }
        ?>


          <div class="col-lg-8">
	
              <div class="reply-form">

                <h4>Post Assigned</h4>
                <form action="" method="post">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <p> <?php echo "User Name: " . $userName; ?> </p> 
					  <p><?php echo " Post Category: " . "$row[post_categories]" ?> </p>
					  <p><?php echo " Post Date: " . date("j F Y", strtotime($row['post_createdDate'])) ?> </p>
					  <p><?php echo " Post Status: " . "$row[post_status]" ?> </p>
                    </div>
                    <div class="col-md-6 form-group">
                     <p><?php echo " Time Left to Reply: " . "$row[post_remainingDuration]" . ".....belom siap part ni"   ?> </p>
                    </div>
                  </div>
				  <br><br>
                  <div class="row">
                    <div class="col form-group">
					<p>Post Question</p>
                      <textarea name="comment" class="form-control" rows="7" cols="28"><?php echo "$row[post_content]" ?></textarea>
                    </div>
                  </div>

				
                  <div class="text-center">
                    <button type="submit" style="color: #FFFFFF ; background-color: #18A0FB ; border-radius: 5px;">Accept</button>
					<button type="submit" style="color: #FFFFFF ; background-color: #FB1818 ; border-radius: 5px;">Reject</button>
                  </div>

                </form>

              </div>

            </div><!-- End Post Replay -->
<?php
    } 
} else {
    echo " No Data in Database ";

}
?>
	<br><br>
					<p align = "center"> Reminder...... </p>
					<p align = "center"> Sini boleh View dulu...... </p>
					<p align = "center"> **Belom Siap** time duration dynamically, post assigned, post-status(kena baiki) link dgn user post...... </p>
					<p align = "center"> **Belom Siap** function button accept, reject, popup/ape2 utk answer post... </p>
					<p align = "center"> **Belom Siap** total rating, linked dgn login, notification, view feedback... </p>
					<br>





<?php include 'footerExpert.php'; ?>