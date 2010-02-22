<?php
if(isset($_POST['create']))
{
$root = $_POST['root'];
$pass = $_POST['pass'];
$db = mysqli_connect('localhost',$root,$pass);
if(!$db)
	die('Connect Error, did you enter the right information?');
mysqli_query($db,"CREATE DATABASE IF NOT EXISTS musicwatch");
//mysqli_close($db);
$db = mysqli_connect('localhost',$root,$pass,'musicwatch');
$file=fopen("band.dump","r");

while(!feof($file))
{
$line = fgets($file);
mysqli_query($db,$line);
echo $line ."<br/>";
}
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
<?
}
?>
