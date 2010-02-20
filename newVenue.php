<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Thanks for adding your venue!</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<?php

	include("db_connect.php");

	$name = $_POST[name];
	$address = $_POST[address];
	$city = $_POST[city];
	$state = $_POST[state];
	$zipcode = $_POST[zipcode];
		$query = "insert into venue (Name, City, State, zip, Address) VALUES ('$name', '$city', '$state', '$zipcode', '$address')";
	$result = mysqli_query($db, $query)
		//or die( mysqli_error($db))
		;

	echo $query;

	echo "<table id=\"hor-minimalist-b\">\n<tr><th>Name</th><th>City</th><th>State</th><tr>Zip</th><th>Address</th><th>\n\n";

  while($row = mysqli_fetch_array($result)) {
  	$name = $row['Name'];
  	$city = $row['City'];
  	$state = $row['State'];
	$zipcode = $row['zip'];
	$address = $row['Address'];
	echo "<tr><td  >$name</td><td >$city</td><td > $state</td><td >$zip</td><td>$address</td></tr>\n";
	}
 echo "</table>\n";

	mysqli_close($db);

?>

