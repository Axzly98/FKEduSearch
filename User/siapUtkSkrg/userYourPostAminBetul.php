<?php
$page = 'your post';
include 'header.php';
include 'footer.php';
?>

<!-- BS5 
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col">Username1</div>
                <div class="col">Category</div>
                <div class="col">Post Date</div>
                <div class="col">Status Post</div>
            </div>
        </div>
        <div class="card-body">
            <h3>Title</h3>
            <br>
            <p>Blockchain is having.......</p>
        </div>
        <hr>
        <div class="card-body">
            <br>
            <p style="width: 100%;">Hi Username1, thanks for asking...</p>
        </div>
        <hr>
        <div class="card-body">
            <div>
                <a href="">Like</a>
                <a class="ms-5" href="">Comment</a>
            </div>
        </div>
        
        
    </div>
</div>

-->
<!-- select maksudnya ambik data dari db -->

<?php
$link = mysqli_connect("localhost", "root") or die(mysqli_connect_error());
mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

$query = "SELECT * FROM post" or die(mysqli_connect_error());
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
    $numberIncrement = 1;
    ?>

    <table border="2" style="width: 100%;">
      	<tr>
	<th class="thlist">No. </th>  
    <th class="thlist">Category:</th> 
	<th class="thlist">Post Title:</th> 
	<th class="thlist">Post Question: </th>
    <th class="thlist">Post Date Created:</th>  
		<th class="thlist">Total Likes: </th> 
			<th class="thlist">Total Comments: </th> 

	
	</tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr class="trlist">
                <td><?php echo $numberIncrement; ?></td>
                <td><?php echo $row['post_categories']; ?></td>
                <td><?php echo $row['post_title']; ?></td>
                <td><?php echo $row['post_content']; ?></td>
                <td><?php echo $row['post_createdDate']; ?></td>
<td>
		
				
            </tr>
            <?php
            $numberIncrement++; // Increment the numberIncrement variable
        }

        
        ?>

    </table>
    
    <div class="addContainer">
    <a href="/FKEduSearch/User/siapUtkSkrg/addPostUIAminBetul.php">ADD</a>
    </div>
    <?php
} else {
    echo "No Data in Database -----";
}
?>








<?php include 'footer.php'; ?>

