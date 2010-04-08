<?php
session_start();
include("db_connect.php");
if(isset($_POST['login']))
{
	$user = $_POST['user'];
	$password = $_POST['password'];
	$query = "select userID, Username from users where password=SHA('$password')";
	$r = mysqli_query($db,$query);
	if($row =mysqli_fetch_array($r))
	$_SESSION['user']=$row['userID'];
	else
	{
	header("location: login.php");
	}
}
?>
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

	<h2>Welcome to the Awesome Music Watch!</h2>
	
	<div id = 'artist'>
		<h3>Featured Artist Section</h3>
	
<?php
	
	
	
	//echo '<body background="'.$img_folder.$bannerImage.'">';

	
	
	$query = "select bandID, Name, Genre, website, members, Year_Started, image from band ORDER BY RAND() LIMIT 1";
	$result = mysqli_query($db, $query)
	  or die("Error querying Database");
	
	$row = mysqli_fetch_array($result);
	$id = $row['bandID'];
	$bandName = $row['Name'];
	$bandGenre = $row['Genre'];
	$estDate = $row['Year_Started'];
	$website = $row['website'];
	$uploadedImage = $row['image'];
	
    $img_folder = "images/";


 $image = "nophoto.jpg";
 if ($uploadedImage == "" or $uploadedImage == NULL){
 echo '<img class="artist" border=2 hspace=10 src="'.$img_folder.$image.'" align="right" width="250" >';
 }else {
 echo '<img class="artist" border=2 hspace=10 src="'.$img_folder.$uploadedImage.'" align="right" width="250" >';
 }
 
	
	
	
	
	echo "<p><h4><span style='color:#000000'><a href=\"bandview.php?tag=$id\">$bandName</a></span></h4></p>";
	echo "<p><h5><span style='color:#000000'>Established:</span></h5></p> $estDate";
	echo "<p><h5><span style='color:#000000'>Genre:</span></h5></p> $bandGenre";
	echo "<p><h5><span style='color:#000000'>Website:</span></h5></p> <a href=\"$website\">$website</a>";
	
	/*
	echo "<h4><em><a href=\"bandview.php?tag=$id\">$bandName</a></em></h4>";
	echo "<p><h5>Established:</h5> $estDate</p>";
	echo "<p><h5>Genres:</h5>$bandGenre</p>";
	echo "<p><h5>Website:</h5><a href=\"$website\">$website</a></p>";
	*/
	
	mysqli_close($db);

?>
	
	</div>
		<!-- ++Begin Dynamic Feed Wizard Generated Code++ -->
  <!--
  // Created with a Google AJAX Search and Feed Wizard
  // http://code.google.com/apis/ajaxsearch/wizards.html
  -->

  <!--
  // The Following div element will end up holding the actual feed control.
  // You can place this anywhere on your page.
  -->
  <div id="feed-control">
    <span style="color:#676767;font-size:11px;margin:10px;padding:4px;">Loading...</span>
  </div>

  <!-- Google Ajax Api
  -->
  <script src="http://www.google.com/jsapi?key=notsupplied-wizard"
    type="text/javascript"></script>

  <!-- Dynamic Feed Control and Stylesheet -->
  <script src="http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.js"
    type="text/javascript"></script>
  <style type="text/css">
    @import url("http://www.google.com/uds/solutions/dynamicfeed/gfdynamicfeedcontrol.css");
  </style>

  <script type="text/javascript">
    function LoadDynamicFeedControl() {
      var feeds = [
	{title: 'MTV News',
	 url: 'http://feeds.feedburner.com/MTVNewsLatest'
	}];
      var options = {
        stacked : false,
        horizontal : false,
        title : ""
      }

      new GFdynamicFeedControl(feeds, 'feed-control', options);
    }
    // Load the feeds API and set the onload callback.
    google.load('feeds', '1');
    google.setOnLoadCallback(LoadDynamicFeedControl);
  </script>
<!-- ++End Dynamic Feed Control Wizard Generated Code++ -->

	<div id = 'venue'>
		<h3>Featured Venue Section</h3>
	
	
	
<?php
	include("db_connect.php");
	
	$query = "SELECT Name, City, State, zip, Address FROM venue natural join address ORDER BY RAND() LIMIT 1";
	$result = mysqli_query($db, $query)
		or die("Error querying Database");
		
	$row = mysqli_fetch_array($result);
	$venueName = $row['Name'];
	$venueCity = $row['City'];
	$venueState = $row['State'];
	$venuezip = $row['zip'];
	$venueAddress = $row['Address'];
	
	echo "<h4><em>$venueName</em></h4>";
	echo "<p><h5>Address:</h5> $venueAddress<br>$venueCity, $venueState</p>";
	
	
	mysqli_close($db);
	
?>


	</div>
	
</div>

<?php
	include("sidebar.php");
	
?>

</div>
</body>
</html>
