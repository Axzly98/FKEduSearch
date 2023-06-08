<?php

$page = 'add post';

include 'header.php';
?>



<form action="userAddPost.php" method="post">
<table align=center>

   <td>Post Title:</td>  
    <td><input type="text" name="postTitle" placeholder="Write Your Post Title Here" style="width: 300px;"> </td> 
   
   </tr>

   <td>Post:</td>
<td>   <textarea name ="postQuestion"  placeholder="Write Your Post Here..." 
   rows = "7" cols = "40"></textarea></td>
   </tr>
   
   <tr>
   <td><input type="submit" align="center" value="Submit"></td>
   
   </tr>

</table>
</form>


 
   <!--  <td><br><input type="submit" style="color:black ; border-radius: 5px; float: right" value="Submit"></td> -->

</form>

<!-- "background-color: #18A0FB;  -->