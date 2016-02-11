<html><head><script>
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
	<style><!--
	 body{
	 font-family:Arial, Helvetica, sans-serif;
	 }
	 h1{
	 font-family:'Georgia', Times New Roman, Times, serif;
	 }

div#sub {float:left;}div#myimage{float:right;}div#detail{float:right;}
--></style> </head>
        <form name="frm" method="post" enctype="multipart/form-data">
	<div id="container"><br>
	<center><div id="header"><a href="index.php?q=logout">LOGOUT</a></div><br></center>
	<div id="main-body">
        <img id="myimage" height="100">
        <input type="file" name="img" id="bu" onchange="onFileSelected(event)">  </div>
        <div id="sub">   <input type="submit" name="sub" value="Store" /> <br><br>    </div>

<br>
<br>

<?php
session_start();   
	               $puid=$_SESSION['uid'];
                       $pname=$_SESSION['name'];
                       $pnewname=$_SESSION['iname'];
                       $ptype=$_SESSION['type'];
                       $psize=$_SESSION['size'];
                       $pfulltarget=$_SESSION['uri'];
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
	$_SESSION['set'] ==0;
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
$newname=uniqid();
//$ext=end(explode('.',$name));
$fullname=$newname.".".$ext;
$target="upload/";
$fulltarget=$target.$fullname;
if(move_uploaded_file($_FILES['img']['tmp_name'],$fulltarget))
{
$useravatar=new useravatar();
$useravatar->store($puid,$newname,$fulltarget,$type,$size);
                       $puid=$_SESSION['uid'];
                       $pname=$_SESSION['name'];
                       $pnewname=$_SESSION['iname'];
                       $ptype=$_SESSION['type'];
                       $psize=$_SESSION['size'];
                       $pfulltarget=$_SESSION['uri'];
}
else
{
    echo "Failed";
}
}
echo "<img src='$fulltarget'  style='width:90px'/>"."<br><br>";
echo "     "."User ID:"."     "."<td><input type='text' value='$puid' readonly/></td>"."<br>";
echo "     "."User name:"."     "."<td><input type='text' value='$pname' readonly/></td>"."<br>";
echo "     "."image name:"."     "."<td><input type='text' value='$fullname' readonly/></td>"."<br>";
echo "     "."uri:"."     "."<td><input type='text' size='28' value='$fulltarget' readonly/></td>"."<br>";
echo "     "."size:"."     "."<td><input type='text' size='28' value='$size' readonly/></td>"."<br>";
echo "     "."type:"."     "."<td><input type='text' value='$type' readonly/></td>"."<br><br>";
echo " ********************************************************************************    ";
}
if($_SESSION['set'] ==1)
 { ?> <div id="updetail">
<?php 
echo "<br><br>OLD IMAGE<br><br>";
   echo "<img src='$pfulltarget'  style='width:90px'/>"."<br>"; 
 ?> 
        
 <br>
     
       User ID:   <input type="text" name="name" value="<?php echo $puid?>"readonly><br>
       User name: <input type="text" name="name" id="text6" value="<?php echo $pname?>" readonly><br>  
       image name:<input type="text" name="name" id="text5" value="<?php echo $pnewname?>"readonly><br>       
       uri:       <input type="text" size="28" name="name" id="text3" value="<?php echo $pfulltarget?>"readonly><br>
       size:      <input type="text" name="name" id="text4" value="<?php echo $psize?>"readonly><br>
       type:      <input type="text" name="name" id="text5" value="<?php echo $ptype?>"readonly><br></div>

   
<?php } ?>

</form>
</html>

