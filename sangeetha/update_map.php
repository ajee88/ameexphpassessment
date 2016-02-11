
<?php
session_start();
require "dbconfig.php"; 



$id=$_POST['id'];
$name=$_POST['name'];
$street=$_POST['strt'];
$addi=$_POST['st'];
$city=$_POST['ct'];
$prov=$_POST['pro'];
$post=$_POST['zip'];
$countr=$_POST['cn'];
$lat=$_POST['l1'];
$lng=$_POST['l2'];



// Connect to server and select database.
  if (!$cn) {
    die("Connection failed: " . mysqli_connect_error());
    
    //$conn->close();
  }
  else
  { 

 //echo "Connected successfully";
 
  }?>
<?php
// update data in mysql database 
//$sql="UPDATE  SET id ='$id',name='$n1',street='$n2', city='$n3', zip='$n4', state='$n5', country='$n6', lat='$n7', lng='$n8' WHERE id='$id'";





$sql= "UPDATE ameex_user JOIN ameex_user_location ON ameex_user.uid = ameex_user_location.uid SET ameex_user.uid ='$id', ameex_user.name='$name',ameex_user_location.street='$street',ameex_user_location.additional='$addi' ,ameex_user_location.city='$city', ameex_user_location.postal_code='$post', ameex_user_location.province='$prov', ameex_user_location.country='$countr', ameex_user_location.latitude='$lat', ameex_user_location.longitude='$long'  WHERE ameex_user.uid='" . $id . "'";
$result=mysqli_query($cn,$sql) or  die("Error in Selecting " . mysqli_error($cn));
//$result=mysql_query($sql);
// if successfully updated. 
if($result){

echo "UPDATED PROFILE FOR YOU";

echo "<BR>";
echo "<BR>";
echo "<BR>";
echo'<a href="signout.php">Signout</a>';
echo "<BR>";
include 'profilemap.php';



}

else {
echo "ERROR";
}

?>


