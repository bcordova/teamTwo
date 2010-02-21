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

	$name = $_POST[name];
	$address = $_POST[address];
	$city = $_POST[city];
	$state = $_POST[state];
	$zip = $_POST[zipcode];
		$query = "insert into venue (Name, City, State, zip, Address) VALUES ('$name', '$city', '$state', '$zip', '$address')";
	$result = mysqli_query($db, $query) or die( mysqli_error($db));
	
	$query = "select * from venue";
	$result = mysqli_query($db, $query) or die( mysqli_error($db));

	echo "<table id=\"hor-minimalist-b\">\n<tr><th>Name</th><th>City</th><th>State</th><th>Zip Code</th><th>Address</th><th>\n\n";

  while($row = mysqli_fetch_array($result)) {
	$ID = $row['venueID'];
  	$name = $row['Name'];
  	$city = $row['City'];
  	$state = $row['State'];
	$zipcode = $row['zip'];
	$address = $row['Address'];
	echo "<tr><td  >$name</td><td >$city</td><td > $state</td><td >$zipcode</td><td>$address</td></tr>\n";
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
