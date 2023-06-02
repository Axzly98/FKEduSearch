<?php

include 'header.php';
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
		
	}
	
	  .publication-table {
    width: 100%;

	}
  
	</style>
	
	<form action="publicationAdd.php" method="post">  
	<table class="publication-table" border="1"> 
	
	<tr>
	<th class="th">Add Publication</th>  
	</tr>
	
	<tr>
	<td>.</td>
	<td></td>
	</tr>
	
	<tr>
	<th class="th">Publication Title:</th>  
	<td> <input type="text" name="publicationTitle" style="width: 400px;" placeholder="Enter Publication Title"></td>
	<th class="th">Publication File:</th> 
	<td> <input type="file" name="publicationFile"></td>
	</tr>
	
	<tr>
	<th class="th">Publisher Name:</th>  
	<td> <input type="text" name="publicationName" placeholder="Enter Publisher Name" style="width: 340px;"></td>
	<td></td>
	<td></td> 
	</tr>
	
	
	<tr>
	<th class="th">Categories:</th>  
	<td><select name="publicationCategories">
	<option value="" selected align="center">-Select Categories-</option>
  <option value="option1">Networking</option>
  <option value="option2">Software Engineering</option>
  <option value="option3">Graphic and Multimedia</option>
   <option value="option4">Cyber Security</option>
</select></td>
	</tr>
	
	
	<tr>
	<td></td>  
	<td></td>
	<td></td>
	<td> <input type="button" type="submit" style="background-color: #18A0FB; color: #FFFFFF" value="SAVE"></td> 
	
	
	</tr>
	
	</table>
	
	<br><br>
	php belom buat...sini SQL statement --> insert(add), select * (view) dgn delete (dkt button delete dkt display table kat bwh)
	<br><br>
	display publication yg dh upload kat bawah,, buat table -->  display..no. title, publisher name, categories, date uploaded, (1 table data --> ada download dgn delete button utk file)
	<br><br>
	page ni utk skrg, ada insert, delete .... part yg belom buat --> update 

	
	
	
	
	
	
<?php include 'footer.php'; ?>