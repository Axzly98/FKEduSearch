<?php
//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

//SQL query
$query = "SELECT * FROM complaint"
	or die(mysqli_connect_error());
	
//Execute the query (the recordset $rs contains the result)
$result = mysqli_query($link, $query);
?>	

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/FKEduSearch/Complaint/styleUser.css">

</head>
<body>

<!-- HEADER -->
<div class="topnav">
  <a><img src="https://umplive.ump.edu.my/images/2020/07/26/logo-ump-transparent-blue__1122x561.png" style="width: 40px;"></a>
  <a href="#home" style="margin-left: 400px;">Home</a>
  <a href="#news">Your Post</a>
  <a class="active" href="/FKEduSearch/Complaint/User/ComplaintInterface.php">Complaint</a>
  <a href="#about">Profile</a>
  <a href="#about">Logout</a>
  <div class="search-container">
    <form action="/action_page.php">
      <input class="input" type="text" name="search">
      <button type="submit">Search</button>
    </form>
  </div>
</div>
<hr style="box-shadow: 5px 0px 1px #6DE4EA;">

<!-- YOUR CONTENT -->
<div class="div">
    <br>
    <div>
        <table style="width:50%; margin-left:20px;">
            <tr>
                <td>All ()</td>
                <td>Sort</td>
                <td>
                    <select name="sort" class="form-control">
                    <option value="Day">Day</option>
                    <option value="Month">Month</option>
                    <option value="Year">Year</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Complain Type</td>
                <td>
                    <select name="sort_type" class="form-control">
                    <option value="Wrongly Assigned Research Area">Wrongly Assigned Research Area</option>
                    <option value="Unsatisfied Expert's Feedback">Unsatisfied Expert's Feedback</option>
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <br>
<table border="1" style="width: 100%">
<tr>
  <th scope="col">No</th>
  <th scope="col">ID</th>
  <th scope="col">Date</th>
  <th scope="col">Type of complaint</th>
  <th scope="col">Description</th>
  <th scope="col">Status</th>
  <th scope="col">Action</th>
            </tr>
            <tr>
<?php  if (mysqli_num_rows($result) > 0){
    // output data of each row
    $no = 0;
    while($row = mysqli_fetch_assoc($result)){
    $no = $no + 1;
    $complainid = $row["complaint_ID"];
    $userid = $row["user_ID"];
    $date = $row["complaint_DateTime"];
	$type = $row["complaint_Type"];
  $desc = $row["complaint_Desc"];
	$status = $row["complaintStatus_ID"];
?>	
	
    <td><?php echo $no; ?></td>
		<td><?php echo $userid; ?></td>
		<td><?php echo $date; ?></td>
    <td><?php echo $type; ?></td>
    <td><?php echo $desc; ?></td>
    <td><?php echo $status; ?></td>
		<td>
			<a><button type="button" onclick="window.location.href='/FKEduSearch/Complaint/User/update.php?id=<?php echo $complainid; ?>';">✏️</button></a> 
      <a><button type="button" onclick="window.location.href='/FKEduSearch/Complaint/User/view.php?id=<?php echo $complainid; ?>';">👀</button></a> 
			<a><button type="button" onclick="window.location.href='/FKEduSearch/Complaint/User/delete.php?id=<?php echo $complainid; ?>';">🗑</button></a>
		</td>
	</tr>
<?php
    }
} else {
    echo "0 results";

}
?>
</table>
</div>

<!-- FOOTER -->
<footer>

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