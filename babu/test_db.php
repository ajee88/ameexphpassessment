<?php  require "../dbconfig.php"; ?>
<?php
if(!$cn)// testing the connection  
{  
	die ("Cannot connect to the database");  
}
else
{
	echo "<br><b>connection created successfully</b><br>";
}

$firstname="testname";
$lastname="testlast";
$mail="Babumca2016@gmail";
$phone="8883755110";

/*
$login_sql = "INSERT INTO ameex_user(name,pass)VALUES('$username','$password')";
$login_result = mysqli_query($cn,$login_sql) or die("Error in login Inserting " . mysqli_error($cn));
echo json_encode($login_result);			    
if(!$login_result) 
{
      die('Could not Enter Login Data: ' . mysql_error()); 
}
	echo "<br><b>Entered login data successfully<b>\n";
 echo "<br><b>Login Data Deleted successfully<b>\n"; 
*/

$Reg_sql = "INSERT INTO ameex_user_profile (first_name,last_name,mail,phone)VALUES('$firstname','$lastname','$mail','$phone')";
//$Reg_sql="delete from ameex_user_profile where uid=0";
$Reg_result = mysqli_query($cn,$Reg_sql) or die("Error in Register Data Inserting " . mysqli_error($cn));
echo json_encode($Reg_result);			    
if(!$Reg_result) 
{
      die('Could not Enter Register data: ' . mysql_error()); 
}
	echo "<br><b>Entered Registered data successfully<b>\n";
	//echo "<br><b>Data Deleted successfully<b>\n";
	
mysqli_close($cn); //close the db connection
?>
