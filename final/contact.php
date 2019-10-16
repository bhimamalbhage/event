<?php
include "config.php";
	include "cond.php";
	 $lang=$_SESSION['l'];

if(isset($_POST['submail'])) {
 
    // EDIT THE 2 LINES BELOW 
    $email_to = "youremail";
    $email_subject = "Your email subject line";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['mob']) ||
        !isset($_POST['email']) ||
        !isset($_POST['comment'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $first_name = $_POST['name']; // required
    $mob = $_POST['mob']; // required
    $email_from = $_POST['email']; // required
    $comments = $_POST['comment']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($mob)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  

 
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
	
<style type="text/css">



</style>

</head>
<body style="background-color: #1f2024; color: white;">

<?php include 'header.php';?>

<section>

	<div class="container">
		<div class="contact-box">
			<h1 class="text-center">Contact Us</h1>
			<form action="contact.php" method="post">
			<div class="row field">
				<div class="col-md-3 col-4" style="">&nbsp;&nbsp;&nbsp;Name:</div>
				<div class="col-md-9 col-8" >
					<input type="text" name="name" class="form-control" style="width: 90%;" required="true">
				</div>
			</div>
			<div class="row field">
				<div class="col-md-3 col-4" style="">&nbsp;&nbsp;&nbsp;Mobile No:</div>
				<div class="col-md-9 col-8" >
					<input type="number" name="mob" class="form-control" style="width: 90%;" required="true">
				</div>
			</div>
			<div class="row field">
				<div class="col-md-3 col-4" style="">&nbsp;&nbsp;&nbsp;Email:</div>
				<div class="col-md-9 col-8" >
					<input type="email" name="email" class="form-control" style="width: 90%;" required="true">
				</div>
			</div>
			<div class="row field">
				<div class="col-md-3 col-4" style="">&nbsp;&nbsp;&nbsp;Comment:</div>
				<div class="col-md-9 col-8" >
					<textarea class="form-control" name="comment" rows="4" style="width: 90%;" required="true"></textarea>
				</div>
			</div>
						<div class="row field">
				<div class="col-md-2 col-4"></div>
				<div class="col-md-10 col-8" >
					<input type="Submit" name="submail" value="Submit" class="btn btn-primary">	
				</div>
			</div>

			</form>
		</div>
	</div>

</section>


</body>
</html>