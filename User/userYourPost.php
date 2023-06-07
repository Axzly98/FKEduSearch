<?php
$page = 'home';
include 'header.php';
include 'footer.php';
?>
<!-- FETCH DATA DRPD ADDPOSTUI -->
<style>
    .addContainer{
        display: flex;
        justify-content: flex-end;
        margin-top: 50px;
    }

</style>

<!-- drpd Amin -->
<?php
$link = mysqli_connect("localhost", "root") or die(mysqli_connect_error());
mysqli_select_db($link, "miniproject") or die(mysqli_error());

$query = "SELECT * FROM post" or die(mysqli_connect_error());
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
    $numberIncrement = 1;
    $numberIncrement++; // Increment the numberIncrement variable
    ?>
<!-- drpd Amin -->

<form action="insertNewPost.php"></form>
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
            <div class="col"><?php echo $numberIncrement; ?>
            <div class="col"><?php echo $row['post_categories']; ?></div>
            <div class="col"><?php echo $row['post_title']; ?></div>
            <div class="col"><?php echo $row['post_content']; ?></div>
            <div class="col"><?php echo $row['post_createdDate']; ?></div>
            <div class="col"><?php echo $row['post_status']; ?></div>
            </div>
        </div>
        <div class="card-body">
            <h3><?php echo $row['post_title']; ?></h3>
            <br>
            <p><?php echo $row['post_content']; ?></p>
        </div>
        <hr>
        <div class="card-body">
            <br>
            <p style="width: 100%;"></p>
        </div>
        <hr>
        <div class="card-body">
            <div>
                <a href=""><?php echo $row['post_likes']; ?></a>
                <a class="ms-5" href="">View Comment</a>
                <a class="ms-5" href="">Rate/Feedback</a>
            </div>
        </div>
    </div>

    <div class="addContainer">
    <a href="/FKEduSearch/User/addPostUI.php">ADD</a>
    
    </div>
</div>

<form>

<?php include 'footer.php'; ?>