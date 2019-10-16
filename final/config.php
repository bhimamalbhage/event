<?php
//	session_start();
	include "connect.php";
$t="";
$m="";
GLOBAL $i;

  if(isset($_GET['lang']))//if in url lang is set ex: lang=hr then do following
  {
    $ln=$_GET['lang'];
     $sql = "SELECT * FROM language WHERE lang='$ln'";//select all data for that lang from database
  $result = $conn->query($sql);

      if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { 
  $GLOBALS['t']=$row["title"];//store title data in t
 $GLOBALS['m']=$row["menu"];//store menu data in m
  $i=explode(",",$m);//as menus in database are stored with commas here seperate those commas and store in i
    }
} else {//if no data in database then echo 0 results
    echo "0 results";
}
  }
  else //if lang is not set in url then do following i.e. set lang=en
  {
    $sql = "SELECT * FROM language WHERE lang='en'";//select all data for english lang from database
  $result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
  $GLOBALS['t']=$row["title"];
 $GLOBALS['m']=$row["menu"];
  $i=explode(",",$m);
    }
} else {
    echo "0 results";
}
  }

?>