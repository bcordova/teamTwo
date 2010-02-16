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
		<h4>Featured Artist Section</h4>
	
<?php
	include("db_connect.php");
	
	$query = "select Name, Genre, website, members, Year_Started from band ORDER BY RAND() LIMIT 1";
	$result = mysqli_query($db, $query)
	  or die("Error querying Database");
	
	$row = mysqli_fetch_array($result);
	$bandName = $row['Name'];
	$bandGenre = $row['Genre'];
	$estDate = $row['Year_Started'];
	
	echo "<h5>$bandName</h5>";
	echo "<p>Established: $estDate</p>";
	echo "<p>$bandGenre</p>";
	
	
	
	mysqli_close($db);

?>
	
	</div>
	
	<div id = 'venue'>
		<h4>Featured Venue Section</h4>
	</div>
	
	
	
</div>

<?php
	include("sidebar.php");
	
?>

</div>
</body>
</html>