
	<div id="sidebar">
	
	<?php
	
	include("db_connect.php");
	
		
echo '<p><b>Band Search:</b></p>';
	
	
	
	
	echo '<p>type club name, city, zip, or type of music</p>';
	echo '<form method="post" action="bandSearch.php">';
	echo '<input type="text" id="searchbox" name="searchbox" />';
	echo '<input type="submit" value="go" name="submit" />';
	echo '</form>';
	
	echo '<p><b>Club Search:</b></p>';
	echo '<p>type club name, city, zip, or type of music</p>';
	echo '<form method="post" action="venueSearch.php">';
	echo '<input type="text" id="searchbox" name="venuesearchbox" />';
	echo '<input type="submit" value="go" name="submit" />';
	echo '</form>';
	
	echo '<p><b>Event Search:</b></p>';
	echo '<p>type event name, club name, or band name</p>';
	echo '<form method="post" action="eventSearch.php">';
	echo '<input type="text" name="eventSearchBox" />';
	echo '<input type="submit" value="go" name="submit" />';
	echo '</form>';
	
	
	mysqli_close($db);
	
	?>
