<?php
//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

//SQL query
$query = "SELECT c.*, cs.complaintStatus_type, u.user_fullName FROM complaint c INNER JOIN complaint_status cs ON c.complaintStatus_ID = cs.complaintStatus_ID INNER JOIN user u ON c.user_ID = u.user_ID"
	or die(mysqli_connect_error());

$queryUser = "SELECT FROM complaint c"
	or die(mysqli_connect_error());

//Execute the query (the recordset $rs contains the result)
$result = mysqli_query($link, $query);


$sql="SELECT count(*) as total from complaint";
$resultall=mysqli_query($link,$sql);
$data=mysqli_fetch_assoc($resultall);


?>	

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/FKEduSearch/Complaint/Admin/styleAdmin.css">

</head>
<script>
  function display(a){

    if (a == 1){
      document.getElementById("popDelete").style.display="block";
    }

    if (a == 2){
      document.getElementById("popDelete").style.display="none";
    }

  }
</script>
<body style="overflow:auto;">
<!-- HEADER -->
<div class="topnav">
  <a><img src="https://umplive.ump.edu.my/images/2020/07/26/logo-ump-transparent-blue__1122x561.png" style="width: 40px;"></a>
  <a href="/FKEduSearch/User/userHome.php" style="margin-left: 400px;">Home</a>
  <a href="/FKEduSearch/User/userYourPost.php">Your Post</a>
  <a class="active" href="/FKEduSearch/Complaint/Admin/ComplaintListInterface.php">Complaint</a>
  <a href="/FKEduSearch/User/userProfile.php">Profile</a>
  <a href="/FKEduSearch/Admin/logout.php">Logout</a>
  
</div>
<hr style="box-shadow: 5px 0px 1px #6DE4EA;">

<!-- YOUR CONTENT -->
<div class="div">
    <br>
    
    <div>
        <table style="width:50%; margin-left:20px;">
            <tr>
                <td>All (<?php echo $data['total']; ?>)</td>
                <form action="search.php?id=<?php echo $adminid?>" method="post">

                </tr>
            <tr>
              <td>
                <table>
                  <tr><td><a style="margin-left: 100px;">Date</a></td>
                    <td><input class="textbox-10" type="date" name="newdate" value="<?php $newDate?>"></td></tr>
                  <tr><td><a style="margin-left: 100px; margin-right:10px;">Complaint Type</a></td>
                    <td><select class="textbox-10" name="newtype" >
                      <option value="" disabled selected>Select type of complaint</option>
                      <option value="Wrongly Assigned Research Area">Wrongly Assigned Research Area</option>
                      <option value="Unsatisfied Expert Feedback">Unsatisfied Expert's Feedback</option>
                      <option value="Other">Other</option>
                    </select>
                    </td>
                  </tr>
                </table>
              </td>
              <td><button class="button-81" style="margin-left: -230px;" type="submit">Search</button></td>
            </tr>
        </table>
                </form>
    </div>
        <button style="float: right; margin-right:10px; margin-top:-10px; margin-bottom:10px;" class="button-17" type="button" onclick="window.location.href='/FKEduSearch/Complaint/User/Report.php?id=<?php echo $userid?>'">Report</button>
    </div>
    <br>
<div>
            

    <br>
    <form method="post">
<table border="1" class="table" style="width: 100%">
<tr class="thread">
  <th class="th" scope="col">No</th>
  <th class="th" scope="col">Name</th>
  <th class="th" scope="col">Date</th>
  <th class="th" scope="col">Time</th>
  <th class="th" scope="col">Type of complaint</th>
  <th class="th" scope="col">Description</th>
  <th class="th" scope="col">Status</th>
  <th class="th" scope="col">Action</th>
            </tr>
            <tr>
<?php  if (mysqli_num_rows($result) > 0){
    // output data of each row
    $no = 0;
    while($row = mysqli_fetch_assoc($result) ){
    $no = $no + 1;
    $complainid = $row["complaint_ID"];
    $name = $row["user_fullName"];
    $date = $row["complaint_Date"];
    $time = $row["complaint_Time"];
	  $type = $row["complaint_Type"];
    $desc = $row["complaint_Desc"];
    $status = $row["complaintStatus_type"];
    
    
?>	
	
    <td class="td"><?php echo $no; ?></td>
    <td class="td"><?php echo $name; ?></td>
		<td class="td"><?php echo $date; ?></td>
    <td class="td"><?php echo $time; ?></td>
    <td class="td"><?php echo $type; ?></td>
    <td class="td"><?php echo $desc; ?></td>
    <td class="td"><?php echo $status; ?></td>
		<td class="td">
    
    <a><button class="button-48" type="button" onclick="window.location.href='/FKEduSearch/Complaint/Admin/add.php?id=<?php echo $complainid; ?>';">➕</button></a> 
			<a><button class="button-48" type="button" onclick="window.location.href='/FKEduSearch/Complaint/Admin/update.php?id=<?php echo $complainid; ?>';">✏️</button></a> 
      <a><button class="button-48" type="button" onclick="window.location.href='/FKEduSearch/Complaint/Admin/view.php?id=<?php echo $complainid; ?>';">👀</button></a> 
			<a><button class="button-48" type="button" onclick="window.location.href='/FKEduSearch/Complaint/Admin/delete.php?id=<?php echo $complainid; ?>';">🗑️</button></a>
		</td>
	</tr>
<?php
    }
} else {
    echo "0 results";

}
?>
</table>
</form>
</div>

<!-- FOOTER -->
<footer style="position: static">

      <div class="foot">
        <a>
          <img src="https://icon.ump.edu.my/images/ICoN/logo-pusat-jaringan-industri-dan-masyarakat.png" style="width: 80px;">
        </a>
        <a href="https://ump.edu.my/en" style="margin-top: 20px; margin-left: 400px;">UMP - Official</a>
        <a href="https://kalam.ump.edu.my/login/index.php" style="margin-top: 20px;">Kalam</a>
        <a href="https://community.ump.edu.my/ecommstaff/login_eccom/" style="margin-top: 20px;">E-Comm</a>
        <a style="margin-top: 20px; float: right;">© Universiti Malaysia Pahang 2023. We love you!</a>
      </div>
</footer>
</body>
</html>