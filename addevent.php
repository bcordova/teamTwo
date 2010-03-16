<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Add Event</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
<SCRIPT LANGUAGE="JavaScript">


function checkFields() {
	re = "/^(\d{4})\/\(\d{1,2})\/\(\d{1,2})/"; 

	missinginfo = "";
	
	if (document.form.name.value == "") {
		missinginfo += "\n     -  Event Name";
	}
	if (document.form.venue.value == "") {

		missinginfo += "\n     -  Venue";
	}
	if (document.form.band.value == "") {
		missinginfo += "\n     -  Band";
	}
	
	if ((document.form.starts.value=="") ||
	(document.form.starts.value=="YYYY-MM-DD") || (document.form.starts.value.match(re)))
	{
		missinginfo += "\n     -  Starts";
	}

	if ((document.form.ends.value=="") ||
	(document.form.ends.value=="YYYY-MM-DD") || (document.form.ends.value.match(re)))
	{
		missinginfo += "\n     -  Ends";
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

  <form method="post" form name=form action="submitevent.php" onSubmit="return checkFields();">

<input type=hidden name=to value='you @ your domain . web'>
<input type=hidden name=subject value="Freedback">

<pre>
Event Name:	<input type=text name="name" size=30>

<?php
//Venue:		<input type=text name="venue" size=30>

include "db_connect.php";

$venueQuery = "select distinct name from venue";
$venueResults = mysqli_query($db, $venueQuery)
	or die("Error querying database");
	
echo 'Venue:		<select name = "venue">';
while($venueRows = mysqli_fetch_array($venueResults)){
	$temp = $venueRows[0];
	echo "<option>$temp</option>";
}
echo '</select>';

echo '<br><br>';

$bandQuery = "select distinct name from band";
$bandResults = mysqli_query($db, $bandQuery)
	or die("Error querying database");
	
echo 'Band:		<select name = "band">';
while($bandRows = mysqli_fetch_array($bandResults)){
	$temp = $bandRows[0];
	echo "<option>$temp</option>";
}
echo '</select>';


//Band:		<input type=text name="band" size=30>

?>


Starts:		<input type=text value ="YYYY-MM-DD" name="starts" size=30>

Ends:		<input type=text value ="YYYY-MM-DD" name="ends" size=30>

Description:  

<textarea rows=3 cols=40 name="description"></textarea>

<input type=submit name="submit" value="Submit Form!">


</pre>
</form>
</div>
<?php include("sidebar.php"); ?>
</div>
 </BODY>
</HTML>
