<?php 
  include 'config.php';
GLOBAL $d;
  if(!isset($_GET['lang']))//if lang is not set then make it english
  {
    $_GET['lang']='en';
   // $_SESSION['lang']='en';
    $x='en';
  }
  else {//else get lang from url
    $lg=$_GET['lang'];
   if($lg=="hr")
   {
    die("You can't access this page<br><a href='index.php'>Home</a>");
    
   }
    $_SESSION['lang']=$lg;
    $x=$_GET['lang'];
   
    $sql = "SELECT * FROM language WHERE lang='$lg'";//select all data for that language
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    
  $dl=$row["daylist"];//store daylist
   $d=explode("|",$dl);
 
    }
  }
    }
    $_SESSION['days']=$d;
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="cal.css">
</head>
<body>
  <!-- Include calender functions -->
	<?php include_once('calfunctions.php'); ?>

	
		  <div id="calendar_div">

   <?php
   // call getCalendar function
    echo getCalender($year = '',$month = '',$x); ?>
</div>
	

</body>
</html>