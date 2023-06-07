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

<form action="insertNewPost.php"></form>
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">Username1</div>
                <div class="col">Category</div>
                <div class="col">Post Date</div>
                <div class="col">Status Post</div>
            </div>
        </div>
        <div class="card-body">
            <h3>Title</h3>
            <br>
            <p>Blockchain is having.......</p>
        </div>
        <hr>
        <div class="card-body">
            <br>
            <p style="width: 100%;">Hi Username1, thanks for asking...</p>
        </div>
        <hr>
        <div class="card-body">
            <div>
                <a href="">Total Like</a>
                <a class="ms-5" href="">View Comment</a>
                <a class="ms-5" href="">Rate/Feedback</a>
            </div>
        </div>
    </div>

    <div class="addContainer">
    <a href="">ADD</a>
    
    </div>
</div>

<form>


<?php include 'footer.php'; ?>
