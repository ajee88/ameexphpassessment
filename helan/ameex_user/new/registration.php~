<?php	include "class.user.php";

         $user = new User(); // Checking for user logged in or not
	 
	 if (isset($_REQUEST['submit'])){
	 extract($_REQUEST);
	 $register = $user->reg_user($name,$pass,$cnfpass);
	 if ($register) {
	 // Registration Success
	 echo 'Registration successful <a href="index.php">Click here</a> to login';
	 } else {
	 // Registration Failed
	 echo 'Registration failed. Username already exits please try again';
	 }
	 }
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	 
	<style><!--
	 #container{width:400px; margin: 0 auto;}
	--></style>
	<div id="container">
	<h1>Registration Here</h1>
	<form action="" method="post" name="reg">
	<table>
	<tbody>

	<tr>
	<th>User Name:</th>
	<td><input type="text" name="name" required="" /></td>
	</tr>
	<tr>
	<tr>
	<th>Password:</th>
	<td><input type="password" name="pass" required="" /></td>
	</tr>
	<th>ConfirmPassword:</th>
	<td><input type="password" name="cnfpass" required="" /></td>
	</tr>
	<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Register" /></td>
	</tr>
	<tr>
	<td></td>
	<td><a href="index.php">Already registered! Click Here!</a></td></div>
	</tr>
	</tbody>
	</table>
	</form></div>
        </html>
