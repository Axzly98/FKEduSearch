<?php
$page = 'your post';
include 'header.php';
include 'footer.php';
?>

<!-- select maksudnya ambik data dari db -->

<?php
$link = mysqli_connect("localhost", "root") or die(mysqli_connect_error());
mysqli_select_db($link, "miniproject") or die(mysqli_error());

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

