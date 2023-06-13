<?php
session_start();


$page = 'home';
include 'headerExpert.php';
?>

<?php
$link = mysqli_connect("localhost", "root") or die(mysqli_connect_error());
mysqli_select_db($link, "miniproject") or die(mysqli_error());

$query = "SELECT COUNT(*) as total FROM publication";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
$totalPublications = $row['total'];

// Untuk dapatkan total rating value for expert_ID = 200
$queryRating = "SELECT SUM(rating_value) AS total_rating, COUNT(*) AS rating_count FROM rating WHERE expert_ID = 200";
$result = mysqli_query($link, $queryRating);
$row = mysqli_fetch_assoc($result);
$rating_sum = $row['total_rating'];
$rating_count = $row['rating_count'];

// Kira average ratings
$average_rating = ($rating_count > 0) ? ($rating_sum / $rating_count) : 0;
?>

<!DOCTYPE html>
<html>

<head>
  <style>
   .publicationChart {
  width: 50%;
  height: 400px;
  margin-bottom: 50px;
  margin-left: auto;
  margin-right: 0;
  
}

  </style>
</head>

<body>



<h1 style="margin-left: 20%;">Summary</h1>

<table border="1" style="margin-left: 15%">

<tr>
<th>Display Academic Details (Expert) Sini</th>
<tr>

<tr>
<td align="center">"List Academic Details"</td>

</tr>

</table>



<br><br>
				

  <!-- Guna <div> element for the chart -->
  <div class="publicationChart" style="width: 50%; height: 400px; margin-bottom: 50px;"></div>
			
				
  <!-- Gune Highcharts library...boleh cari dari google -->
  <script src="https://code.highcharts.com/highcharts.js"></script>



  <!-- Gune JavaScript code to create the bar chart -->
<script>
  // guna name variable container ..untuk dapatkan .publicationChart dari atas.....
  var container = document.querySelector('.publicationChart');

  // Buat bar chart gune Highcharts
  Highcharts.chart(container, {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Total Publications and Ratings'
    },
    xAxis: {
      categories: ['']
    },
    yAxis: {
      title: {
        text: ''
      }
    },
   series: [{
      name: 'Publications',
      data: [{
        y: <?php echo $totalPublications; ?>,
        dataLabels: {
          enabled: true,
          format: 'Total Publications: <?php echo $totalPublications; ?>'
        }
      }],
      color: 'rgba(75, 192, 192, 0.8)'
    }, {
      name: 'Total Ratings',
      data: [{
        y: <?php echo $rating_sum; ?>,
        dataLabels: {
          enabled: true,
          format: 'Total Ratings: <?php echo $rating_sum; ?>'
        }
      }],
      color: 'rgba(192, 75, 75, 0.8)'
    }, {
      name: 'Average Ratings',
      data: [{
        y: <?php echo $average_rating; ?>,
        dataLabels: {
          enabled: true,
          format: 'Average Ratings: <?php echo $average_rating; ?>'
        }
      }],
      color: 'turquoise'
    }],
    plotOptions: {
      column: {
        pointWidth: 30 // Adjust width bar chart 
      }
    }
  });
</script>

</body>

</html>

<?php include 'footerExpert.php'; ?>
