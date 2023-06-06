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

$row = mysqli_fetch_assoc($result);

	$iduser = $row["user_ID"];
	$type = $row["complaint_Type"];
	$desc = $row["complaint_Desc"];
	
?>	

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.div{
  margin-top: 10px;
  
}

footer {
  text-align: center;
  padding: 3px;
  background-color: #343434;
  color: white;
  height: 100px;
  display: block;
  position: fixed;
  bottom: 0;
  width: 100%;
}

.input{
    outline: none;
    box-shadow: 0px 0px 2px #18A0FB;
}



.topnav {
  overflow: hidden;
  background-color: none;
}

.topnav a {
  float: left;
  color: #18A0FB;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: none;
}

.topnav a.active {
  color: rgb(255, 0, 0);
}

.topnav .search-container {
  float: right;
  border-color: #18A0FB;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
  background-color: #18A0FB;
  color: white;
}

.topnav .search-container button:hover {
  background: #9ef2ff;
}
/*footer*/
.foot {
  overflow: hidden;
  background-color: #333;
}

.foot a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.foot a:hover {
  background-color: #868686;
  color: black;
}
</style>
</head>
<body>

<!-- HEADER -->
<div class="topnav">
  <a><img src="https://umplive.ump.edu.my/images/2020/07/26/logo-ump-transparent-blue__1122x561.png" style="width: 40px;"></a>
  <a href="#home" style="margin-left: 400px;">Home</a>
  <a href="#news">Your Post</a>
  <a class="active" href="/Complaint/User/">Complaint</a>
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
<h1>Make a complaint</h1>
<br>
<form method="post" action="Add_action.php">
  <table>
    <tr>
      <td>
        Name
      </td>
      <td>
        ID
      </td>
    </tr>
    <tr>
      <td>
        <input type="text" name="name" size="30">
      </td>
      <td>
        <input type="text" name="id" size="7" value="<?php echo $iduser; ?>">
      </td>
    </tr>
    <tr>
      <td>
        Type of complaint
      </td>
    </tr>      
    <tr>
      <td>
        <select name="complaint_type" value="<?php echo $type; ?>">
          <option value="" disabled selected>Select type of complaint</option>
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
        <textarea style="width: 100%;" name="description" value="<?php echo $desc; ?>"></textarea>
      </td>
    </tr>
  </table>

  <button type="submit" onsubmit="Add_action.php">
    Submit
  </button>
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