<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
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

  $id = $_GET['tag'];
?>
<?php
	include("db_connect.php");
	
	$query = "select * from band where bandID = '$id'";

	$result = mysqli_query($db, $query)
	  or die("Error querying Database");
	
	$row = mysqli_fetch_array($result);
	$bandName = $row['Name'];
	$bandGenre = $row['Genre'];
	$estDate = $row['Year_Started'];
	$website = $row['website'];
	$labels = $row['labels'];
	$bandMembers = $row['members'];
	
	echo "<h4><em>$bandName</a><a href=\"editband.php?tag=$id\" style='color: #CC0000; font-size: 10px'> EDIT </a>/<a href=\"deleteband.php?tag=$id\" style='color: #CC0000; font-size: 10px'>   DELETE</a></em></h4>";
	echo "<p><h5>Established:</h5> $estDate</p>";
	echo "<p><h5>Genres:</h5>$bandGenre</p>";
	echo "<p><h5>Band Members:</h5>$bandMembers</p>";
	echo "<p><h5>Labels:</h5>$labels</p>";
	echo "<p><h5>Website:</h5><a href=\"$website\">$website</a></p>";
	
	
	mysqli_close($db);

?>


</div>
<?php include("sidebar.php"); ?>
</div>
 </BODY>
</HTML>
