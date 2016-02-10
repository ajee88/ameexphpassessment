<?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="ameex"; // Mysql password 
$db_name="sangeetha"; // Database name 
$tbl_name="ameex_loc"; // Table name




$id=$_POST['id'];
$n1=$_POST['name'];
$n2=$_POST['st'];
$n3=$_POST['ct'];
$n4=$_POST['zip'];
$n5=$_POST['stt'];
$n6=$_POST['cn'];
$n7=$_POST['l1'];
$n8=$_POST['l2'];



// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");


// update data in mysql database 
$sql="UPDATE $tbl_name SET name='$n1',street='$n2', city='$n3', zip='$n4', state='$n5', country='$n6', lat='$n7', lng='$n8' WHERE id='$id'";
$result=mysql_query($sql);
// if successfully updated. 
if($result){
echo "Successful";

echo "<BR>";
echo "<a href='loginm.php'>View result</a>";
}

else {
echo "ERROR";
}

?>


