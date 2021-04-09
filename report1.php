<?php 
session_start();
include("header.php");
$connect = mysqli_connect("localhost", "root", "", "hms");
$query = "SELECT year_discharge as year_discharge , SUM(amount_paid) as amount_paid FROM income GROUP BY year_discharge";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{year_discharge:'".$row["year_discharge"]."',amount_paid:".$row["amount_paid"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>


<!DOCTYPE html>
<html>
 <head>
  <title>HMS Report</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Report</h2>
   <h3 align="center">Year vs Total Gain</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'year_discharge',
 ykeys:['amount_paid'],
 labels:['amount_paid'],
 hideHover:'auto',
 stacked:true
});
</script>