<!DOCTYPE HTML>
<html>
<head>
<title>Helan | PHP Assessment</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<?php 
require "dbconfig.php"; 
$_SESSION['cn']=$cn;

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
	   
    
	 	       	     		       
	         public function check_login($name, $pass) /*** for login process ***/
                   {
                 $cn=$_SESSION['cn'];
	    
	           if(!$cn)// testing the connection  
                	{  
                	    die ("Cannot connect to the database");  
                	}
			else
			{
			    
	            $sql2="SELECT uid from ameex_user WHERE name='$name' and pass='$pass'";	             	            
	            $check=mysqli_query($cn,$sql2) or die("Error in selecting registerd data " . mysqli_error($cn));
	            $user_data = mysqli_fetch_array($check);                      
	            $count_row = $check->num_rows;
	              
                      
	            if ($count_row == 1)
                       {
                    $_SESSION['uid'] = $user_data['uid'];
                    $_SESSION['name']=$user_data['name'];
                    $uid=$_SESSION['uid'];
    
                    $sqlimg="SELECT * from ameex_user_avatar WHERE uid='$uid'";	             	            
	            $check1=mysqli_query($cn,$sqlimg) or die("Error in selecting registerd data " . mysqli_error($cn));
	            $user_data = mysqli_fetch_array($check1);

                     $_SESSION['iname'] = $user_data['name'];
                     $_SESSION['uri']=$user_data['uri'];              
                     $_SESSION['type']=$user_data['filetype'];
                     $_SESSION['size']=$user_data['filesize'];
	                
                        $_SESSION['login'] = true;// this login var will use for the session login
                        $_SESSION['set'] =1;//img update
                          return true;
                        }
	           
	            else
                    {
	                return false;
	            }
		}

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


	
                public function save(){ }
                
                public function store($uid,$newname,$fulltarget,$type,$size){$cn=$_SESSION['cn'];
                 if(!$cn)// testing the connection  
                	{  
                	    die ("Cannot connect to the database");  
                	}
			else
			{
			    echo "<br><b>UPDATED IMAGE</b><br>";
			
//$sq="UPDATE ameex_user,ameex_user_avatar SET ameex_user.name='$uname',ameex_user_avatar.name='$newname',uri='$fulltarget',filetype='$type',filesize='$size' WHERE ameex_user.$uid=ameex_user_avatar.$uid";

		$sqlims="UPDATE ameex_user_avatar SET name='$newname',uri='$fulltarget',filetype='$type',filesize='$size' WHERE uid='$uid'";
                        $result = mysqli_query($cn,$sqlims) or die("Error in selecting registerd data " . mysqli_error($cn));
			$sqlup="select * from ameex_user_avatar";
 			$result1 = mysqli_query($cn,$sqlup) or die("Error in selecting registerd data " . mysqli_error($cn));
                        $user_data = mysqli_fetch_array($result1);


                                         
                     $_SESSION['iname'] = $user_data['name'];
                     $_SESSION['uri']=$user_data['uri'];              
                     $_SESSION['type']=$user_data['filetype'];
                     $_SESSION['size']=$user_data['filesize'];
               
	      }      
	 }         
	    
                public function load($uid){
                    $sql5="SELECT * FROM ameex_user_avatar WHERE uid = '$uid'";
                    $result = mysqli_query($this->db,$sql5);
	            $user_data = mysqli_fetch_array($result);
                                       
                }
}

