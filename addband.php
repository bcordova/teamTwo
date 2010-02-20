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

	
	
	
	<div id="main">
	
	  <p>Share your band information:</p>
  <form method="post" action="addBand.php">
    <label for="name">Band Name:</label>
    <input type="text" id="name" name="name" /><br />
    <label for="genre">Genre:</label>
    <input type="text" id="genre" name="genre" /><br />
    <label for="when_formed">Year Formed:</label>
    <input type="text" id="yearformed" name="yearformed" /><br />
    <label for="labels">Labels</label>
    <input type="text" id="labels" name="labels" />
    <label for="url">Band URL:</label>
    <input type="text" id="url" name="url" /><br />
	<label for="members">Band Members:</label>
    <textarea id="members" name="members"></textarea>
	<p></p>
    <input type="submit" value="Submit Information" name="submit" />
  </form>
	
	
	
	
	</div>
	
</div>
<?php include("sidebar.php"); ?>
</body>
</html>
