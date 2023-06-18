<?php
$page = 'post';
include 'headerUser.php';
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

$user_ID = $_REQUEST['user_ID'];

// Retrieve all posts assigned to the user
$query = "SELECT pa.postAssigned_ID, pa.post_ID, pa.expert_ID, pa.date_assigned, pa.postAssigned_status,
            p.post_title, p.post_content, p.post_createdDate,
            pa.date_assigned, pa.postAssigned_status, 
            pa.expert_ID, pa.postAssigned_ID, 
            pa.date_assigned, 
            a.post_answer
        FROM post_assigned pa
        INNER JOIN post p ON pa.post_ID = p.post_ID
        LEFT JOIN post_answer a ON pa.postAssigned_ID = a.postAssigned_ID
        WHERE p.user_ID = '$user_ID'";

$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $post_ID = $row['post_ID'];
		 $expert_ID = $row['expert_ID'];
        $post_Title = $row['post_title'];
        $post_Content = $row['post_content'];
        // Retrieve other necessary data from the row

        // Display post information within a container
        echo "<div class='post-container'>";
        echo "<div class='post-box'>";
        echo "<h3 class='post-title'><strong>Post Title: </strong>$post_Title</h3>";
        echo "<p class='post-content'><strong>Post Content: </strong>$post_Content</p>";
        // Display other necessary data from the row

        // Display the expert's answer if available
        $post_Answer = $row['post_answer'];
        if (!empty($post_Answer)) {
            echo "<p class='post-answer'><strong>Expert's Answer:</strong> $post_Answer</p>";
            
            // Display rating input for the expert's answer
			echo "<form method='POST' action='handleRating.php?expert_ID=$expert_ID'>";
			echo "<div class='rating-container'>";
			echo "<label for='rating$expert_ID'>Rate The Expert's Answer:</label>";
			echo "<input type='number' id='rating$expert_ID' name='rating' min='1' max='5'>";
			echo "<input type='submit' value='Submit Rating'>";
			echo "</div>";
			echo "</form>";
        }

        // Display any other necessary information

        echo "</div>"; // Close the post-box
        echo "</div>"; // Close the post-container
    }
} else {
    echo "<p class='no-posts'>No Posts Found.</p>";
}
?>


<style>


.post-container {
  margin-bottom: 20px;
}

.post-box {
  border: 1px solid #ccc;
  padding: 10px;
  background-color: #f9f9f9;
}

.post-title {
  font-size: 20px;
  margin-bottom: 10px;
  text-align: center;
  text-decoration: underline;
}

.post-content {
  margin-bottom: 10px;
  text-align: center;
}

.post-answer {
  margin-top: 10px;
  text-align: center;
}

.rating-container {
  text-align: center;
  margin-top: 10px;
}

.no-posts {
  text-align: center;
  font-style: italic;
  color: #888;
  margin-top: 20px;
}



</style>


<script>
// Validate the rating input to allow only numbers between 1 and 5
var ratingInputs = document.querySelectorAll('input[name="rating"]');
ratingInputs.forEach(function(input) {
  input.addEventListener('input', function() {
    var value = parseInt(this.value);
    if (isNaN(value) || value < 1 || value > 5) {
      alert('Please Enter Rating Between 1 - 5.');
      this.value = ''; // Clear the input field
    }
  });
});
</script>
