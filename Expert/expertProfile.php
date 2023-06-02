<?php
$page = 'profile';
include 'header.php';
?>




<div data-aos="fade" class="page-title">
          
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="expertHome.php">Home</a></li>
            <li>Profile</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->
	
	
	<style>
	
	.th{
		font-weight: bold;
		text-transform: uppercase;
		
	}
	
	.optionCenter {
		align: center;
		
	}
	  .profile-table {
    width: 100%;

	}
  
	</style>
	
	
	
	<form action="profileUpdate.php" method="post"  enctype="multipart/form-data">
	<table class="profile-table" border="1"> 
	
	<tr>
	<th class="th">expert profile information</th>  
	</tr>
	
	<tr>
	<td>.</td>
	</tr>
	
	<tr>
	<th class="th">Research Area:</th>  
	<td><select name="publicationCategories">
	<option value="" selected align="center"> -Select Research Area- </option>
	<option value="Networking">Computer Systems and Networking</option>
	<option value="Software Engineering">Software Engineering</option>
	<option value="Graphic and Multimedia">Graphic and Multimedia</option>
	<option value="Cyber Security">Cyber Security</option>
	</select></td>
	<th class="th">Profile Picture:</th> 
	<td> <input type="file" name="profilePicture"></td>
	</tr>
	
	
	<tr>
	  <th class="th">Academic Status: </th>
    <td> <select name = "academicStatus[]" multiple>
  <option value="Diploma" <?php /*if (in_array('Diploma', $academicStatus)) echo 'selected'; */ ?>>Diploma</option>
  <option value ="Degree" <?php /*if (in_array('Degree', $academicStatus)) echo 'selected'; */ ?>>Degree</option>
  <option value ="Master" <?php /*if (in_array('Master', $academicStatus)) echo 'selected'; */ ?>>Master</option>
  <option value ="Phd" <?php /*if (in_array('Phd', $academicStatus)) echo 'selected'; */ ?>>Phd</option>
  </select> </td>
  	<th class="th">CV:</th> 
	<td> <input type="file" name="expertCV"></td>
	</tr>
	
	
	<tr>
	<th class="th">Instagram Username:</th>  
	<td> <input type="text" name="instagram_username" style="width: 210px;" placeholder="Enter Instagram Username"></td>
	</tr>
	
	
	<tr>
	<th class="th">LinkedIn Username:</th>  
	<td> <input type="text" name="linkedin_username" style="width: 210px;" placeholder="Enter LinkedIn Username"></td>
	</tr>
	
	<tr>
	<th class="th">Email:</th>  
	<td> <input type="email" name="email" style="width: 300px;" placeholder="Enter Your Email"></td>
	<td></td>
	<td> <input type="submit" style="background-color: #18A0FB; color: #FFFFFF ; border-radius: 5px;" value="SAVE"></td> 
	</tr>
	

	
	
	
	
	</table>
	</form>
	
	
	
	


<?php include 'footer.php'; ?>