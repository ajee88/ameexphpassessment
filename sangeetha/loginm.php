<html>
<?php include 'design.php';?>
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
session_start();
$_SESSION['id']=0;
if(isset($_POST['submit']))
{
 mysql_connect('localhost','root','ameex') or die(mysql_error());
 mysql_select_db('sangeetha') or die(mysql_error());
 $name=$_POST['name'];
 $pwd=$_POST['pwd'];
 if($name!=''&&$pwd!='')
 {
   $query=mysql_query("select * from ameex_user where name='".$name."' and passwd='".$pwd."'") or die(mysql_error());
   $res=mysql_fetch_row($query);
   if($res)
   {
    $_SESSION['name']=$name;


    $_SESSION['fname']=$firstname ;

    header('location:profilemap.php');

   }
   else
   {
    echo'You entered username or password is incorrect';
   }
 }
 else
 {
  echo'Enter both username and password';
 }
}
?>
<div> <button type="button" onclick="window.location.href='http://localhost/project/files/loginm.php'">PROFILE VIEW</button></div>
</body>
</html>
