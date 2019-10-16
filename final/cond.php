<?php
if(!isset($_GET['lang']))//in url if lang is not set then set it as english by default
	{
		$_GET['lang']='en';
		$_SESSION['l']=$_GET['lang'];
	}
	elseif (isset($_GET['lang'])) { //else if it  is set then use that language
		$_SESSION['l']=$_GET['lang'];
	}
?>

