<?php
session_start();
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Awesome Music Watch</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<div id="wrap">
<body>

<?php
	include("header.php");

?>	

<div id="main">
	
	<?php
	include("db_connect.php");

	
	$dowant = $_POST['eventSearchBox'];

  
	
	
	$query = "SELECT * FROM events WHERE Name LIKE \"%$dowant%\"";	
	$result = mysqli_query($db, $query)
	  or die("<p>Error Querying Database<p>");
	
	echo "<p>You searched for events containing the word \"$dowant\"</p>";
	
	echo '<p><h3>Results:</h3></p>';
	
	
	echo "<table><tr><th>Event</th><th>Venue</th><th>Band</th><th>Starts</th><th>Ends</th><tr>\n\n";
  
	/*  while($row = mysqli_fetch_array($result)) {
	  	
		$name = $row['Name'];
		$venueID = $row['venueID'];
	
		$venuequery = "SELECT Name FROM venue where venueID = '$venueID'"; 
		$venueResult = mysqli_query($db, $venuequery)
			or die("Error Querying Database: VenueID");
		$vRow = mysqli_fetch_array($venueResult);
		$venue = $vRow[0];  

		$bandID = $row['bandID'];
		
		$bandquery = "SELECT Name FROM band where bandID='$bandID'";
		$bandResult = mysqli_query($db, $bandquery)
			or die("Error Querying Database: BandID");
		$bRow = mysqli_fetch_array($bandResult);
		$band = $bRow[0];  
  
  
		$Starts = $row['Starts'];
		$Ends = $row['Ends'];

		
      echo "<tr><td  >$name</td><td  >$venue</td><td ><a href=\"bandview.php?tag=$bandID\">$band</a></td><td>$Starts</td><td>$Ends</td></tr>\n";
  }*/

	$bandquery = "SELECT events.Name AS eventName, band.Name AS bandName, venue.Name AS venueName, events.Starts, events.Ends FROM events INNER JOIN band ON events.bandID = band.bandID INNER JOIN venue ON events.venueID = venue.venueID where band.Name LIKE \"%$dowant%\" OR events.Name LIKE \"%$dowant%\" OR venue.Name LIKE \"%$dowant%\"";  
	$result2 = mysqli_query($db, $bandquery)
	  or die("<p>Error Querying Database<p>");
	
	while($row2 = mysqli_fetch_array($result2)) {
	  	
		$name = $row2['eventName'];
		$venue = $row2['venueName'];
		$band = $row2['bandName'];
  
		$Starts = $row2['Starts'];
		$Ends = $row2['Ends'];

		
      echo "<tr><td  >$name</td><td  >$venue</td><td ><a href=\"bandview.php?tag=$bandID\">$band</a></td><td>$Starts</td><td>$Ends</td></tr>\n";
  }	
	  
	echo "</table>\n"; 
	
	
	?>
	
	
</div>

<?php
	include("sidebar.php");
	
?>


</body>
</div>
</html>
