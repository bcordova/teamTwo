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
	$uploadedImage = $row['image'];
	
	
	
	//JOIN VENUE AND EVENTS TABLE
	//$query = "select venue.name, venue.city, venue.state, events.Name from venue inner join events on venue.venueid=events.venueid where events.bandid = 0";
	$query = "select venue.name, events.Name from venue inner join events on venue.venueid=events.venueid where events.bandid = '$id' limit 1";

    $result = mysqli_query($db, $query)
    or die("Error querying Database");
	
	$row = mysqli_fetch_array($result);
	//$city=$row['city'];
	//$state=$row['state'];
	$eventName = $row['Name'];
	$venueName = $row['name'];
	//JOIN VENUE AND EVENTS TABLE

	
	//ONLY DISPLAY EDIT/DELETE TO LOGGED IN USERS
	echo "<h4><em><span style='color:#000000'>$bandName</span></em></h4>";
	//echo "<h4><em>$bandName</em></a>";
	if (isset($_SESSION['user'])){

	//echo "User : ".$_SESSION['user'];
	echo "<a href=\"editband.php?tag=$id\" style='color: #CC0000; font-size: 10px'> EDIT </a>
	/<a href=\"deleteband.php?tag=$id\" style='color: #CC0000; font-size: 10px'>   DELETE</a>
	</em></h4>";

	}
	//ONLY DISPLAY EDIT/DELETE TO LOGGED IN USERS



 //DISPLAY BAND IMAGE
 $img_folder = "images/";


 $imgs = dir($img_folder);


 $image = "nophoto.jpg";

 
 if (isset($_SESSION['user'])){
 if ($uploadedImage == "" or $uploadedImage == NULL){
 echo '<img src="'.$img_folder.$image.'" border=1>';
 echo "<p><a href=\"addImage.php?tag=$id\" style='color: #CC0000; font-size: 10px'>ADD PICTURE</a></em></p>";
 }else {
 
 echo '<img src="'.$img_folder.$uploadedImage.'" border=1>';
 }
 }
 
 //575A2E
 
 
 
//DISPLAY BAND IMAGE	
	
	echo "<p><h5><span style='color:#000000'>Established:</span></h5></p> $estDate";
	echo "<p><h5><span style='color:#000000'>Genre:</span></h5></p> $bandGenre";
	echo "<p><h5><span style='color:#000000'>Band Members:</span></h5></p> $bandMembers";
	echo "<p><h5><span style='color:#000000'>Labels:</span></h5></p> $labels";
	echo "<p><h5><span style='color:#000000'>Website:</span></h5></p> $website";
	/*
	echo "<p><h5>Established:</h5> $estDate</p>";
	echo "<p><h5>Genres:</h5>$bandGenre</p>";
	echo "<p><h5>Band Members:</h5>$bandMembers</p>";
	echo "<p><h5>Labels:</h5>$labels</p>";
	echo "<p><h5>Website:</h5><a href=\"$website\">$website</a></p>"; 
	*/
	if(!$eventName==null){
	echo "<p><h5><span style='color:#000000'>Upcoming Shows:</span></h5></p>";
	//echo "<p><h5>Upcoming Show:</h5></p>";
	echo "<table>";
	echo "
	<tr>
	<th>Event</th>
	<th>Venue</th>

	</tr>
	<tr>
	<td>$eventName</td>
	<td>$venueName</td>
	
	</tr>";
	echo "</table>";
	} 
	

?>
<?php if(isset($_SESSION['user']))
{
if(isset($_POST['post']))
{
$r = mysqli_query($db,$query);

$query2 = "insert into comments (userID,bandID,post_time,post_date,text) values('" . $_SESSION['user'] . "','$id','" . date("G:i:s") . "','" . date("Y-m-d") ."','" . $_POST['message'] . "')";
mysqli_query($db,$query2);
}
?>
<div id="comment">
<form method="post" action=<?php print "bandview.php?tag=" . $_GET['tag'] ?>>
<h5><span style='color:#000000'>Comments</span></h5>
<?php
$query3 = "select * from comments natural join users where bandID='$id' order by post_date, post_time desc";
$res = mysqli_query($db,$query3);
while($row = mysqli_fetch_array($res))
{
echo "<hr>";
echo $row['text'];
echo "<font size=0> " . $row['post_time']. ", " . $row['post_date'] . " <b>" . $row['Username'] . "</b></font>";
}
?>

<h3> Post A Comment!</h3>
<textarea rows=8 cols=58.5 name="message"></textarea>
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
