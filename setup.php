<?php
$db = mysqli_connect('localhost','root','werewolf','musicwatch');
$file=fopen("band.dump","r");
while(!feof($file))
{
$line = fgets($file);
mysqli_query($db,$line);
echo $line ."<br/>";
}
fclose($file);
?>
