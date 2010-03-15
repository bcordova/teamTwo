<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<div id="wrap">
<body>

<?php
	include("header.php");

?>	

<div id='main'>
	<form action="index.php" method="post">
<table>
<tr>
	<td><strong>Username </strong></td><td><input type="text" name="user"></td>
</tr>
<tr>
	<br />
	<td><strong>Password  </strong></td><td><input type="password" name="password"></td>
</tr>
</table>
	<input type="submit" value="Login" name="login">
	<p> <font size='1'>Don't have an account? Click <a href="register.php">here</a> to register for free!</font></p>
	<br />
	
	</div>
	


</div>
</body>
</html>
