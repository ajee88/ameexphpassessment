<?php
session_start();    
	              $uid=$_SESSION['uid'];
                      $name=$_SESSION['name'];
                       $iname=$_SESSION['iname'];
                       $type=$_SESSION['type'];
                       $size=$_SESSION['size'];
                       $uri=$_SESSION['uri'];
	include "class.user.php";
	$user = new User(); 

	if (!$user->get_session()){
	 header("location:index.php");
	}

	if (isset($_GET['q'])){ 

	 $user->user_logout();
	 header("location:index.php");
	 }

    	 if (isset($_POST['sub']))
           {     
 
	  $iname=$_FILES['img']['name'];
	  $type=$_FILES['img']['type'];

	  $size=($_FILES['img']['size'])/1024;

	  $ext=end(explode('.',$iname));
	    if (($ext == "gif")
	       || ($ext == "jpeg")
	       || ($ext == "jpg")
	       || ($ext =="png")
	       && ($size > 30))
	         {

	           $iname=uniqid();
	           //$ext=end(explode('.',$name));
	           $fullname=$iname.".".$ext;
	           $target="upload/";
	           $uri=$target.$fullname;
		if(move_uploaded_file($_FILES['img']['tmp_name'],$uri))
		{
                 //echo "Success<br>";
                 //echo "Image id: $iname"."<br>";
                }
                else
                  {
                    echo "Failed";
                  }
             }
//$userAvatar=new userAvatar();
//$userAvatar->store($uid,$iname,$uri,$size,$type);
//$user->save($uid,$iname,$uri,$size,$type);
}

    if(isset($_POST['edit'])){
    $user->load($uid);
}
?>

<html>
<form name="frm" method="post" enctype="multipart/form-data">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<style><!--
	 body{
	 font-family:Arial, Helvetica, sans-serif;
	 }
	 h1{
	 font-family:'Georgia', Times New Roman, Times, serif;
	 }
div#im{
 float:left;
}

div#sub {
float:left;
}
	--></style> 
	<div id="container">
	<div id="header"><a href="login.php?q=logout">LOGOUT</a></div>
	<div id="main-body">
	<?php $user->get_name($uid); ?>

         <div id="im">
        <?php echo "<img src='$uri'  style='width:90px'/>"." "; ?>
        <input type="file" name="img"  title="<?php echo $uri;?>">  </div>

        <div id="sub">
       <input type="submit" name="sub" value="Store" /> <br>
       User ID:   <input type="text" name="name" value="<?php echo $uid?>"readonly><br>
       User name: <input type="text" name="name" id="text6" value="<?php echo $name?>" readonly><br>  
       image name:<input type="text" name="name" id="text5" value="<?php echo $iname?>"readonly><br>       
       uri:       <input type="text" size="28" name="name" id="text3" value="<?php echo $uri?>"readonly><br>
       size:      <input type="text" name="name" id="text4" value="<?php echo $size?>"readonly><br>
       type:      <input type="text" name="name" id="text5" value="<?php echo $type?>"readonly><br>

       </div>
       </div></div>

</form>
</html>

