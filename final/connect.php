<?php
	$conn = mysqli_connect("localhost","root","","myevents");//Connection with database , myevents is database name 

	if(!isset($conn))//if connection not set i.e not established
	{
		die("Connection Unsuccessful");
	}
	mysqli_set_charset($conn,"utf8");//setting character set utf8
?>