<?php
if(isset($_POST['create']))
{
$root = $_POST['root'];
$pass = $_POST['pass'];
$db = mysqli_connect('localhost',$root,$pass);
if(!$db)
	die('Connect Error, did you enter the right information?');
mysqli_query($db,"CREATE DATABASE IF NOT EXISTS musicwatch");
mysqli_query($db,"GRANT ALL PRIVILEGES ON musicwatch.* to 'music'@'localhost' identified by 'dunngood'");
mysqli_close($db);
$db = mysqli_connect('localhost',$root,$pass,'musicwatch');
if(!$db)
	die('WTF?');
$file=fopen("band.dump","r");

$line="";
while(!feof($file))
{
$fline = fgets($file);
$line = trim($line) . trim($fline);
//echo $line . "<br />\n";
if(preg_match('/^.*;$/',$line))
{
mysqli_query($db,$line);
$line="";
}

}
echo "Database Successfully loaded!";
fclose($file);
}
else
{
?>
<html>
<head>
<title> Music Watch Set up page </title>
</head>
<body>
<form method="post" action="setup.php">
Enter the information for your mysql database server.
<br>
Enter Root Name: <input type="text" name="root">
<br>
Enter Root Password: <input type="password" name="pass">
<br>
<input type="submit" name="create" value="Create DB">
</form>
</body>
</html>
<?php
}
?>
