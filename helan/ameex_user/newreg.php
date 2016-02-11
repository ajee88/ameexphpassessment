 <html>

	<style><!--
	 #container{width:400px; margin: 0 auto;}
	--></style>

<form name="myForm" method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data" onsubmit="return (validateForm(this));">
<table>
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
<td>
<div id="a1">
<input type="file" name="img" /><br />
</div>
</td>
<td>
<input type="Submit" name="submit" value="Store"">
</td>
</form>
</tr>

</table><a href="index.php">Already registered! Click Here!</a>	</body>
</html>
<?php
require "dbconfig.php"; 
//$_SESSION['cn']=$_SESSION['cn']=$cn;
$_SESSION['cn']=$cn;
$cn=$_SESSION['cn'];
//session_start();
//$_SESSION['id']=0;
//ini_set('display_error',1);
//ini_set('display_startup_error',1);
//error_reporting(E_ALL);
//$submit=$_POST['sub'];

if(!$cn)// testing the connection  
                	{  
                	    die ("Cannot connect to the database");  
                	}
			else
			{
			    echo "<br><b>connection created successfully</b><br>";
			}
if(isset($_POST['submit']))
{
  
 $uname=$_POST['name'];
 $pass=$_POST['pass'];
 $cnfpass=$_POST['cnfpass'];
  
$name=$_FILES['img']['name'];
$type=$_FILES['img']['type'];
$size=($_FILES['img']['size'])/1024;
$ext=end(explode('.',$name));
if (($ext == "gif")
|| ($ext == "jpeg")
|| ($ext == "jpg")
|| ($ext =="png")
&& ($size > 30))
{
$newname=uniqid();
//$ext=end(explode('.',$name));
$fullname=$newname.".".$ext;
$target="upload/";
$fulltarget=$target.$fullname;
if(move_uploaded_file($_FILES['img']['tmp_name'],$fulltarget))
{
    echo "Success<br>";
    echo "Image id: $name";
}
else
{
    echo "Failed";
}
}

else{
    echo "not successful";
    }
if($pass===$cnfpass)
                       {

	$sql1 = "INSERT INTO ameex_user(name,pass)VALUES('$uname','$pass')";
		$result = mysqli_query($cn,$sql1) or die("Error in register Inserting " . mysqli_error($cn));		  
		//echo json_encode($result);
		$sqll ="select * from ameex_user";
		$resultt = mysqli_query($cn,$sqll) or die("Error in ameex_avatar Inserting " . mysqli_error($cn));
	 
                while($row1 =mysqli_fetch_assoc($resultt))
    				{
				       $user_array[] = $row1;
                                      
    				}
			    echo json_encode($user_array)."<br><br>";
                  	    echo "printed user table";
	if($result) 	{
	$sql2="select uid from ameex_user where name='$uname'";       
	$result1 = mysqli_query($cn,$sql2) or die("Error in selecting registerd data " . mysqli_error($cn));
        $user_data = mysqli_fetch_array($result1);
	$_SESSION['uid']=$uid=$user_data['uid'];
       // echo $uid;
	echo "<br><b>Entered data successfully<b>\n";
	//echo json_encode($uid);			
				     
   	        $uid=$_SESSION['uid']; 

                $sql3 ="insert into ameex_user_avatar(uid,name,uri,filetype,filesize)values('$uid','$newname','$fulltarget','$type','$size')";
		$result2 = mysqli_query($cn,$sql3) or die("Error in ameex_user_avatar Inserting " . mysqli_error($cn));
		echo json_encode($result2);
                           if(!$result2) 
				{
				      die('Could not enter data(user avatar table): ' . mysql_error()); 
   				}
   				   echo "<br><b>Entered data successfully<b>\n";
			

		$sql4 ="select * from ameex_user_avatar";
		$result3 = mysqli_query($cn,$sql4) or die("Error in ameex_avatar Inserting " . mysqli_error($cn));
		echo json_encode($result3);
		$user_array = array();
                $user_avatar = array();
                while($row2 =mysqli_fetch_assoc($result3))
    				{
				      
                                       $user_avatar[]=$row2;
    				}
			
                           echo json_encode($user_avatar)."<br><br>";

	 echo 'Registration successful <a href="index.php">Click here</a> to login';
	 } 
       else {
	 // Registration Failed
	 echo 'Registration failed. Username already exits please try again';
	 }

			         

} mysqli_close($cn); 
}
?>


