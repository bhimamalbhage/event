<?php
if(!isset($_GET['lang']))
	{
		$_GET['lang']='en';
		$_SESSION['l']=$_GET['lang'];
	}
	elseif (isset($_GET['lang'])) {
		$_SESSION['l']=$_GET['lang'];
	}
?>

