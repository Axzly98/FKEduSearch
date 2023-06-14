<?php
//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

$userid = $_GET['id'];

//SQL query
$query = "SELECT c.*, cs.complaintStatus_type FROM complaint c INNER JOIN complaint_status cs ON c.complaintStatus_ID = cs.complaintStatus_ID WHERE user_ID = '$userid'"
	or die(mysqli_connect_error());

$queryUser = "SELECT user_fullName FROM user WHERE user_ID = '$userid'"
	or die(mysqli_connect_error());

//Execute the query (the recordset $rs contains the result)
$result = mysqli_query($link, $query);
$resultUser = mysqli_query($link, $queryUser);

$sql="SELECT count(*) as total from complaint where user_ID = '$userid'";
$resultall=mysqli_query($link,$sql);
$data=mysqli_fetch_assoc($resultall);

$rowUser = mysqli_fetch_assoc($resultUser);

?>	

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/FKEduSearch/Complaint/styleUser.css">

</head>
<!-- HEADER -->
<div class="div">
<div class="topnav">
  <a><img src="https://umplive.ump.edu.my/images/2020/07/26/logo-ump-transparent-blue__1122x561.png" style="width: 40px;"></a>
  <a href="/FKEduSearch/User/userHome.php" style="margin-left: 400px;">Home</a>
  <a href="/FKEduSearch/User/userYourPost.php">Your Post</a>
  <a class="active" href="/FKEduSearch/Complaint/User/ComplaintInterface.php">Complaint</a>
  <a href="/FKEduSearch/User/userProfile.php">Profile</a>
  <a href="/FKEduSearch/Admin/logout.php">Logout</a>
  <div class="search-container">
    <form action="/action_page.php">
      <input class="input" type="text" name="search">
      <button type="submit">Search</button>
    </form>
  </div>
</div>
<hr style="box-shadow: 5px 0px 1px #6DE4EA;">
</div>


<body style="overflow:auto;">



<!-- YOUR CONTENT -->
<div>
<div>
    <br>
    <div>
        <table style="width:100%; margin-left:20px;">
            <tr>
                <td>All (<?php echo $data['total']; ?>)</td>
                <td style="float:right; margin-right:30px"><button class="button-78" type="button" onclick="window.location.href='/FKEduSearch/Complaint/User/update.php?comid=<?php echo $complainid; ?>';">Report</button></td>
            </tr>
        </table>
    </div>
    <br>
<div>
<form method="post">
<table border="1" class="table" style="width: 100%">
<tr class="thread">
  <th class="th" scope="col">No</th>
  <th class="th" scope="col">Name</th>
  <th class="th" scope="col">Date</th>
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
    $name = $rowUser["user_fullName"];
    $date = $row["complaint_DateTime"];
	  $type = $row["complaint_Type"];
    $desc = $row["complaint_Desc"];
    $status = $row["complaintStatus_type"];
      
    
?>	
	
    <td class="td"><?php echo $no; ?></td>
    <td class="td"><?php echo $name; ?></td>
		<td class="td"><?php echo $date; ?></td>
    <td class="td"><?php echo $type; ?></td>
    <td class="td"><?php echo $desc; ?></td>
    <td class="td"><?php echo $status; ?></td>
		<td class="td">
    <input type="hidden" name="comid" value="<?php echo $complainid; ?>">
			<a><button class="button-48" type="button" onclick="window.location.href='/FKEduSearch/Complaint/User/update.php?comid=<?php echo $complainid; ?>';">✏️</button></a> 
      <a><button class="button-48" type="button" onclick="window.location.href='/FKEduSearch/Complaint/User/view.php?comid=<?php echo $complainid; ?>';">👀</button></a> 
			<a><button class="button-48" type="button" onclick="window.location.href='/FKEduSearch/Complaint/User/delete.php?comid=<?php echo $complainid; ?>';">🗑️</button></a>
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
    
</div>
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