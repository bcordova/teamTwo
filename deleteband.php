<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Awesome Music Watch</title>
  <link rel="stylesheet" type="text/css" href="style.css" />

 </HEAD>
<div id="wrap">
 <BODY>
 <?php include("header.php"); ?>
 <div id="main">

 <?php

  $id = $_GET['tag'];
?>
<?php
	include("db_connect.php");
	
	$query = "delete from band where bandID like '$id'";

	$result = mysqli_query($db, $query)
	  or die("Error querying Database");
	
  echo "<p>The band was successfully removed.</p>";
  
  
  $query = "SELECT bandID, Name, Genre, website FROM band ORDER BY Year_Started";
  
  $result = mysqli_query($db, $query)
   or die("Error Querying Database");
  
  echo "<table id=\"hor-minimalist-b\">\n<tr><th>Band Name</th><th>Genre</th><th>Website</th><tr>\n\n";
  
  while($row = mysqli_fetch_array($result)) {
	$id = $row['bandID'];
  	$name = $row['Name'];
  	$genre = $row['Genre'];
  	$url = $row['website'];
  	echo "<tr><td  ><a href=\"bandview.php?tag=$id\">$name</a></td><td>$genre</td><td ><a href=\"$url\">$url</a></td></tr>\n";
  }
 echo "</table>\n"; 
  
  mysqli_close($db);
  
  
?>	


</div>
<?php include("sidebar.php"); ?>
</div>
 </BODY>
</HTML>
