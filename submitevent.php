<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Submit Event</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="wrap">

    <?php include("header.php"); ?>
	
	  
	<div id="main">
	<h3>Thank you for entering your information.</h3>
<?php
  $id = $_GET['tag'];
  include "db_connect.php";

  $name = $_POST['name'];
  $venue = $_POST['venue'];
  $band = $_POST['band'];
  $starts = $_POST['starts'] ;
  $end = $_POST['end'];
  $description = $_POST['description'];
  
  echo "Name: $name";
  echo "Venue: $venue";
  echo "Band: $band";
  echo "Starts: $starts";
  echo "Ends: $end";
  echo "Description: $description";
  
  
  
  $venuequery = "SELECT venueID FROM venue where NAME='$venue'"; 
  $venueResult = mysqli_query($db, $venuequery)
	or die("Error Querying Database: VenueID");
  $vRow = mysqli_fetch_array($venueResult);
  $venueID = $vRow[0];  
  
  $bandquery = "SELECT bandID FROM band where NAME='$band'";
  $bandResult = mysqli_query($db, $bandquery)
	or die("Error Querying Database: BandID");
  $bRow = mysqli_fetch_array($bandResult);
  $bandID = $bRow[0];  
  
  
  $eventquery = "INSERT INTO events (Name, venueID, bandID, Starts, Ends, Description) " . 
  		   "VALUES ('$name', '$venueID', '$bandID', '$Starts', '$Ends', '$Description')";
  echo $eventquery;
  $result = mysqli_query($db, $eventquery)
   or die("Error Querying Database: Inserting into events");
   
  echo "<p>Events On File:</p>";
  
  
  $query = "SELECT Name, venueID, bandID FROM events ORDER BY Name";
  
  $result = mysqli_query($db, $query)
   or die("Error Querying Database");
  
  echo "<table id=\"hor-minimalist-b\">\n<tr><th>Event Name</th><th>Venue</th><th>Band</th><tr>\n\n";
  
  while($row = mysqli_fetch_array($result)) {
  	$name = $row['Name'];
  	$venueID = $row['venueID'];
	
	$venuequery = "SELECT Name FROM venue where venueID='$venueID'"; 
	$venueResult = mysqli_query($db, $venuequery)
		or die("Error Querying Database: Venue");
	$vRow = mysqli_fetch_array($venueResult);
	$venue = $vRow[0];  

  	$bandID = $row['bandID'];
	$bandquery = "SELECT Name FROM band where bandID='$bandID'";
	$bandResult = mysqli_query($db, $bandquery)
		or die("Error Querying Database: BandID");
	$bRow = mysqli_fetch_array($bandResult);
	$band = $bRow[0];  
	
  	echo "<tr><td  >$name</td><td>$venue</td><td >$band</td></tr>\n";
  }
 echo "</table>\n"; 
  
  mysqli_close($db);
  
  
?>	
	
	</div>
	
	
   <?php include("sidebar.php"); ?>
</div>
</body>
</html>
