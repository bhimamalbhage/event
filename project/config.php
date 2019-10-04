<?php
	session_start();
	include "connect.php";
$t="";
$m="";
GLOBAL $i;


  if(isset($_GET['lang']))
  {
    $ln=$_GET['lang'];
     $sql = "SELECT * FROM language WHERE lang='$ln'";
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
  else
  {
    $sql = "SELECT * FROM language WHERE lang='en'";
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