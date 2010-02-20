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

	<h2>Welcome to the Awesome Music Watch!</h2>
	
	<div id = 'artist'>
		<h3>Featured Artist Section</h3>
	
<?php
	include("db_connect.php");
	
	$query = "select Name, Genre, website, members, Year_Started from band ORDER BY RAND() LIMIT 1";
	$result = mysqli_query($db, $query)
	  or die("Error querying Database");
	
	$row = mysqli_fetch_array($result);
	$bandName = $row['Name'];
	$bandGenre = $row['Genre'];
	$estDate = $row['Year_Started'];
	$website = $row['website'];
	
	echo "<h4><em>$bandName</em></h4>";
	echo "<p><h5>Established:</h5> $estDate</p>";
	echo "<p><h5>Genres:</h5>$bandGenre</p>";
	echo "<p><h5>Website:</h5><a href=\"$website\">$website</a></p>";
	
	
	mysqli_close($db);

?>
	
	</div>
	
	<div id = 'venue'>
		<h3>Featured Venue Section</h3>
	
	
	
<?php
	include("db_connect.php");
	
	$query = "SELECT Name, City, State, zip, Address FROM venue ORDER BY RAND() LIMIT 1";
	$result = mysqli_query($db, $query)
		or die("Error querying Database");
		
	$row = mysqli_fetch_array($result);
	$venueName = $row['Name'];
	$venueCity = $row['City'];
	$venueState = $row['State'];
	$venuezip = $row['zip'];
	$venueAddress = $row['Address'];
	
	echo "<h4><em>$venueName</em></h4>";
	echo "<p><h5>Address:</h5> $venueAddress<br>$venueCity, $venueState</p>";
	
	
?>
	</div>
	
</div>

<?php
	include("sidebar.php");
	
?>

</div>
</body>
</html>