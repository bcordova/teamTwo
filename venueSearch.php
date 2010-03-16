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

<div id='main'>
	
	<?php
	include("db_connect.php");

	
	$dowant = $_POST['venuesearchbox'];
	
	$query = "SELECT * FROM venue WHERE name LIKE '$dowant%' OR city LIKE '$dowant%' OR state LIKE '$dowant%' OR zip LIKE '$dowant%' OR address LIKE '$dowant%'";
	
	$result = mysqli_query($db, $query)
	  or die("<p>Error Querying Database<p>");
	
	echo "<p>You searched for Venues containing the word \"$dowant.\"</p>";
	
	echo '<p><h3>Results:</h3></p>';
	
	
	echo "<table><tr><th>Name</th><th>City</th><th>State</th><th>Address</th><tr>\n\n";
  
	  while($row = mysqli_fetch_array($result)) {
	  
	  
		$name = $row['Name'];
		$cityname = $row['City'];
		$state = $row['State'];
		$address = $row['Address'];
		
		echo "<tr><td  ><a href=\"venueShows.php?id=$id\">$name</a></td><td  >$cityname</td><td >$state</td><td>$address</td></tr>\n";
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