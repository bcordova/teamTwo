//Page displayed after a new venue is added to the database

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Thanks for adding your venue!</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<div id="wrap">
<body>
<?php
	include("header.php");
?>
<div id='main'>
<h3>Thank you for entering your information.</h3>
<?php
	include("db_connect.php");
	
	$delete = $_GET['tag'];
	$name = $_POST[name];
	$address = $_POST[address];
	$city = $_POST[city];
	$state = $_POST[state];
	$zip = $_POST[zip];
	$id = $_POST[id];
	$queryType = $_POST[queryType];
	
	
	
	//new = 0, edit = 1, 
	
	
	//delete a venue
	if($delete > 0){
		$query = "delete from venue where venueID like '$delete'";
	}
	//for new venue
	else if($queryType == 0){
		$query = "insert into venue (Name, zip, Address) VALUES ('$name', '$zip', '$address')";
		$query2 = "insert into address (zip, State, City) VALUES ( '$zip', '$state','$city' )";
	$result = mysqli_query($db, $query) or die( mysqli_error($db));
	$result = mysqli_query($db, $query2) or die( mysqli_error($db));
	}
	//Update venue
	else if($queryType == 1){
		$query = "UPDATE venue natural join address SET Name='$name', Address='$address', City='$city', State ='$state', zip='$zip'  WHERE venueID = '$id'"; 
	$result = mysqli_query($db, $query) or die( mysqli_error($db));
	}
	//Delete venue
	
	
	
	$query = "select * from venue natural join address";
	$result = mysqli_query($db, $query) or die( mysqli_error($db));

	echo "<p>Current Venues On File:</p>";

	echo "<table id=\"hor-minimalist-b\">\n<tr><th>Name</th><th>City</th><th>State</th><th>Zip Code</th><th>Address</th><th>\n\n";

  while($row = mysqli_fetch_array($result)) {
	$id = $row['venueID'];
  	$name = $row['Name'];
  	$city = $row['City'];
  	$state = $row['State'];
	$zipcode = $row['zip'];
	$address = $row['Address'];
	echo "<tr><td  ><a href=\"venueShows.php?id=$id\">$name</a></td><td >$city</td><td > $state</td><td >$zipcode</td><td>$address</td></tr>\n";
	}
 echo "</table>\n";

	mysqli_close($db);
?>
</div>
<?php
include("sidebar.php");
?>
</div>
</body>
</html>
