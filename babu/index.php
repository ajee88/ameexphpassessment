<!doctype html>
<?php
session_start();
$_SESSION['session_id']=0;
require "dbconfig.php";
?>
<html>
<body>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
$(document).ready(function()
{
    $("#createnewaccount").click(function()  
    {
	$("#login_div_id").hide();
	$("#register_div_id").show();
    });
});
</script>

<center>
<form name="loginform" id="loginform" method="POST"> 		
<div name="login_div" id="login_div_id">        <!--Login Div Start-->
<h3>LOG IN</h3>
<table border="1">
<tr>
<td><label>User Name</label></td>
<td><input type="text" name="logusername" class="clogusername" required/></td>
</tr>

<tr>
<td><label>Password</label></td>
<td><input type="password" name="logpasswordname" class=clogpasswordname" required/></td>
</tr>

<tr>
<td colspan="2" align="center"><input type="submit" name="loginname" class="cloginname" value="LOG IN" onclick=''/></td>
</tr>
</table>
<label id="createnewaccount">Create New Account</label>
</div> <!--Login Div End-->
</form>

<form name="registerform" id="registerform" method="POST" > 		
<div name="register_div" id="register_div_id" style="display:none"> 	<!--Registration Div Start-->
<h3>New User Registration</h3>
<table border='1'>
<tr>
<td><label>First Name</label></td>
<td> <input type="text" name="firstname" class="cfirstname" required /></td>
</tr>

<tr>
<td><label>Last Name</label></td>
<td><input type="text" name="lastname" class="clastname" required/></td>
</tr>

<tr>
<td>
<label>Phone Number</label></td>
<td><input pattern="[0-9]{10}" name="phonename" class="cphonename" required/></td>
</tr>

<tr>
<td><label>Email Address</label></td>
<td><input pattern="/^([a-zA-Z0-9_\.-]{3,}+)@([\da-zA-Z\.-]+)\.([a-zA-Z\.]{2,6})$/'" name="emailname" class="cemailname" required/></td>
</tr>

<tr>
<td><label>User Name</label></td>
<td><input type="text" name="regusername" class="cregusername" required/></td>
</tr>

<tr>
<td><label>Password</label></td>
<td><input type="password" name="regpasswordname" class=cregpasswordname" required/></td>
</tr>

<tr>
<td><label>Confirm Password</label></td>
<td><input type="password" name="regcpasswordname" class=cregcpasswordname" required/></td>
</tr>

<tr>
<td align='center'><input type="submit" name="savename" class="csavename" value="REGISTER" /></td>
<td align='center'><input type="reset"  value="RESET"/></td>
</tr>

</table>
</div> <!--Registration Div End-->

</form>

<?php
if (isset($_POST['loginname'])) 
{
$login_username=$_POST['logusername'];
$login_password=$_POST['logpasswordname'];
echo "<br>".$login_username."<br>".$login_password;

$check="test";

$crypt_check = md5($check);
echo "<br>".$crypt_check;

$crypt_login_password = md5($login_password);
echo "<br>".$crypt_login_password;

$login_check_sql="SELECT uid FROM ameex_user WHERE name='$login_username' and pass='$crypt_login_password'";
echo "<br>".$login_check_sql;

$result=mysqli_query($cn,$login_check_sql);
$count=mysqli_num_rows($result);
echo "<br>".$count;

// If result matched $username and $password, table row must be 1 row
if($count==1)
{
header("location:profile.php");
}
else
{
echo "Your Login Name or Password is invalid";
}
}
?>
<?php
if (isset($_POST['savename'])) 
{
//get value from form
$firstname =$_POST['firstname'];
$lastname =$_POST['lastname'];
$phone =$_POST['phonename'];
$mail =$_POST['emailname'];
$username=$_POST['regusername'];
$password=$_POST['regpasswordname'];
$confirm_password=$_POST['regcpasswordname'];

/*echo $firstname."<br>";
echo $lastname."<br>";
echo $phone."<br>";
echo $mail."<br>";
echo $username."<br>";
echo $password."<br>";
echo $confirm_password."<br>";
*/

$crypt_password = md5($password);										//encrypted Password
//echo $crypt_password."<br>";
										          
$login_sql = "INSERT INTO ameex_user(name,pass)VALUES('$username','$crypt_password')";                           //Login Query

$login_result = mysqli_query($cn,$login_sql) or die("Error in login Inserting " . mysqli_error($cn));

echo json_encode($login_result);			    

/*if(!$login_result)          	                 								// checking login
{
      die('Could not Enter Login Data: ' . mysql_error()); 
}else{
	//echo "<br><b>Entered login data successfully<b>\n";
}*/

$login_get_sql = "select uid from ameex_user where name='$username'";    				//getting user uid from ameex_user table

$login_get_result = mysqli_query($cn,$login_get_sql) or die("Error in getting uid from login" . mysqli_error($cn));

$uid=mysqli_fetch_array($login_get_result);
						
$user_uid=$uid['uid'];
												//Registration Query

$Reg_sql = "INSERT INTO ameex_user_profile (uid,first_name,last_name,mail,phone)VALUES('$user_uid','$firstname','$lastname','$mail','$phone')";

$Reg_result = mysqli_query($cn,$Reg_sql) or die("Error in Register Data Inserting " . mysqli_error($cn));

echo json_encode($Reg_result);			    

/*if(!$Reg_result) 
{
      die('Could not Enter Register data: ' . mysql_error()); 
}
else
{
	//echo "<br><b>Entered Registered data successfully<b>\n";
}*/
	


$Profile_sql = "SELECT ameex_user.uid, ameex_user.name, ameex_user.pass, ameex_user_profile.first_name, ameex_user_profile.last_name, ameex_user_profile.phone, ameex_user_profile.mail FROM ameex_user,ameex_user_profile where ameex_user.uid=ameex_user_profile.uid AND ameex_user.uid='$user_uid'";

//echo "<br>".$sql."<br><br>";

		$profile_result = mysqli_query($cn,$Profile_sql) or die("Error in Selecting " . mysqli_error($cn));

		$uid=mysqli_fetch_array($profile_result);
						
		$_SESSION['user_uid']=$uid['uid'];
		$_SESSION['user_name']=$uid['name'];
		$_SESSION['user_pass']=$uid['pass'];
		$_SESSION['user_firstname']=$uid['first_name'];
		$_SESSION['user_lastname']=$uid['last_name'];
		$_SESSION['user_phone']=$uid['phone'];
		$_SESSION['user_email']=$uid['mail'];
		$_SESSION['session_id'] =$_SESSION['user_uid'];
//echo 	$_SESSION['session_id'];
		header('location:profile.php');

mysqli_close($cn); //close the db connection
}
?>
</body>
</html>
