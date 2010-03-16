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
	$id = $_GET['id'];
	
	//echo "<p>id = $id</p>";
	
	include("db_connect.php");
	
	$query = "select * from venue where venueID = $id";

	$result = mysqli_query($db, $query)
	  or die("Error in First Database Query");
	
	$row = mysqli_fetch_array($result);
	$name = $row['Name'];
	$city = $row['City'];
	$state = $row['State'];
	$zip = $row['zip'];
	$address = $row['Address'];
	
	echo "<p><h3>You've reached the '$name' page</h3></p>";
	echo "<p><h5>Location: $address</h5></p>";
	echo "<p><h5>$city, $state, $zip</h5></p>";
	
	$query = "select * from events where venueID = '$id'";
	$result = mysqli_query($db, $query)
	  or die("Error in Second Database Query");
	
	echo "<p><h4>What's coming up at '$name'</h4></p>";
	echo "<table><tr><th>Name</th><th>Starts</th><th>Ends</th><th>Description</th><tr>\n\n";
  
	  while($row = mysqli_fetch_array($result)) {
	  
		$Name = $row['Name'];
		$Starts = $row['Starts'];
		$Ends = $row['End'];
		$Description = $row['Description'];
		
		echo "<tr><td  >$Name</td><td  >$Starts</td><td >$Ends</td><td>$Description</td></tr>\n";
	  }
	echo "</table>\n"; 
	
	?>
	
	
</div>

<?php
	include("sidebar.php");
	

?>