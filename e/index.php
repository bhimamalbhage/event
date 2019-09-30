<?php 
// Include calendar helper functions 
include_once 'functions.php'; 
include 'dbconfig.php';//Include database connection file
?>
<!DOCTYPE html>
<html>
<head>
  <title>Event Calendar</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css"> <!-- Css File link --> 
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>


<section id="calendar" style="">

    
      <div class="container" style="margin-bottom: 50px;">
        
          <h1 class="head">Event Calendar</h1>
          
          <div id="calendar_div">

  <?php echo getCalender(); ?> <!-- Call to function getCalender() from functions.php which will load whole calendar -->

        </div>

  </div>

</section>

<section>
  <div class="container">
    <h1 class="text-center">Upcoming Events</h1>
    
<br>

<?php
 // include 'dbConfig.php'; // include database connection

  $result = $db->query("SELECT * FROM events WHERE status = 1 ORDER BY date DESC"); //query to get events by ascending order of date
  if($result->num_rows > 0){

?>

<div style="display: table;margin: 0 auto;">
<ul >
<?php

    while($row = $result->fetch_assoc()){ 
    	$id="b".$row['id'];
    	$dots="dots".$row['id'];
    	$more="more".$row['id'];
      ?>


      	<li style="padding: 20px; margin-bottom: 20px !important;" id="<?php echo $row['id']; ?>" >
       <h4><?php echo strtoupper($row['title']) ?></h4>              
     
      <span id="<?php echo $dots;?>"></span><span id="<?php echo $more;?>" style="display: none;">
      Date: <?php echo $row['date']; ?><br>
      Venue: <?php echo $row['venue']; ?>
      </span>
<p><button class="btn btn-link " onclick="myFunction(<?php echo $row['id']; ?>)" id="<?php echo $id;?>" >Read more</button></p>

 </li>

    
      <?php

    }

  }
?>
</ul>
</div>
 

   </div>

</section>


<script>
function myFunction(x) {
	var d="dots".concat(x);
	var m="more".concat(x);
	var b="b".concat(x);
		
  var dots = document.getElementById(d);
  var moreText = document.getElementById(m);
  var btnText = document.getElementById(b);

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>

</body>
</html>