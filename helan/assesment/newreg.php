 <html>

<head>	
<style><!--
 #container{width:400px; margin: 0 auto;}
--></style>

<script>
function onFileSelected(event) {
  var selectedFile = event.target.files[0];
  var reader = new FileReader();

  var imgtag = document.getElementById("myimage");
  imgtag.title = selectedFile.name;
  
  reader.onload = function(event) {
    imgtag.src = event.target.result; 
  };

  reader.readAsDataURL(selectedFile);
}
</script>
</head>

<form name="myForm" method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
<table>
<div id="container">
	<h1>Registration Here</h1>
	<form action="" method="post" name="reg">
	<table>	
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
	<img id="myimage" height="100">
	<input type="file" name="img" onchange="onFileSelected(event)" required=""/><br />
	</td>
	<td>
	<input type="Submit" name="submit" value="Store"">
	</td>	
	</tr></div>
	</table><a href="index.php">Already registered! Click Here!</a><br><br><br></form>
	</html>
<?php
require "dbconfig.php"; 
$_SESSION['cn']=$cn;
$cn=$_SESSION['cn'];


if(!$cn)// testing the connection  
                	{  
                	    die ("Cannot connect to the database");  
                	}
			else
			{
			   
if(isset($_POST['submit']))
{ 
	 $uname=$_POST['name'];
	 $pass=$_POST['pass'];
 	$cnfpass=$_POST['cnfpass'];
  
if($pass==$cnfpass)
  {
  
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
	$ext=end(explode('.',$name));
	$fullname=$newname.".".$ext;
	$target="upload/";
	$fulltarget=$target.$fullname; 

    if(move_uploaded_file($_FILES['img']['tmp_name'],$fulltarget))
	{

	echo "<img src='$fulltarget'  style='width:90px'/>"."<br><br>";
	echo "     "."ImageName:"."     "."<td><input type='text' value='$fullname' readonly/></td>"."<br>";
	echo "     "."uri:"."     "."<td><input type='text' value='$fulltarget' readonly/></td>"."<br>";
	echo "     "."type:"."     "."<td><input type='text' value='$type' readonly/></td>"."<br>";
	echo "     "."size:"."     "."<td><input type='text' value='$size' readonly/></td>"."<br><br>";
	
        }
	else
	{
    	echo "Failed";
	}
   }

else{
    echo "not successful";
    }

                      

	        $sql1 = "INSERT INTO ameex_user(name,pass)VALUES('$uname','$pass')";
		$result = mysqli_query($cn,$sql1) or die("Error in register Inserting " . mysqli_error($cn));		  		
		$sqll ="select * from ameex_user";
		$resultt = mysqli_query($cn,$sqll) or die("Error in ameex_avatar Inserting " . mysqli_error($cn));
	 
                  	} 
 			else 
                          {
				echo "unmatched password"."<br>";  
			  }  //echo "printed user table";
	if($result) 
	{
	$sql2="select uid from ameex_user where name='$uname'";       
	$result1 = mysqli_query($cn,$sql2) or die("Error in selecting registerd data " . mysqli_error($cn));
        $user_data = mysqli_fetch_array($result1);
	$_SESSION['uid']=$uid=$user_data['uid'];	
   	$uid=$_SESSION['uid']; 

        $sql3 ="insert into ameex_user_avatar(uid,name,uri,filetype,filesize)values('$uid','$fullname','$fulltarget','$type','$size')";
	$result2 = mysqli_query($cn,$sql3) or die("Error in ameex_user_avatar Inserting " . mysqli_error($cn));
		
        if(!$result2) 
	{
           die('Could not enter data(user avatar table): ' . mysql_error()); 
        }
   				 
	$sql4 ="select * from ameex_user_avatar";
	$result3 = mysqli_query($cn,$sql4) or die("Error in ameex_avatar Inserting " . mysqli_error($cn));		
	echo 'Registration successful <a href="index.php">Click here</a> to login'."<br>";
	 }
       else {
	 // Registration Failed
	 echo 'Registration failed.';
	    }

	}		         

 mysqli_close($cn); 
}
?>


