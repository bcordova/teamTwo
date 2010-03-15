<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Add Band</title>
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

  <form method="post" form name=form action="submitband.php" onSubmit="return checkFields();">

<input type=hidden name=to value='you @ your domain . web'>
<input type=hidden name=subject value="Freedback">

<pre>
Band Name:    <input type=text name="name" size=30>

Genre:        <input type=text name="genre" size=30>

When Formed:  <input type=text value ="YYYY-MM-DD" name="year" size=30>

Labels:       <input type=text name="labels" size=30>

Web Site:     <input type=text value="http://" name="website" size=30>

Band Members:  

<textarea rows=3 cols=40 name="members"></textarea>

<input type=submit name="submit" value="Submit Form!">


</pre>
</form>
</div>
<?php include("sidebar.php"); ?>
</div>
 </BODY>
</HTML>
