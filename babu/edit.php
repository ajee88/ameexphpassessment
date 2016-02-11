<?php
session_start();
$_SESSION['session_id']=0;
require "dbconfig.php";
?>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
<form name="editform" method="post" action="">
<div id="accountinfo_div">
<h4>Account Information</h4>
<table border="3">
<tr>
<td>User ID</td>
<td><input type="text" name="loguseridname" class="cloguseridname" value="<?php echo $_SESSION['user_uid']; ?>" readonly/></td>
</tr>
<tr>
<td>User Name</td>
<td><input type="text" name="logusername" class="clogusername" value="<?php  echo $_SESSION['user_name'];?>" required/></td>
</tr>
<tr>
<td>Password</td> 
<td><input type="password" name="logpasswordname" class=clogpasswordname"  value="<?php  echo $_SESSION['user_pass'];?> " required/></td>
</tr>
<tr>
<td>Confirm Password</td>
<td><input type="password" name="regcpasswordname" class=cregcpasswordname" value="<?php  echo $_SESSION['user_pass'];?>" required/></td>
</tr>
</table>
</div>
<div id="profileinfo_div">
<h4>Profile Information</h4>
<table border="3">
<tr>
<td>
First Name
</td>
<td> <input type="text" name="firstname" class="cfirstname" value="<?php echo $_SESSION['user_firstname'];?>" required /></td>
</tr>
<td>
Last Name
</td>
<td><input type="text" name="lastname" class="clastname" value="<?php echo $_SESSION['user_lastname'];?>" required/></td>
</tr>
<tr>
<td>Phone Number</td>
<td><input pattern="[0-9]{10}" name="phonename" class="cphonename"  value="<?php echo $_SESSION['user_phone'];?>" required/></td>
</tr>
<tr>
<td>Email Address</td>
<td><input pattern="/^([a-zA-Z0-9_\.-]{3,}+)@([\da-zA-Z\.-]+)\.([a-zA-Z\.]{2,6})$/'" name="emailname" class="cemailname" value="<?php echo $_SESSION['user_email'];?>" required/></td>
</tr>
</table>
</div>
<div id="button_div">
<table border="2">
<tr>
<th align="center"><input type="submit" name="updatename" class="ceditname" value="SAVE"/></td>
<th align="center"><input type="submit" name="logoutname" class="clogoutname" value="LOG OUT" onClick="document.location.href='index.php'"/>
</td>
</tr>
</table>
<div>
</form>
</html> 
<?php
if (isset($_POST['updatename'])) 
{
//get value from form
$firstname =$_POST['firstname'];
$lastname =$_POST['lastname'];
$phone =$_POST['phonename'];
$mail =$_POST['emailname'];
$username=$_POST['logusername'];
$password=$_POST['logpasswordname'];
$confirm_password=$_POST['regcpasswordname'];

$user_uid=$_POST['loguseridname'];

/*
$login_get_sql = "select pass from ameex_user where uid='$user_uid'";   

$login_get_result = mysqli_query($cn,$login_get_sql) or die("Error in getting passoword from login" . mysqli_error($cn));

$uid=mysqli_fetch_array($login_get_result);

$user_pass=$uid['pass'];
echo $user_pass;

/*echo $user_uid."<br>";
echo $firstname."<br>";
echo $lastname."<br>";
echo $phone."<br>";
echo $mail."<br>";
echo $username."<br>";
echo $password."<br>";
echo $confirm_password."<br>";

if($user_pass==$password)
{
echo "<br>same password";
	$login_sql = "UPDATE ameex_user SET name='$username',pass='$password' WHERE uid='$user_uid')";   
echo "<br>.$login_sql";
                        //Login Query
	$login_result = mysqli_query($cn,$login_sql) or die("Error in login updating " . mysqli_error($cn));
	echo json_encode($login_result);			    
	if(!$login_result)          	                 								// checking login
	{
	      die('Could not Update Login Data: ' . mysql_error()); 
	}
	else
	{
		echo "<br><b>Updated login data successfully<b>\n";	
	}

}
else
{
echo "<br>Password changed";
*/


//echo "welcome";
	$crypt_password = md5($password);										//encrypted 	        
	$login_update_sql = "UPDATE ameex_user SET name='$username',pass='$crypt_password' WHERE uid='$user_uid'"; 
//echo "<br>".$login_sql ;	       
    //Login Query
	
$login_update_result = mysqli_query($cn,$login_update_sql) or die("Error in login updating " . mysqli_error($cn));

echo json_encode($login_update_result);			    

/*if(!$login_update_result)          	                 								// checking login
	{
	      die('Could not Update Login Data: ' . mysql_error()); 
	}
	else
	{
		echo "<br><b>Updated login data successfully<b>\n";
	}

*/


$Reg_update_sql = "UPDATE ameex_user_profile SET first_name='$firstname',last_name='$lastname',mail='$mail',phone='$phone' WHERE uid='$user_uid'";
//echo $Reg_update_sql;
$Reg_update_result = mysqli_query($cn,$Reg_update_sql) or die("Error in Register Data Inserting " . mysqli_error($cn));

echo json_encode($Reg_update_result);			    

/*if(!$Reg_update_result) 
{
      die('Could not update Register data: ' . mysql_error()); 
}
else
{
echo "<br><b>updated data successfully<b>\n";
}*/



}
?>
