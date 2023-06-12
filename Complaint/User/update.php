<?php
//Connect to the database server.
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

//Select the database.
mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

$complainid = $_GET['comid'];

//SQL query
$query = "SELECT * FROM complaint WHERE complaint_ID = '$complainid'"
	or die(mysqli_connect_error());
	
//Execute the query (the recordset $rs contains the result)
$result = mysqli_query($link, $query);

 $row = mysqli_fetch_assoc($result);

    $userid = $row["user_ID"];
	$type = $row["complaint_Type"];
	$desc = $row["complaint_Desc"];

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
  <a href="/FKEduSearch/User/userHome.php" style="margin-left: 400px;">Home</a>
  <a href="/FKEduSearch/User/userYourPost.php">Your Post</a>
  <a class="active" href="/FKEduSearch/Complaint/User/ComplaintInterface.php">Complaint</a>
  <a href="/FKEduSearch/User/userProfile.php">Profile</a>
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


<div class="center">
<<<<<<< Updated upstream
<h1>Complaint</h1>
=======
<h1>Make a complaint</h1>
>>>>>>> Stashed changes
<br>
<form method="post" action="update_action.php">
  <table class="center1">
    <tr>
      <td>
        ID
      </td>
    </tr>
    <tr>
      <td>
<<<<<<< Updated upstream
        <input class="textbox-10" type="text" name="id" size="10" value="<?php echo $userid; ?>" readonly>
=======
        <input class="textbox-10" type="text" name="id" size="7" value="<?php echo $userid; ?>">
>>>>>>> Stashed changes
      </td>
    </tr>
    <tr>
      <td>
        Type of complaint
      </td>
    </tr>      
    <tr>
      <td>
        <select class="textbox-10" name="complainttype" class="form-control">
          <option value="Wrongly Assigned Research Area">Wrongly Assigned Research Area</option>
          <option value="Unsatisfied Expert's Feedback">Unsatisfied Expert's Feedback</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>
        Your complaint
      </td>
    </tr>      
    <tr>
      <td colspan="2">
        <textarea class="textbox-10" style="width: 100%;" name="description"><?php echo $desc;?></textarea>
      </td>
    </tr>
  </table>
  <input type="hidden" name="complain" value="<?php echo $complainid; ?>">

<<<<<<< Updated upstream
  <a><button class="button-81" type="submit">Update</button></a>
  <a><button class="button-81" type="reset">Reset</button></a>
=======
  <a><button class="button-81" type="submit">
    Update
  </button></a>
  <a><button class="button-81" type="reset">
  Reset
  </button></a>
>>>>>>> Stashed changes
  </form>
</div>
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