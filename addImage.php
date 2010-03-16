
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Awesome Music Watch</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
	
	<div id="wrap">
 <BODY>
 <?php include("header.php"); ?>
 <div id="main">

<?php

$uploadDir = 'images/'; //Image Upload Folder


if(isset($_POST['Submit']))

{

$fileName = $_FILES['Photo']['name'];

$tmpName = $_FILES['Photo']['tmp_name'];

$fileSize = $_FILES['Photo']['size'];

$fileType = $_FILES['Photo']['type'];

 

$filePath = $uploadDir . $fileName;

 

$result = move_uploaded_file($tmpName, $filePath);

if (!$result) {

echo "Error uploading file";

exit;

}
if(!get_magic_quotes_gpc())

{

$fileName = addslashes($fileName);

$filePath = addslashes($filePath);

}

//$query = "INSERT INTO $db_table ( Image ) VALUES ('$filePath')";

//mysql_query($query) or die('Error, query failed');

}

?> 
	
	<form name="Image" enctype="multipart/form-data" action="addImage.php" method="POST">

	<input type="file" name="Photo" size="30" accept="image/gif, image/jpeg, image/x-ms-bmp, image/x-png"><br/>

	<INPUT type="submit" class="button" name="Submit" value=" Submit ">

	&nbsp;&nbsp;<INPUT type="reset" class="button" value="Cancel">
	

</div>
<?php include("sidebar.php"); ?>
</div>
 </BODY>
</HTML>