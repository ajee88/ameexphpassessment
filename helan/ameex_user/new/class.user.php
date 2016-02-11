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
include "db_config.php";
interface formItemInterface {
            function renderLabel();
            public function render();
}

interface userInterface extends formItemInterface {
             public function save();
             public function load($uid);
}

interface userAvatarInterface {
             public function save();
             public function load($uid);
}
class User implements userInterface
{
            
            public function renderLabel()
            {}
            public function render(){}
	   
	        public $db;
	        public function __construct(){
	            $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	 
	            if(mysqli_connect_errno()) {
	                echo "Error: Could not connect to database.";
	                    exit;
	            }
	        }
	 	       
	        public function reg_user($name,$pass,$cnfpass) /*** for registration process ***/
                 {
	 
	           if($pass===$cnfpass)
                       { 
	                  $sql="SELECT uid FROM ameex_user WHERE name='$name' and  pass='$pass'";
	                  $check =  $this->db->query($sql) ;//checking if the username in db
	                  $count_row = $check->num_rows;
                          $user_data = mysqli_fetch_array($check);
	                  $uid=$user_data['uid'];
	                   if ($count_row == 0)//if the username is not in db then insert to the table
                             {    
                                $user_data = mysqli_fetch_array($check);
	                        $sql1="INSERT INTO ameex_user SET name='$name', pass='$pass'";               
	                        $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot be inserted");
                                
                                
	                        return $result;
	                     }
	                    else { return false;}}
	           }
	 
	       
	         public function check_login($name, $pass, $cnfpass) /*** for login process ***/
                   {
	             if($pass===$cnfpass)
                       { 
	
	            $sql2="SELECT uid from ameex_user WHERE name='$name' and pass='$pass'";	             	            
	            $result = mysqli_query($this->db,$sql2);
	            $user_data = mysqli_fetch_array($result);                       
	            $count_row = $result->num_rows;
	              
                      
	            if ($count_row == 1)
                       {                       
                        $_SESSION['uid'] = $user_data['uid'];
                        $_SESSION['name']=$user_data['name'];
                        $uid=$_SESSION['uid'];   
	                $_SESSION['login'] = true;// this login var will use for the session login
                          return true;}
	           
	            else{
	                return false;
	            }}

	        }   
	        /*** for showing the username or fullname ***/
	        public function get_name($uid){
                        
                    //sql3="SELECT a.uid,a.name, a.pass, b.uri, b.size, b.type, b.iname FROM ameex_user a, ameex_user_avatar b WHERE $uid = b.uid";
                    
                    $sql3="SELECT * FROM ameex_user WHERE uid = '$uid'";
                    $sql4="SELECT * FROM ameex_user_avatar WHERE uid = '$uid'";
	            $result = mysqli_query($this->db,$sql3);
                    $iresult = mysqli_query($this->db,$sql4);
	            $user_data = mysqli_fetch_array($result);
                    $iuser_data=mysqli_fetch_array($iresult);
	               
                        $name=$user_data['name'];
                        $pass=$user_data['pass'];
                        $iname=$iuser_data['iname'];               
                        $type=$iuser_data['type'];
                        $size=$iuser_data['size'];
                        $uri=$iuser_data['uri'];
                        
	        }
	 
	        /*** starting the session ***/
	        public function get_session(){
	            return $_SESSION['login'];
	        }
	 
	        public function user_logout() {
	            $_SESSION['uid'] = false;
	            session_destroy();
                 }
                public function save(){}
                public function load($uid){}
	        
}
              class userAvatar implements userAvatarInterface{        


	        public $db;
	        public function __construct(){
	            $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	 
	            if(mysqli_connect_errno()) {
	                echo "Error: Could not connect to database.";
	                    exit;
	            }
	        }
                public function save(){ }

                public function store($uid,$name,$uri,$size,$type){
	         $sql4="INSERT INTO ameex_user_avatar SET iname='$name',uri='$uri',size='$size',type='$type'";        
                 $result = mysqli_query($this->db,$sql4) or die(mysqli_connect_errno()."Data cannot be inserted");
                 $user_data = mysqli_fetch_array($result);
                        $uid = $user_data['uid'];
                        $name=$user_data['name'];
                        $pass=$user_data['pass'];
                        $iname=$user_data['iname'];               
                        $type=$user_data['type'];
                        $size=$user_data['size'];
                        $uri=$user_data['uri'];
               }

	    
                public function load($uid){
                    $sql5="SELECT * FROM ameex_user_avatar WHERE uid = '$uid'";
                    $result = mysqli_query($this->db,$sql5);
	            $user_data = mysqli_fetch_array($result);
                                       
                }
}

