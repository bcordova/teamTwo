	<link rel="stylesheet" type="text/css" href="style.css" />
	<div id="header">
	<a href="index.php" ><img class="header" border=0 src="images/sb.jpg" align="middle" width="780"alt ""></a>
	
	
	<?php
	$img_folder = "images/";
	$bannerImage="ipod.jpg";
	echo '<body background="'.$img_folder.$bannerImage.'">';
	?>
	
	
	</div>
	<table border="0" cellspacing="10" align="center" bgcolor='#ECF1EF' >
	
	<tr>
	
	<td width="200"><?php print( '<a href="addevent.php"><b>Add Event</b></a>' ); ?></td>           
	<td width="200"><?php print( '<a href="addband.php"><b>Add Band</b></a>' ); ?></td>
	<td width="200"><?php print( '<a href="addvenue.php"><b>Add Venue</b></a>' ); ?></td> 
	<?php
	if(!isset($_SESSION['user']))
	{
	?>
	<td width="200"><?php print( '<a href="login.php"><b>Login/Register</b></a>' ); ?></td> 
	<?php
	}
	else
	{
	?>
	<td width="200"><?php print( '<a href="logout.php"><b>Logout</b></a>' ); ?></td> 
	<?php
	}
	?>
	</tr>
	</table>
	
	

	</p>
