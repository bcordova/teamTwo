<?php
session_start();
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<div id="wrap">
<body>

<?php
	include("header.php");
	include("db_connect.php");
?>	

<div id='main'>
	<form action="register.php" method="post">
<table>
<?php
if(isset($_POST['Register']))
{
	$query ="insert into users(Username,Email,FirstName,LastName,BirthDate,password) values('" . $_POST['user'] . "','" . $_POST['email'] . "','" . $_POST['first'] . "','" . $_POST['last'] . "','" . $_POST['birth'] . "',SHA('" . $_POST['password'] . "'))";
	mysqli_query($db,$query);
	echo "Thank you for signing up for Awesome Music Watch!";
}
else
{
?>
<tr>
	<td>Username </td><td><input type="text" name="user"></td>
</tr>
<tr>
	<td>First Name</td><td><input type="text" name="first"></td>
</tr>
<tr>
	<td>Last Name  </td><td><input type="text" name="last"></td>
</tr>
<tr>
<tr>
	<td>Email  </td><td><input type="text" name="email"></td>
</tr>
<tr>
	<td>Birth Date  </td><td><input type="text" name="birth"></td>
</tr>
	<td>Password  </td><td><input type="password" name="password"></td>
</tr>
<tr>
	<td>Re-Enter Password  </td><td><input type="password" name="password"></td>
</tr>
</table>
	<input type="submit" value="Register" name="Register">
	<br />
	
	</div>
<?php
}
?>	


</div>
</body>
</html>
