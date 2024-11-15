<?php

session_start();
$userid = $_SESSION['userID'];

//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

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

$newDate;
$newType;
?>	

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/FKEduSearch/Complaint/styleUser.css">

</head>
<style>
 
.button-17 {
  align-items: center;
  appearance: none;
  background-color: #173d7b;
  border-radius: 24px;
  border-style: none;
  box-shadow: rgba(0, 0, 0, .2) 0 3px 5px -1px,rgba(0, 0, 0, .14) 0 6px 10px 0,rgba(0, 0, 0, .12) 0 1px 18px 0;
  box-sizing: border-box;
  color: #cdf4fa;
  cursor: pointer;
  display: inline-flex;
  fill: currentcolor;
  font-family: "Google Sans",Roboto,Arial,sans-serif;
  font-size: 14px;
  font-weight: 500;
  height: 48px;
  justify-content: center;
  letter-spacing: .25px;
  line-height: normal;
  max-width: 100%;
  overflow: visible;
  padding: 2px 24px;
  position: relative;
  text-align: center;
  text-transform: none;
  transition: box-shadow 280ms cubic-bezier(.4, 0, .2, 1),opacity 15ms linear 30ms,transform 270ms cubic-bezier(0, 0, .2, 1) 0ms;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: auto;
  will-change: transform,opacity;
  z-index: 0;
}

.button-17:hover {
  background: #F6F9FE;
  color: #18A0FB;
}

.button-17:active {
  box-shadow: 0 4px 4px 0 rgb(35 255 76 / 30%), 0 8px 12px 6px rgb(60 64 67 / 15%);
  outline: none;
}

.button-17:focus {
  outline: none;
  border: 5px solid #95d1e6;
  color: #cee9ed;
  background-color: #9ebdef;
}

.button-17:not(:disabled) {
  box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
}

.button-17:not(:disabled):hover {
  box-shadow: rgba(60, 64, 67, .3) 0 2px 3px 0, rgba(60, 64, 67, .15) 0 6px 10px 4px;
}

.button-17:not(:disabled):focus {
  box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
}

.button-17:not(:disabled):active {
  box-shadow: rgba(60, 64, 67, .3) 0 4px 4px 0, rgba(60, 64, 67, .15) 0 8px 12px 6px;
}

.button-17:disabled {
  box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
}
</style>
<!-- HEADER -->
<div class="div">
<div class="topnav">
  <a><img src="https://umplive.ump.edu.my/images/2020/07/26/logo-ump-transparent-blue__1122x561.png" style="width: 40px;"></a>
  <a href="/FKEduSearch/Expert/userHomeAmin.php" style="margin-left: 400px;">Home</a>
  <a href="/FKEduSearch/Expert/userYourPostAminBetul.php">Your Post</a>
  <a class="active" href="/FKEduSearch/Complaint/User/ComplaintInterface.php?id=<?php echo $userid?>">Complaint</a>
  <a href="/FKEduSearch/Expert/userProfile.php">Profile</a>
  <a href="/FKEduSearch/Expert/logout.php">Logout</a>
  <div class="search-container">

  </div>
</div>
<hr style="box-shadow: 5px 0px 1px #6DE4EA;">
</div>


<body>



<!-- YOUR CONTENT -->
<div>
<div>
    <br>
    <div>
    <div>
        <table style="width:50%; margin-left:20px;">
            <tr>
                <td>All (<?php echo $data['total']; ?>)</td>
                <form action="search.php?id=<?php echo $userid?>" method="post">
                
                
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
    $name = $rowUser["user_fullName"];
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
    <input type="hidden" name="comid" value="<?php echo $complainid; ?>">
    <input type="hidden" name="id" value="<?php echo $userid; ?>">
    <?php

if ($status=="Resolved"){
?>
      <a><button class="button-48" type="button" onclick="window.location.href='/FKEduSearch/Complaint/User/view_reply.php?comid=<?php echo $complainid; ?>';">📧</button></a> 
      <a><button class="button-48" type="button" onclick="window.location.href='/FKEduSearch/Complaint/User/view.php?comid=<?php echo $complainid; ?>';">👀</button></a> 
			<a><button class="button-48" type="button" onclick="window.location.href='/FKEduSearch/Complaint/User/delete.php?comid=<?php echo $complainid; ?>';">🗑️</button></a>
<?php
}
else {
  ?>
      <a><button class="button-48" type="button" onclick="window.location.href='/FKEduSearch/Complaint/User/update.php?comid=<?php echo $complainid; ?>';">✏️</button></a> 
      <a><button class="button-48" type="button" onclick="window.location.href='/FKEduSearch/Complaint/User/view.php?comid=<?php echo $complainid; ?>';">👀</button></a> 
			<a><button class="button-48" type="button" onclick="window.location.href='/FKEduSearch/Complaint/User/delete.php?comid=<?php echo $complainid; ?>';">🗑️</button></a>
<?php 
}
?>
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
<footer style="bottom : 2px;position:fixed;width:100%;">

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