<?php
$page = 'home';
include 'headerUser.php';
?>

<style>
    .post-container {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 20px;
        background-color: #f9f9f9;
    }

    .post-title {
        text-align: center;
        text-transform: uppercase;
        margin-top: 0;
    }

    .post-content {
        margin-bottom: 10px;
    }

    .post-details {
        text-align: center;
        margin-bottom: 10px;
    }

    .post-comments {
        margin-bottom: 10px;
    }

    .comment-container {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #f9f9f9;
    }

    .comment-details {
        text-align: center;
        margin-bottom: 10px;
    }

    .comment-content {
        margin-bottom: 5px;
    }

    .like-link {
        text-align: center;
        margin-bottom: 10px;
    }
</style>

<h1 class="post-title">All Posts</h1>

<?php
$link = mysqli_connect("localhost", "root") or die(mysqli_connect_error($link));
mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

// Check if the user is logged in
if (isset($_SESSION['userID'])) {
    $user_ID = $_SESSION['userID'];

    // Check if a post ID is submitted for like
    if (isset($_GET['like_post'])) {
        $postID = $_GET['like_post'];

        // Check if the user has already liked the post
        $checkLikedQuery = "SELECT * FROM post_likes WHERE post_ID = '$postID' AND user_ID = '$user_ID'";
        $checkLikedResult = mysqli_query($link, $checkLikedQuery);

        if (mysqli_num_rows($checkLikedResult) > 0) {
            // User has already liked the post
            echo "<script>alert('You Have Already Liked This Post!');</script>";
        } else {
            // Insert the like into the 'post_likes' table
            $insertLikeQuery = "INSERT INTO post_likes (post_ID, user_ID) VALUES ('$postID', '$user_ID')";
            $insertLikeResult = mysqli_query($link, $insertLikeQuery);

            if ($insertLikeResult) {
                // Update the 'total_likes' field in the 'post' table
                $updateLikesQuery = "UPDATE post SET post_likes = post_likes + 1 WHERE post_ID = '$postID'";
                $updateLikesResult = mysqli_query($link, $updateLikesQuery);

                if ($updateLikesResult) {
                    echo "<script>alert('Liked Post Successfully !');</script>";
                } else {
                    echo "<script>alert('Failed TO Update The Likes Post !');</script>";
                }
            } else {
                echo "<script>alert('Failed to like the post!');</script>";
            }
        }
    }
}

// Handle comment submission
if (isset($_POST['submitComment'])) {
    $postID = $_POST['postID'];
    $commentContent = $_POST['comments_description'];

    // Insert the comment into the 'comment' table
    $insertCommentQuery = "INSERT INTO comment (post_ID, user_ID, comments_description, comments_date) VALUES ('$postID', '$user_ID', '$commentContent', CURDATE())";
    $insertCommentResult = mysqli_query($link, $insertCommentQuery);

    // Update the comment count in the 'post' table
    $updateCommentCountQuery = "UPDATE post SET post_comments = post_comments + 1 WHERE post_ID = '$postID'";
    $updateCommentCountResult = mysqli_query($link, $updateCommentCountQuery);

    if ($insertCommentResult) {
        echo "<script>alert('Comment Added Successfully!');</script>";
    } else {
        echo "<script>alert('Failed To Add The Comment!');</script>";
    }
}

// Retrieve all posts from the 'post' table
$query = "SELECT * FROM post";
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $postID = $row['post_ID'];
        $postTitle = $row['post_title'];
        $postContent = $row['post_content'];
        $postCreatedDate = $row['post_createdDate'];
        $postCategories = $row['post_categories'];
        $totalLikes = $row['post_likes'];
        $totalComments = $row['post_comments'];

        // Display post information
        echo "<div class='post-container'>";
        echo "<h3 class='post-title' >Post Title: $postTitle</h3>";
        echo "<p class='post-content' align='center'><strong>Post Content:</strong> $postContent</p>";
        echo "<p class='post-details'><strong>Date Created:</strong>  $postCreatedDate</p>";
        echo "<p class='post-details'><strong>Post Categories:</strong>  $postCategories</p>";
        echo "<p class='post-details'><strong>Total Likes:</strong>  $totalLikes</p>";
        echo "<p class='post-comments' align='center'><strong>Total Comments:</strong>  $totalComments</p>";

        // Display comment form if the user is logged in
        if (isset($_SESSION['userID'])) {
            echo "<form method='POST' action='userHomeAmin.php' class='comment-form' style='text-align:center'>";
            echo "<input type='hidden' name='postID' value='$postID'>";
            echo "<textarea name='comments_description' placeholder='Enter Your Comment'></textarea>";
            echo "<br>";
            echo "<button type='submit' name='submitComment'>Comment</button>";
            echo "</form>";
        }

        // Retrieve comments for the post from the 'comment' table
        $commentQuery = "SELECT * FROM comment WHERE post_ID = '$postID'";
        $commentResult = mysqli_query($link, $commentQuery);

        if (mysqli_num_rows($commentResult) > 0) {
            echo "<h4 class='comment-title' align='center'>Comments:</h4>";
            while ($commentRow = mysqli_fetch_assoc($commentResult)) {
                $commentUser = $commentRow['user_ID'];
                $commentContent = $commentRow['comments_description'];
                $commentDate = $commentRow['comments_date'];

                // Retrieve username for the comment
                $usernameQuery = "SELECT user_userName FROM user WHERE user_ID = '$commentUser'";
                $usernameResult = mysqli_query($link, $usernameQuery);
                $usernameRow = mysqli_fetch_assoc($usernameResult);
                $username = $usernameRow['user_userName'];

                // Display comment details
                echo "<div class='comment-container'>";
                echo "<p class='comment-details'>UserName: <strong>$username</strong></p>";
                echo "<p class='comment-content' align='center'>Comment Content: <strong>$commentContent</strong></p>";
                echo "<p class='comment-details'>Date Comment: <strong>$commentDate</strong></p>";
                echo "</div>";
            }
        }

        // Display like button if the user is logged in
        if (isset($_SESSION['userID'])) {
            echo "<p class='like-link'><a href='userHomeAmin.php?like_post=$postID'>Like Here</a></p>";
        }

        echo "</div>";
    }
} else {
    echo "No Posts Found.";
}

mysqli_close($link);

include 'footerUser.php';
?>