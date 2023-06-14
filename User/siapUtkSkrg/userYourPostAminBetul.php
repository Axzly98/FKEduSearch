<?php
$page = 'post';
include 'headerUser.php';

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
    <th class="thlist">Category</th> 
	<th class="thlist">Post Title</th> 
	<th class="thlist">Post Question </th>
    <th class="thlist">Post Date Created</th>  
	<th class="thlist">Total Likes </th> 
	<th class="thlist">Total Comments </th> 

	
	</tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $numberIncrement; ?></td>
                <td align="center"><?php echo $row['post_categories']; ?></td>
                <td align="center"><?php echo $row['post_title']; ?></td>
                <td><?php echo $row['post_content']; ?></td>
                <td align="center"><?php echo $row['post_createdDate']; ?></td>
				 <td align="center"><?php echo $row['post_likes']; ?></td>	
            </tr>
            <?php
            $numberIncrement++; // Increment the numberIncrement variable
        }

        
        ?>

</table>

    <div class="addContainer">
    <a href="addPostUIAminBetul.php">ADD</a>
    </div>
    <?php
} else {
    echo "No Data in Database -----";
}
?>

<br><br>

<h3 align="center"> TOTAL NUMBER OF POSTS BASED ON POST CATEGORIES BASED ON CREATED DATE </h3>
<br>

<!--UNTUK DISPLAY TOTAL NUMBER OF POSTS BASED ON POST CATEGORIES BASED ON DATE-->

<?php
$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

// SQL Statement to fetch the total number of posts by post_categories and post_createdDate
$query = "SELECT post_categories, post_createdDate, COUNT(*) AS totalPosts 
          FROM post 
          GROUP BY post_categories, post_createdDate";

$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
    $numberIncrement = 1;
    ?>

    <table border="0" style="width: 100%;">
        <tr>
            <th class="th">No. </th>  
            <th class="th">Post Categories</th>
            <th class="th">Post Created Date</th>
            <th class="th">Total Posts</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td align="center"><?php echo $numberIncrement; ?></td>
                <td align="center"><?php echo $row['post_categories']; ?></td>
                <td align="center"><?php echo $row['post_createdDate']; ?></td>
                <td align="center"><?php echo $row['totalPosts']; ?></td>
            </tr>
            <?php
            $numberIncrement++;
        }
        ?>

    </table>

    <?php
} else {
    echo "No Data in Database -----";
}

// Close the database connection
mysqli_close($link);
?>

<br><br>
<br><br>

  <style>
  .publicationChart {
  width: 50%;
  height: 400px;
  margin: 0 auto; /* This will center the element horizontally */
  margin-bottom: 50px;
}

  </style>






<!-- Untuk display Bar Chart --> 
<div class="publicationChart" style="width: 50%; height: 400px; margin-bottom: 50px;"></div>


<!-- Include Highcharts library -->
<script src="https://code.highcharts.com/highcharts.js"></script>

<!-- JavaScript code to create the bar chart -->
<script>
  // PHP code to fetch the data from the database
  <?php
  $link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
  mysqli_select_db($link, "miniproject") or die(mysqli_error($link));

  $query = "SELECT post_createdDate, COUNT(*) AS totalPosts 
            FROM post 
            GROUP BY post_createdDate";

  $result = mysqli_query($link, $query);

  $data = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = array(
      'date' => $row['post_createdDate'],
      'totalPosts' => (int) $row['totalPosts']
    );
  }

  // Convert PHP data to JavaScript array
  $jsData = json_encode($data);
  ?>

  // JavaScript code to create the Highcharts bar chart
  var data = <?php echo $jsData; ?>;

  var container = document.querySelector('.publicationChart');

  Highcharts.chart(container, {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Total Number of Posts Based on Created Date'
    },
    xAxis: {
      categories: data.map(function(item) {
        return item.date;
      })
    },
    yAxis: {
      title: {
        text: 'Total Posts'
      }
    },
	
	/* syntax assign color mula dari sini
	series: [{
  name: 'Posts',
  data: data.map(function(item) {
    return {
      y: item.totalPosts,
      color: item.date === '2023-06-13' ? 'yellow' : (item.date === '2023-06-04' ? 'green' : (item.date === '2023-06-02' ? 'purple'	: '' )) // Untuk assign color kepada specific date
    };
  }),
   smpai sini */
	
   // sini syntax --> kalo tak nak assign color,,,system akan assign automatic
	  series: [{
      name: 'Posts',
      data: data.map(function(item) {
        return item.totalPosts;
      }),
       colorByPoint: true, // Set color by point...Yang ni, system akan assign sendiri color untuk setiap bar chart 
	// SYNTAX sampai sini
	 
      dataLabels: {
        enabled: true,
        format: '{point.y}'
      }
    }],
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    }
  });
</script>










<?php

include 'footerUser.php';

?>

