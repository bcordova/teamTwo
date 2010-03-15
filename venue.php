<?php
session_start();
?>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Your number one source for all the places to be!</title>
  <link rel="stylesheet" type="text/css" href="Vstyle.css" />
</head>

<h1>You've made it to the ULTIMATE SOURCE for the best locations around!</h1>
<form method="post" action="band.php">
<label for="venueSearch">Visit our band website!</label>
<input type="submit" value="Go!" name="band" />

<img src="hipster.jpg" width="700" height="375"
      alt="You WISH you were here!" /><br />
<?php
	
	?>
<p> </p>
    
<?php
	include("searchVenue.php");
?>
