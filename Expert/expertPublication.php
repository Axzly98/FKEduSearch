<?php
$page = 'publication';
include 'headerExpert.php';
?>

   <div data-aos="fade" class="page-title">
          
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="expertHome.php">Home</a></li>
            <li>Publication</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->
	
	<style>
	
	.th{
		font-weight: bold;
		text-transform: uppercase;
		 width: auto;
		
	}
	

	
	  .publication-table {
    width: 100%;

	}
  
	</style>
	
	
	
													<!-- enctype utk file upload -->
	<form action="publicationAdd.php" method="post"  enctype="multipart/form-data">
	<table class="publication-table" border="0"> 
	
	<tr>
	<th class="th">Add Publication</th>  
	</tr>
	
	<tr>
	<td>.</td>
	</tr>
	
	<tr>
	<th class="th">Publication Title:</th>  
	<td> <input type="text" name="publicationTitle" style="width: 400px;" placeholder="Enter Publication Title"></td>
	<th class="th">Publication File:</th> 
	<td> <input type="file" name="publicationFile"></td>
	</tr>
	
	<tr>
	<th class="th">Publisher Name:</th>  
	<td> <input type="text" name="publisherName" placeholder="Enter Publisher Name" style="width: 340px;"></td>
	<td></td>
	<td></td> 
	</tr>
	
	
	<tr>
	<th class="th">Categories:</th>  
	<td><select name="publicationCategories">
	<option value="" selected align="center">-Select Categories-</option>
  <option value="Networking">Networking</option>
  <option value="Software Engineering">Software Engineering</option>
  <option value="Graphic and Multimedia">Graphic and Multimedia</option>
   <option value="Cyber Security">Cyber Security</option>
</select></td>
	</tr>
	
	
	<tr>
	<td></td>  
	<td></td>
	<td></td>
	<td> <input type="submit" style="background-color: #18A0FB; color: #FFFFFF; border-radius: 5px; width: 70px; height: 25px; font-size: 18px;" value="SAVE"></td> 
	
	
	</tr>
	
	</table>
	</form>
	
	
	

	<table class="publication-table" border="1"> 
	
		<tr>
	<th class="th">Lists of Publications</th>  
	</tr>
	
	<tr>
	</tr>
	

	
	
<?php
$link = mysqli_connect("localhost", "root") or die(mysqli_connect_error());
mysqli_select_db($link, "miniproject") or die(mysqli_error());

$query = "SELECT * FROM publication" or die(mysqli_connect_error());
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
    $numberIncrement = 1;
    ?>

    <table border="2" style="width: 100%;">
      	<tr>
	<th class="th">No. </th>  
	<th class="th">publication title</th> 
	<th class="th">publisher name</th> 
	<th class="th">categories</th> 
	<th class="th">date uploaded</th> 
	<th>       </th> 
	
	</tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr class="trlist">
                <td><?php echo $numberIncrement; ?></td>
                <td align="center"><?php echo $row['publicationTitle']; ?></td>
                <td align="center"><?php echo $row['publisherName']; ?></td>
                <td align="center"><?php echo $row['publicationType']; ?></td>
                <td align="center"><?php echo $row['publicationDate']; ?></td>
                <td class="th" align="center"><a href="uploads/<?php echo $row['publicationFile']; ?>" download>DOWNLOAD</a> <a href="publicationDelete.php?id=<?php echo $row['publication_ID']; ?>">DELETE</a>
				<?php // echo $row['publicationFile']; ?>
				
            </tr>
            <?php
            $numberIncrement++; // Increment the numberIncrement variable
        }
        ?>

    </table>

    <?php
} else {
    echo "No Data in Database -----";
}

?>

<br><br>	

<?php include 'footerExpert.php'; ?>