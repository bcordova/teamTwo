<?php
$db = mysqli_connect('localhost','root','dunngood');
mysqli_query($db,"CREATE DATABASE musicwatch");
$command = "mysql -uroot -pwerewolf musicwatch < band.dump";
echo $command;
system($command);
?>
