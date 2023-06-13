<?php
$page = 'profile';
include 'headerUser.php';
?>

<style>
  .th {
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

$query = "SELECT user.user_email AS user_email, research_area.researchAreaName AS researchAreaName, academic_status.academicStatus_type AS academicStatus_type, socialmedia.instagram_userName AS instagram_userName, socialmedia.linkedin_userName AS linkedin_userName
					  FROM user
					  JOIN research_areauserexpert ON user.user_ID = research_areauserexpert.user_ID
					  JOIN research_area ON research_areauserexpert.researchArea_ID = research_area.researchArea_ID
					  JOIN academic_statususerexpert ON user.user_ID = academic_statususerexpert.user_id
					  JOIN academic_status ON academic_statususerexpert.academicStatus_ID = academic_status.academicStatus_ID
					  JOIN socialmedia ON user.user_ID = socialmedia.user_ID
					  WHERE user.user_ID = 10" or die(mysqli_connect_error());

$result = mysqli_query($link, $query);

$row = mysqli_fetch_assoc($result);

$academicStatus_type = $row["academicStatus_type"];

$academicStatus_type = explode(',', $academicStatus_type);


?>

<form action="userProfileUpdate.php" method="post">
  <table class="profile-table" border="0">
    <tr>
      <th class="th">User profile information</th>
    </tr>

    <tr>
      <th class="th">Research Area:</th>
      <td>
        <select name="researchAreaName">
          <option value="" selected align="center"> -Select Research Area- </option>
          <option value="Computer Systems and Networking" <?php if ($row['researchAreaName'] === 'Computer Systems and Networking') echo 'selected'; ?>>Computer Systems and Networking</option>
          <option value="Software Engineering" <?php if ($row['researchAreaName'] === 'Software Engineering') echo 'selected'; ?>>Software Engineering</option>
          <option value="Graphic and Multimedia" <?php if ($row['researchAreaName'] === 'Graphic and Multimedia') echo 'selected'; ?>>Graphic and Multimedia</option>
          <option value="Cyber Security" <?php if ($row['researchAreaName'] === 'Cyber Security') echo 'selected'; ?>>Cyber Security</option>
        </select>
      </td>
    </tr>
	
	<tr>
	  <th class="th">Academic Status: </th>
    <td> <select name = "academicStatus_type[]" multiple>
  <option value="Diploma" <?php if (in_array('Diploma', $academicStatus_type)) echo 'selected'; ?>>Diploma</option>
  <option value ="Degree" <?php if (in_array('Degree',  $academicStatus_type)) echo 'selected';  ?>>Degree</option>
  <option value ="Master" <?php if (in_array('Master',  $academicStatus_type)) echo 'selected';  ?>>Master</option>
  <option value ="Phd" <?php if (in_array('Phd', $academicStatus_type)) echo 'selected';  ?>>Phd</option>
  </select> </td>

	</tr>



    <tr>
      <th class="th">Instagram Username:</th>
      <td>
        <input type="text" name="instagram_userName" style="width: 210px;" placeholder="Enter Instagram Username" value="<?php echo $row['instagram_userName']; ?>">
      </td>
    </tr>

    <tr>
      <th class="th">LinkedIn Username:</th>
      <td>
        <input type="text" name="linkedin_userName" style="width: 210px;" placeholder="Enter LinkedIn Username" value="<?php echo $row['linkedin_userName']; ?>">
      </td>
    </tr>

    <tr>
      <th class="th">Email:</th>
      <td>
        <input type="email" name="email" style="width: 300px;" placeholder="Enter Your Email" value="<?php echo $row['user_email']; ?>">
      </td>
      <td></td>
      <td><input type="submit" style="background-color: #18A0FB; color: #FFFFFF; border-radius: 5px;" value="UPDATE"></td>
    </tr>
  </table>
</form>

<?php

include 'footerUser.php';

?>