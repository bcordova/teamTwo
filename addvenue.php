<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Awesome Music Watch</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <SCRIPT LANGUAGE="JavaScript">


function checkFields() {
missinginfo = "";
if (document.form.name.value == "") {
missinginfo += "\n     -  Club Name";
}
if (document.form.address.value == "") {
missinginfo += "\n     -  Address";
}
if (document.form.city.value == "") {
missinginfo += "\n     -  City";
}
if (document.form.state.value == "") {
missinginfo += "\n     -  State";
}
if(document.form.zip.value == "") {
missinginfo += "\n     -  Zip Code";
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

  <form method="post" form name=form action="newVenue.php" onSubmit="return checkFields();">

<pre>

Club Name:    <input type=text name="name" size=30>

Address:      <input type=text name="address" size=30>

City:         <input type=text name="city" size=30>

State:        <input type=text name="state" size=30>

Zip Code:     <input type=text name="zip" size=10>

<input type=submit name="submit" value="Submit Form!">


</pre>
</form>
</div>
<?php include("sidebar.php"); ?>
</div>
 </BODY>
</HTML>
