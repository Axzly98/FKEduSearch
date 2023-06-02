<!DOCTYPE html>
<html>
<head>

<title>POST PAGE </title>
</head>



<body>

<!-- BELOM SIAP, TUKAR ~  -->
<!-- BELOM SIAP, TUKAR ~  -->
<!-- BELOM SIAP, TUKAR ~  -->
<!-- BELOM SIAP, TUKAR ~  -->
<!-- BELOM SIAP, TUKAR ~  -->
<!-- BELOM SIAP, TUKAR ~  -->
<!-- BELOM SIAP, TUKAR ~  -->
<!-- BELOM SIAP, TUKAR ~  -->
<!-- BELOM SIAP, TUKAR ~  -->
<!-- BELOM SIAP, TUKAR ~  -->
<!-- BELOM SIAP, TUKAR ~  -->
<!-- BELOM SIAP, TUKAR ~  -->

<?php

	$link = mysqli_connect("localhost", "root") or die(mysqli_connect_error());
  		
	mysqli_select_db($link, "miniproject") or die(mysqli_error());
	

		$queryView = "SELECT * FROM expert" 
    
		or die(mysqli_connect_error());
	
		$result = mysqli_query($link, $queryView);



if (mysqli_num_rows($result) > 0){
	
    while($row = mysqli_fetch_assoc($result)){
		
		$expert_ID = $row["expert_ID"];    
		$userName = $row["expert_userName"];
		$password = $row["expert_password"];
		$email = $row["expert_email"];
		$fullName = $row["expert_fullName"];
		$profilePicture = $row["expert_profilePicture"];
		$expert_CV = $row["expert_CV"];
  
?>	

<style>
    .header-table {
        background-image:url("./images/logoUMP.png");
    }
</style>



<table class="header-table">
</table>





<table align="center" border="1">

	<tr>
	<td ><?php echo "User Name"; ?></td>
	<td ><?php echo $userName; ?></td>
	

   </tr>
   
   <tr>
<td ><?php echo "Full Name"; ?></td>
<td><?php echo $fullName; ?></td>
   </tr>
   
   <tr>
   	<td ><?php echo "Email";  ?></td>
   <td><?php echo $email; ?></td>
   </tr>
   
	</table>
	</form>
<?php
    } 
} else {
    echo "no results";

}
?>


</body>
</html>

