<?php
include "config.php";
	include "cond.php";
	 $lang=$_SESSION['l'];

if(isset($_POST['subforum']))//if subforum button is clicked then do following
{
	$name=$_POST['name'];//extract name field and store in $name
	$comment=mysqli_escape_string($conn,$_POST['comment']);//extract comment field and store in $comment
	$date=date("d/m/Y");//store current date, date('d/m/y') is function for date

	  $sql = "INSERT INTO forum (name, date,comment)
VALUES ('$name', '$date','$comment')";//insert these details in forum table
 
 	if ($conn->query($sql) === TRUE) {//if inserting is successfull
    echo "<script>
    alert('Succesfully Added');
    </script>"; //then popup that successfully added.
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<title>Guestbook</title>

<style type="text/css">

@media only screen and (max-width: 600px) {
  .forum-box {
    width: 400px !important;
  }
}

</style>

</head>
<body style="background-color: #1f2024;color: white;">
<!-- include header (menubar) -->
<?php include 'header.php';?>

<section>

	<div class="container">
		<div class="forum-box">
			<h1 class="text-center">Guestbook</h1>
			<form action="forum.php" method="post">
			<div class="row field">
				<div class="col-md-2 col-4" style="">&nbsp;&nbsp;&nbsp;Name:</div>
				<div class="col-md-10 col-8" >
					<input type="text" name="name" class="form-control" style="width: 90%;" required="true">
				</div>
			</div>
			<div class="row field">
				<div class="col-md-2 col-4" style="">&nbsp;&nbsp;&nbsp;Comment:</div>
				<div class="col-md-10 col-8" >
					<textarea class="form-control" name="comment" rows="8" style="width: 90%;" required="true"></textarea>
				</div>
			</div>
						<div class="row field">
				<div class="col-md-2 col-4" style=""></div>
				<div class="col-md-10 col-8" >
					<!-- Button when clicked form is submitted -->
					<input type="Submit" name="subforum" value="Submit" class="btn btn-primary">

				</div>
			</div>

			</form>
		</div>
	</div>

</section>

<section id="forum-bottom">
	
	<div class="container">
		
		<h1>Recent</h1>
		<br>
		<div class="flist">
			<ul>
				<?php
				//Query for selecting id,name,date comment from table by descending oreder
					$sql = "SELECT id,name, date,comment FROM forum ORDER BY date DESC, id DESC";

					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					    ?>
					    <!-- Print those name,comment in respective list -->
			<li><h4><?php echo $row['name']; ?><span style="font-size: 16px;margin-left: 30px;"> <?php echo $row['date']; ?> </span></h4>
					<p><?php echo $row['comment']; ?></p>
				</li>
				<hr>
					    <?php
					    }
					} else {
					    echo "0 results";
					}

				?>

			
				
			</ul>
		</div>

	</div>

</section>

</body>
</html>