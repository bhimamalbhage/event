<?php
	$conn = mysqli_connect("localhost","root","","myevents");
	if(!isset($conn))
	{
		die("Connection Unsuccessful");
	}
	mysqli_set_charset($conn,"utf8");
?>