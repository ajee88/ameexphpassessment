<?php require "../dbconfig.php"; ?>

<?php

interface userInterface {
    
    public function save();
    public function load($uid = 0);
}

class user implements userInterface
{

 public $uid;
 public $usernname;
 public $password;

public function load($uid = 0)
{
    $this->uid = $uid;
    $this->username= $name;
    $this->password = $pass;
}
public function save()
{
 echo $this->uid;
 echo $this->username;
 echo $this->password;
}
$sql = "select uid from ameex_user where name='$username'";
 $result = mysqli_query($cn,$sql) or  die("Error in Selecting " . mysqli_error($connection)); 
$id = json_encode($result);
echo $id;
$sql1 = "select name from ameex_user where name='$username'";
 $result = mysqli_query($cn,$sql1) or  die("Error in Selecting " . mysqli_error($connection)); 
$name = json_encode($result);
echo $name;
$sql2 = "select password from ameex_user where name='$username'";
 $result = mysqli_query($cn,$sql2) or  die("Error in Selecting " . mysqli_error($connection)); 
$pass = json_encode($result);
echo  $pass;

$user_object = new user();
$user_object->uid = $id; 
$user_object->$username=$name;
$user_object->$password=$pass;
$user_object->load($user_object->uid );
$user_object->save();
?>