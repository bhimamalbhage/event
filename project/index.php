<?php
	include "config.php";
	include "cond.php";
	$lang=$_SESSION['l'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Event Management</title>


	<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
     height: 100px;
  }
  </style>

</head>
<body>

    <section id="slider">
      

<div id="demo" class="carousel slide" data-ride="carousel" data-interval="5000">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
    <li data-target="#demo" data-slide-to="4"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="a.jpg" alt="Los Angeles" >
    </div>
    <div class="carousel-item">
      <img src="b.jpg" alt="Chicago" >
    </div>
    <div class="carousel-item">
      <img src="c.jpg" alt="New York">
    </div>
    <div class="carousel-item">
      <img src="d.jpg" alt="New York">
    </div>
    <div class="carousel-item">
      <img src="f.jpg" alt="New York">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

    </section>

    <?php include 'header.php';?>

<section id="home-page" style="margin-top: 100px;margin-bottom: 50px;">
	<div class="container">
		<div class="row">
			<div class="col-md-3"><a href="index.php?lang=en"><img src="images/usa.png" width="250px"></a></div>
			<div class="col-md-3"><a href="index.php?lang=hr"><img src="images/hungary.png" width="250px" ></a></div>
			<div class="col-md-3"><a href="index.php?lang=gr"><img src="images/germany.png" width="250px"></a></div>
			<div class="col-md-3"><a href="index.php?lang=en"><img src="images/poland.png" width="250px"></a></div>
		</div>
	</div>
</section>

	<h2 class="text-center">
		<?php echo $t; ?>
	</h2>
	
	</body>
</html>