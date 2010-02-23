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

	
	$dowant = $_POST['searchbox'];

	
	$query = "SELECT * FROM band WHERE Name LIKE \"%$dowant%\" OR Genre LIKE \"%$dowant%\" OR Year_Started LIKE \"%$dowant%\" OR labels LIKE \"%$dowant%\" OR website LIKE \"%$dowant%\" OR members LIKE \"%$dowant%\"";
	
	
	$result = mysqli_query($db, $query)
	  or die("<p>Error Querying Database<p>");
	
	echo "<p>You searched for bands containing the word \"$dowant\"</p>";
	
	echo '<p><h3>Results:</h3></p>';
	
	
	echo "<table><tr><th>Name</th><th>Genre</th><th>Year Started</th><th>Labels</th><tr>\n\n";
  
	  while($row = mysqli_fetch_array($result)) {
	  
		$name = $row['Name'];
		$genre = $row['Genre'];
		$year_started = $row['Year_Started'];
		$labels = $row['labels'];


		
      echo "<tr><td  ><a href=\"bandview.php?name=$name\">$name</a></td><td  >$genre</td><td >$year_started</td><td>$labels</td></tr>\n";
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