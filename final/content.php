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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="text/javascript">
  /*Scroll to top when arrow up clicked BEGIN*/
$(window).scroll(function() {
    var height = $(window).scrollTop();
    if (height > 100) {
        $('#back2Top').fadeIn();
    } else {
        $('#back2Top').fadeOut();
    }
});
$(document).ready(function() {
    $("#back2Top").click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});
 /*Scroll to top when arrow up clicked END*/
</script>

</head>
<body>


    <section id="slider">
      
<!-- Carousel is bootstrap class for slide image gallery -->
<!-- Data interval  is time of sliding here it is 5000 ms -->
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
      <img src="images/a.jpg" alt="Los Angeles" >
    </div>
    <div class="carousel-item">
      <img src="images/b.jpg" alt="Chicago" >
    </div>
    <div class="carousel-item">
      <img src="images/c.jpg" alt="New York">
    </div>
    <div class="carousel-item">
      <img src="images/d.jpg" alt="New York">
    </div>
    <div class="carousel-item">
      <img src="images/f.jpg" alt="New York">
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
<!-- include header (navigation menu) -->
    <?php include 'header.php';?>

<section id="mainpage">
	<div class="row">
		<div class="col-lg-8 col-md-12 col-sm-12" >
    <div style="margin-top: 100px;">
	<h2 class="text-center">
		<?php echo $t; ?>
	</h2>
	</div>
	</div>
	<div class="col-lg-4 col-md-12 col-sm-12" >
		<section id="handles">
			
			<div class="icon-bar">
			  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
			  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
			  <a href="#" class="google"><i class="fa fa-google"></i></a>
			  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
			  <a href="#" class="youtube"><i class="fa fa-youtube"></i></a>
			</div>

		</section>
		<section id="smallcal">
      <!-- include smallcalender -->
		<?php include 'smallcal.php'?>
		</section>
	</div>
	</div>
</section>

<section id="footer">
  <div class="fplace">
    <div class="row">
      <div class="col-lg-7">
       
      </div>
      <div class="col-lg-5" class="map" style="padding-top: 50px;">

        <!-- Following code is for map API -->

   <div class="mapouter"><div class="gmap_canvas"><iframe width="450" height="250" id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/blog/best-wordpress-themes/"></a></div><style></style></div>
    </div>

  </div>
  </div>
</section>
<!-- Following is scroll to top button -->
<a id="back2Top" title="Back to top" href="#">&#10148;</a>


	</body>
</html>