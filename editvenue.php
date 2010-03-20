<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Edit Band</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <SCRIPT LANGUAGE="JavaScript">



function checkFields() {

re = "/^(\d{4})\/\(\d{1,2})\/\(\d{1,2})/"; 

missinginfo = "";
if (document.form.name.value == "") {
missinginfo += "\n     -  Band Name";
}
if (document.form.genre.value == "") {
missinginfo += "\n     -  Genre";
}
if ((document.form.year.value=="") ||
(document.form.year.value=="YYYY-MM-DD") || (document.form.year.value.match(re)))
{
missinginfo += "\n     -  Year Formed";
}

if (document.form.labels.value == "") {
missinginfo += "\n     -  Labels";
}
if ((document.form.website.value == "") || 
(document.form.website.value.indexOf("http://") == -1) || 
(document.form.website.value.indexOf(".") == -1)) {
missinginfo += "\n     -  Web site";
}
if(document.form.members.value == "") {
missinginfo += "\n     -  Band Members";
}

if (missinginfo != "") {
missinginfo ="_____________________________\n" +
"You failed to correctly fill in your:\n" +
missinginfo + "\n_____________________________" +
"\nPlease re-enter and submit again!";
alert(missinginfo);
return false;
}
else return true;
}

</script>
 </HEAD>
<div id="wrap">
 <BODY>
 <?php include("header.php"); ?>
 <div id="main">
<?php

    $id = $_GET['tag'];
	include("db_connect.php");
	
	$query = "select * from venue where venueID like '$id'";

	$result = mysqli_query($db, $query)
	  or die("Error querying Database");
	
	$row = mysqli_fetch_array($result);
	$name = $row['Name'];
	$address = $row['Address'];
	$city = $row['City'];
	$state = $row['State'];
	$zip = $row['zip'];
	

?>
<form method="post" form name=form  action="newVenue.php"  onSubmit="return checkFields();">


<pre>
<p>Edit club information:</p>
Club Name:    <input type=text value= "<?php $name; echo $name; ?>" name="name" size=30>


Address:      <input type=text value= "<?php $address; echo $address; ?>" name="address" size=30>

City:         <input type=text value= "<?php $city; echo $city; ?>" name="city" size=30>

State:        <input type=text value= "<?php $state; echo $state; ?>" name="state" size=30>

Zip Code:     <input type=text value= "<?php $zip; echo $zip; ?>" name="zip" size=10>

<input type=hidden value = "1" name="queryType">
<input type=hidden value = "<?php $id; echo $id; ?>" name="id">

<input type=submit name="submit" value="Submit Form!">


</pre>
</form>
</div>
<?php include("sidebar.php"); ?>
</div>
 </BODY>
</HTML>