<?php
$page = 'post';
include 'headerExpert.php';

//Connect to the database server.
$link = mysqli_connect("localhost", "root") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

// Retrieve the expert ID from the session
$expertID = $_SESSION['expertID'];


$query = "SELECT research_area.researchAreaName
          FROM research_areauserexpert 
          JOIN research_area  ON research_area.researchArea_ID = research_areauserexpert.researchArea_ID
          WHERE research_areauserexpert.expert_ID = $expertID";


$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_assoc($result);

$researchArea = $row['researchAreaName'];


// Query the post_assigned and post tables to get the assigned posts
$query = "SELECT post.post_title, post.post_content, post.post_createdDate
          FROM post_assigned 
          INNER JOIN post ON post_assigned.post_ID = post.post_ID
          WHERE post_assigned.expert_ID = $expertID AND post.post_categories = '$researchArea'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

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

<div class="container">
    <h2 align="center">Assigned Posts</h2>
    <?php
    if (mysqli_num_rows($result) > 0) {
        // Display the assigned posts
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['post_title'];
            $content = $row['post_content'];
            $date = $row['post_createdDate'];

            echo "<h3 align='center'><strong>Post Title:</strong> $title</h3>";
            echo "<p align='center'><strong>Post Content:</strong> $content</p>";
            echo "<p align='center'><strong>Post Created Date:</strong> $date</p>";
            echo "<hr>";
        }
    } else {
        echo "<p align='center'>No Assigned Posts Found.</p>";
    }
    ?>
</div>


<?php include 'footerExpert.php'; ?>