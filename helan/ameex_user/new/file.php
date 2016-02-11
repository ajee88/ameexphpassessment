<?php
session_start();
	include "class.user.php";
	$user = new User(); 
        $uid = $_SESSION['uid'];
       
	if (!$user->get_session()){
	 header("location:login.php");
	}
	 
	if (isset($_GET['q'])){
	 $user->user_logout();
	 header("location:login.php");
	 }


if (isset($_REQUEST['sub'])){
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
}


?>
<html>
<body>
<form name="frm" method="post" enctype="multipart/form-data">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	Home
	<style><!--
	 body{
	 font-family:Arial, Helvetica, sans-serif;
	 }
	 h1{
	 font-family:'Georgia', Times New Roman, Times, serif;
	 }
	--></style>
	<div id="container">
	<div id="header"><a href="login.php?q=logout">LOGOUT</a></div>
	<div id="main-body">
	<h1>Hello <?php $user->get_name($uid); ?></h1>
	</div>
        <div id="a1">
        <input type="file" name="img" /><br />

        <input type="submit" name="sub" value="Store" />
        </form>
        </div>
        <div id="a2">
        <?php echo "<img src='$fulltarget'>";?>
        </div>
        <div id="edit">
        <input type="">
        </div>
	<div id="footer"></div>
	</div>
</form>
</body>
</html>
