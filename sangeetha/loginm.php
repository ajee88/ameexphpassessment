<html>
<?php include 'design.php';
ini_set('error_reporting', E_ALL|E_STRICT);
ini_set('display_errors', 1);
?>
<head>
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }
</style>



</head>
<?php
session_start();
require "dbconfig.php";
?>
<body>
<h1>LOGIN<h1>
<form method='post'>
<table cellspacing='5' align='center' border='10'>
<tr><td>Name:</td><td><input type='text' name='name' size="30" placeholder="Enter name" /></td></tr>
<tr><td>Password:</td><td><input type='password' name='pwd' size="30" placeholder="Password"/></td></tr>
<tr><th colspan='5'><input type='submit' name='submit' value='SUBMIT'/><input type='reset' name='reset' value='RESET'/></th></tr>
</table>
</form>

<?php

if(isset($_POST['submit']))
{

 $name=$_POST['name'];

 $pwd=$_POST['pwd'];

 if($name!=''&&$pwd!='')
 {
   $sql=mysqli_query("select * from ameex_user where name='".$name."' and pass='".$pwd."'") or die(mysql_error());
 $result=mysqli_query($cn,$sql) or  die("Error in Selecting " . mysqli_error($cn));
  // $res=mysql_fetch_row($query);
   if($result)
   {
    $_SESSION['name']=$name;

 $get_sql_id = "select uid from ameex_user where name='$name'";
  //getting user uid
                $res = mysqli_query($cn,$get_sql_id) or die("Error in getting uid from login" . mysqli_error($cn));
                $uid=mysqli_fetch_array($res);
 $userid=$uid['uid']; 
$_SESSION['userid']=$userid;
    //$_SESSION['fname']=$firstname ;

    header('location:index.php');

   }

}

}


?>

</body>
<?php 
mysqli_close($cn); ?>
</html>
