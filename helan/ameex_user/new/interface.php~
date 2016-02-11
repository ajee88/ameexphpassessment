<!DOCTYPE HTML>
<html>
<head>
<title>Helan | PHP Assessment</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<?php
interface formItemInterface {
function renderLabel();
public function render();
}

interface userInterface extends formItemInterface {
public function save();
public function load($uid = 0);
}

interface userAvatarInterface {
public function save();
public function load($uid = 0);
}
class user implements userInterface
{
//type variables
 public $text;
 public $password;
 public $button;

//name variables
public $uid;
public $username;
public $upassword;
public $cnfPassword;

//class variables
public $unameclass;
public $pclass;
public $cnfpclass;
public $bclass; 

//label variables
public $unamelabel;
public $plabel;
public $blabel;
public $cnfplabel;

 function renderLabel()
{
$this->text="text";
$this->password="password";
$this->username="UserName";
$this->unamelabel="UserName";
$this->unameclass="uclass";







}
public function render()
{
echo "
            <label for='{$this->username}'>{$this->unamelabel}</label>
            <input type='{$this->text}' name='{$this->username}' class='{$this->unameclass}' /><br>

            <label for='{$this->username}'>{$this->unamelabel}</label>
            <input type='{$this->text}' name='{$this->username}' class='{$this->unameclass}' /><br>

";
}


public function save()
{
 require "db.php";
echo "save function";
}
public function load($uid = 0)
{
echo "load function";
}

}

$userobj=new user();
$userobj->renderLabel();
$userobj->render();
$userobj->save();
$userobj->load();

?>
</html>
