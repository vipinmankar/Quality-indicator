
<?php 

require "database.php";
    session_start ();
     $session_name = "user";

 if (!isset ($_SESSION[$session_name]) || $_SESSION[$session_name] == "") {
        echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
    }
  $query = "SELECT  `level`,`dataenter` FROM `citylist`  WHERE cityid = ".$_SESSION['lang']. "";
$result = mysqli_query(	$conn, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ level:'".$row[0]."', date:".$row[1]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>
 
 
<!DOCTYPE html>
<html>
 <head>
  <title>Daily  </title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
       
  <br /><br />
  <div class="container" style="width:900px;">
   
   <h3 align="center">Last month air qualilty Data</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>
 
<script>

Morris.Line({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'date',
 ykeys:['level'],
 labels:['level'],
 hideHover:'auto',
 stacked:true,
xLabels:['day']


    
});

</script>
