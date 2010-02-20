<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Add Band</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="wrap">

    <?php include("header.php"); ?>
	
	  
	<div id="main">
	
<?php

  include "db_connect.php";

  $name = $_POST['name'];
  $genre = $_POST['genre'];
  $whenformed = $_POST['year'];
  $labels = $_POST['labels'] ;
  $url = $_POST['website'];
  $bandmembers = $_POST['members'];


  echo "<p>Thanks for submitting the form.</p>";
  
  
  $query = "INSERT INTO band (Name, Genre, Year_Started, labels, website, members) " . 
  		   "VALUES ('$name', '$genre', '$whenformed', '$labels', '$url', '$bandmembers')";
  
  $result = mysqli_query($db, $query)
   or die("Error Querying Database");
   
   
  echo "<h1>Current Bands On File</h1>";
  
  
  $query = "SELECT Name, Genre, website FROM band ORDER BY Year_Started";
  
  $result = mysqli_query($db, $query)
   or die("Error Querying Database");
  
  echo "<table id=\"hor-minimalist-b\">\n<tr><th>Band Name</th><th>Genre</th><th>Website</th><tr>\n\n";
  
  while($row = mysqli_fetch_array($result)) {
  	$name = $row['Name'];
  	$genre = $row['Genre'];
  	$url = $row['website'];
  	echo "<tr><td  >$name</td><td>$genre</td><td >$url</td></tr>\n";
  }
 echo "</table>\n"; 
  
  mysqli_close($db);
  
  
?>	
	
	</div>
	
	
   <?php include("sidebar.php"); ?>

	<div id="footer"><p>Remastered by Benjamin Cordova</p></div>
</div>
</body>
</html>
