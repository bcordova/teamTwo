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
	
	
	
	
	
	echo "<h4><em>$bandName</a>";
	if (isset($_SESSION['user'])){

	//echo "User : ".$_SESSION['user'];
	echo "<a href=\"editband.php?tag=$id\" style='color: #CC0000; font-size: 10px'> EDIT </a>
	/<a href=\"deleteband.php?tag=$id\" style='color: #CC0000; font-size: 10px'>   DELETE</a>
	</em></h4>";

	}
	


 
 $img_folder = "images/";


 $imgs = dir($img_folder);


  $image = "nophoto.jpg";

//display image

 
 if (isset($_SESSION['user'])){
 echo '<img src="'.$img_folder.$image.'" border=1>';
 echo "<p><a href=\"addImage.php?tag=$id\" style='color: #CC0000; font-size: 10px'>ADD PICTURE</a></em></p>";
 }
	
	
	
	
	echo "<p><h5>Established:</h5> $estDate</p>";
	echo "<p><h5>Genres:</h5>$bandGenre</p>";
	echo "<p><h5>Band Members:</h5>$bandMembers</p>";
	echo "<p><h5>Labels:</h5>$labels</p>";
	echo "<p><h5>Website:</h5><a href=\"$website\">$website</a></p>";
	
	

?>
<?php if(isset($_SESSION['user']))
{
if(isset($_POST['post']))
{
$query = "select userID, Username from users where userID='" . $_SESSION['user'] . "'";
echo $query;
$r = mysqli_query($db,$query);

$query2 = "insert into comments (userID,bandID,text) values('" . $_SESSION['user'] . "','$id','" . $_POST['message'] . "')";
mysqli_query($db,$query2);
echo "<br />";
echo date("G:i:s");
echo "<br />";
echo date("Y-m-d");
echo "<br />";
}
?>
<div id="comment">
<form method="post" action=<?php print "bandview.php?tag=" . $_GET['tag'] ?>>
<h3>Comments</h3>
<hr>
Hi This is a witty Comment!
<p><font size=0> 10:19 AM Tuesday, March 23 2010 <b>Hazmatt4</b></font></p>
<br />
<br />
<h3> Post A Comment!</h3>
<textarea rows=8 cols=65 name="message"></textarea>
<input type="submit" name="post" value="Post" />
</div>
<?php
}
else
echo "<br /> <br/><font size=0>You need to be logged in to see comments</font>";
?>
</div>

<?php include("sidebar.php"); ?>
</div>
 </BODY>
</HTML>
