<!DOCTYPE HTML>
<html>
<head>
<title>Babu | PHP Assessment</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<?php // <label for='{$this->username}'>{$this->unamelabel}</label>
          //  <input type='{$this->text}' name='{$this->username}' class='{$this->unameclass}' /><br>
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
public $bname;
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
//public $blabel;
 function renderLabel()
{
$this->text="text";
$this->password="password";
$this->username="UserName";
$this->unamelabel="UserName";
$this->unameclass="uclass";


$this->button="button";
$this->bname="submit";
$this->blabel="submit";






}
public function render()
{
echo "
            <label for='{$this->username}'>{$this->unamelabel}</label>
            <input type='{$this->text}' name='{$this->username}' class='{$this->unameclass}' /><br> ";
echo "
            <label for='{$this->bname}'>{$this->blabel}</label>
            <input type='{$this->button}' value='{$this->bname}' /><br> ";

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
$user1=new user();
$user1->renderLabel();

$user2=new user();
$user2->renderLabel();
$user2->render();

?>
</html>
