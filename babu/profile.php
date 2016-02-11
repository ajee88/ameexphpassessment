<?php
session_start();
$_SESSION['session_id']=0;
require "dbconfig.php";
?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<?php
	/*$user_uid=$_SESSION['user_uid'];
	$user_name=$_SESSION['user_name'];
	$user_pass=$_SESSION['user_pass'];
	$user_firstname=$_SESSION['user_firstname'];
	$user_lastname=$_SESSION['user_lastname'];
	$user_phone=$_SESSION['user_phone'];
	$user_email=$_SESSION['user_email'];*/

?>
<style>
#accountinfo_div
{
float:left;
}
#profileinfo_div
{
float:left;
}
#button_div
{
float:right;
}

</style>

<html>
<div id="accountinfo_div">
<h4>Account Information</h4>
<table border="3">
<tr>
<td>User ID</td>
<td><input type="text" name="loguseridname" class="cloguseridname" value="<?php echo $_SESSION['user_uid']; ?>" readonly/></td>
</tr>
<tr>
<td>User Name</td>
<td><input type="text" name="logusername" class="clogusername" value="<?php  echo $_SESSION['user_name'];?>" readonly/></td>
</tr>
<tr>
<td>Password</td> 
<td><input type="password" name="logpasswordname" class=clogpasswordname"  value="<?php  echo $_SESSION['user_pass'];?> " readonly/></td>
</tr>
<tr>
<td><input type="text" readonly></td><td><input type="text" readonly></td>
</tr>
</table>
</table>
</div>
<div id="profileinfo_div">
<h4>Profile Information</h4>
<table border="3">
<tr>
<td>
First Name
</td>
<td> <input type="text" name="firstname" class="cfirstname" value="<?php echo $_SESSION['user_firstname'];?>" readonly /></td>
</tr>
<td>
Last Name
</td>
<td><input type="text" name="lastname" class="clastname" value="<?php echo $_SESSION['user_lastname'];?>" readonly/></td>
</tr>
<tr>
<td>Phone Number</td>
<td><input pattern="[0-9]{10}" name="phonename" class="cphonename"  value="<?php echo $_SESSION['user_phone'];?>" readonly/></td>
</tr>
<tr>
<td>Email Address</td>
<td><input pattern="/^([a-zA-Z0-9_\.-]{3,}+)@([\da-zA-Z\.-]+)\.([a-zA-Z\.]{2,6})$/'" name="emailname" class="cemailname" value="<?php echo $_SESSION['user_email'];?>" readonly/></td>
</tr>
</table>
</div>
<div id="button_div">
<table border="2">
<tr>
<th align="center"><input type="submit" name="editname" class="ceditname" value="EDIT" onClick="document.location.href='edit.php'"/></td>
<th align="center"><input type="submit" name="logoutname" class="clogoutname" value="LOG OUT" onClick="document.location.href='index.php'"/></td>
</tr>
</table>
<div>
</html> 

