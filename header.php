	<div id="header"><h1><a href="index.php">Awesome Music Watch</a></h1></div>
	
	<p><i>Team Two's Index of Artists, Venues, and Events.</i></p>
	
	
	<p>
	
	<div id="nav">
	
	<table border="0" cellspacing="10" align="center">
	<tr>
	<!--<td width="200">Home</td>
	<td width="200">Add Band</td>
	<td width="200">Add Venue</td>-->
	<td width="200"><?php print( '<a href="addevent.php">Add Event</a>' ); ?></td>           
	
	<!--//Hyperlinks for header. URLs must be adjusting according to htdocs -->

	<td width="200"><?php print( '<a href="addband.php">Add Band</a>' ); ?></td>
	<td width="200"><?php print( '<a href="addvenue.php">Add Venue</a>' ); ?></td> 
	<?php
	if(!isset($_SESSION['user']))
	{
	?>
	<td width="200"><?php print( '<a href="login.php">Login/Register</a>' ); ?></td> 
	<?php
	}
	else
	{
	?>
	<td width="200"><?php print( '<a href="logout.php">Logout</a>' ); ?></td> 
	<?php
	}
	?>
	</tr>
	</table>
	
	</div>

	</p>
