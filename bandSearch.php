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

	
	$dowant = $_POST['bandsearchbox'];

	
	$query = "SELECT * FROM band WHERE name LIKE '$dowant%' OR genre LIKE '$dowant%' OR year_started LIKE '$dowant%' OR labels LIKE '$dowant%' OR website LIKE '$dowant%' OR members LIKE '$dowant%' OR description LIKE '$dowant%'";
	
	
	$result = mysqli_query($db, $query)
	  or die("<p>Error Querying Database<p>");
	
	echo "<p>You searched for bands containing the word \"$dowant.\"</p>";
	
	echo '<p><h3>Results:</h3></p>';
	
	
	echo "<table><tr><th>Name</th><th>Genre</th><th>Year Started</th><th>Labels</th><th>Website</th><th>Members</th><th>Description</th><tr>\n\n";
  
	  while($row = mysqli_fetch_array($result)) {
	  
		$name = $row['name'];
		$genre = $row['genre'];
		$year_started = $row['year_started'];
		$labels = $row['labels'];
		$website = $row['website'];
		$members = $row['members'];
		$description = $row['description'];
		
		echo "<tr><td  >$name</td><td  >$genre</td><td >$year_started</td><td>$labels</td><td>$website</td><td>$members</td><td>$description</td></tr>\n";
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