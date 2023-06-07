<?php
$page = 'profile';
include 'headerExpert.php';
?>

<div class="page-title">
          
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li ><a href="expertHome.php">Home</a></li>
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
	
	

	
	
	
	
	<?php 
	
			$link = mysqli_connect("localhost", "root") or die(mysqli_connect_error());
			mysqli_select_db($link, "miniproject") or die(mysqli_error());
			
			$query = "SELECT expert.expert_email AS expert_email, expert.expert_profilePicture AS expert_profilePicture, expert.expert_CV AS expert_CV, research_area.researchAreaName AS researchAreaName, academic_status.academicStatus_type AS academicStatus_type, socialmedia.instagram_userName AS instagram_userName, socialmedia.linkedin_userName AS linkedin_userName
					  FROM expert
					  JOIN research_areauserexpert ON expert.expert_ID = research_areauserexpert.expert_ID
					  JOIN research_area ON research_areauserexpert.researchArea_ID = research_area.researchArea_ID
					  JOIN academic_statususerexpert ON expert.expert_ID = academic_statususerexpert.expert_id
					  JOIN academic_status ON academic_statususerexpert.academicStatus_ID = academic_status.academicStatus_ID
					  JOIN socialmedia ON expert.expert_ID = socialmedia.expert_ID
					  WHERE expert.expert_ID = 12" or die(mysqli_connect_error());
					  
			$result = mysqli_query($link, $query);
			
			$row = mysqli_fetch_assoc($result);
			
			$academicStatus_type = $row["academicStatus_type"];
			
			$academicStatus_type = explode(',', $academicStatus_type);
			
		
	?>
	

	
	<form action="expertProfileUpdate.php" method="post"  enctype="multipart/form-data">
	<table class="profile-table" border="0"> 
	
	<tr>
	<th class="th">expert profile information</th>  
	</tr>
	
	<tr>
	<td>.</td>
	</tr>
	
	<tr>
	<th class="th">Research Area:</th>  
	<td><select name= "researchAreaName">
	<option value="" selected align="center"> -Select Research Area- </option>
	<option value="Computer Systems and Networking" <?php if ($row['researchAreaName'] === 'Computer Systems and Networking') echo 'selected'; ?>>Computer Systems and Networking</option>
	<option value="Software Engineering" <?php if ($row['researchAreaName'] === 'Software Engineering') echo 'selected'; ?>>Software Engineering</option>
	<option value="Graphic and Multimedia" <?php if ($row['researchAreaName'] === 'Graphic and Multimedia') echo 'selected'; ?>>Graphic and Multimedia</option>
	<option value="Cyber Security" <?php if ($row['researchAreaName'] === 'Cyber Security') echo 'selected'; ?>>Cyber Security</option>
	</select></td>
	<th class="th">Profile Picture:</th> 
	<td> <input type="file" name="profilePicture"> <p>Current File Name: <?php echo $row['expert_profilePicture']; ?></p></td>
	</tr>
	
	
	<tr>
	  <th class="th">Academic Status: </th>
    <td> <select name = "academicStatus_type[]" multiple>
  <option value="Diploma" <?php if (in_array('Diploma', $academicStatus_type)) echo 'selected'; ?>>Diploma</option>
  <option value ="Degree" <?php if (in_array('Degree',  $academicStatus_type)) echo 'selected';  ?>>Degree</option>
  <option value ="Master" <?php if (in_array('Master',  $academicStatus_type)) echo 'selected';  ?>>Master</option>
  <option value ="Phd" <?php if (in_array('Phd', $academicStatus_type)) echo 'selected';  ?>>Phd</option>
  </select> </td>
  	<th class="th">CV:</th> 
	<td> <input type="file" name="expertCV"> <p>Current File Name: <?php echo $row['expert_CV']; ?> </p></td>
	<td>

	</td>
	</tr>
	
	
	<tr>
	<th class="th">Instagram Username:</th>  
	<td> <input type="text" name="instagram_userName" style="width: 210px;" placeholder="Enter Instagram Username" value="<?php echo $row['instagram_userName']; ?>"></td>
	</tr>
	
	
	<tr>
	<th class="th">LinkedIn Username:</th>  
	<td> <input type="text" name="linkedin_userName" style="width: 210px;" placeholder="Enter LinkedIn Username" value="<?php echo $row['linkedin_userName']; ?>"></td>
	</tr>
	
	<tr>
	<th class="th">Email:</th>  
	<td> <input type="email" name="email" style="width: 300px;" placeholder="Enter Your Email" value="<?php echo $row['expert_email']; ?>"></td>
	<td></td>
	<!-- <td><a href="expertProfileUpdate.php?id=12 <?php ?>">UPDATE</a></td> -->
	 <td><input type="submit" style="background-color: #18A0FB; color: #FFFFFF ; border-radius: 5px;" value="UPDATE"></td>
	</tr>
	

	</table>
	</form>
	
	
	
	


<?php include 'footerExpert.php'; ?>