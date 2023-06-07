<?php
$page = 'addPostUI';
include 'header.php';
require 'connection.php';
?>


<!-- //SINI SATU -->
<form>
  <div class="form-group" action="insertPostDB.php" method="post"> 
    <label for="formGroupExampleInput">Title</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Write your title here" name="title">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Post</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Write your post here" name="post">
  </div>

  <div class="form-group">
  <label for="category">Category</label>
  <select class="form-control" id="category" name="category">
    <option value="option1">Networking</option>
    <option value="option2">Security</option>
    <option value="option3">Computer System</option>
    <!-- Add more options as needed -->
  </select>
</div>

    <td><br><br><br><input type="submit" style="color:black ; border-radius: 5px; float: right" value="Submit"></td>

</form>

<!-- “value=“php echo fuser”” -->