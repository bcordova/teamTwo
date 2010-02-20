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

<p>Enter information about your club:</p>
<form method="post" action="newVenue.php">
    <label for="name">Club Name:</label>
    <input type="text" id="name" name="name" /><br />
	<p>Where is your club located?<p>
	<label for="name">Address:</label>
    <input type="text" id="address" name="address" /><br />
	<label for="name">City:</label>
    <input type="text" id="city" name="city" /><br />
	<label for="name">State:</label>
    <input type="text" id="state" name="state" /><br />
	<label for="name">Zip Code:</label>
    <input type="text" id="zipcode" name="zipcode" /><br />
	<p></p>
    <input type="submit" value="Submit Information" name="submit" />
  </form>

</div>
	
</div>
<?php
	include("sidebar.php");
	
?>

</div>
</body>
</html>