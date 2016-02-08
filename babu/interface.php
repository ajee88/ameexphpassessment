<?php
$s_id=$_SESSION['uid'];
require "../dbconfig.php";
$_SESSION['cn']=$cn;
//echo $s_id;
?>
<?php
//echo $_SESSION['cn'];
   	interface formItemInterface 
	{
	public function renderLabel();
	public function render($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$z,$A,$B,$C,$D,$E,$F,$G);
	}
	class formItem implements formItemInterface
	{
	
	public function renderLabel()
	{
	$this->username='User Name';
	$this->password='Password';
	$this->conf_password='Confirm Possword';
	$this->first_name='First Name';
	$this->last_name='Last Name';
	$this->phone_number='Phone Number';
	$this->email_address='Email Address';
	}

	public function render($type_txt,$user_name,$user_classname,$type_pwd,$pwd_name,$pwd_classname,$conf_pwd_name,$conf_pwd_classname,	$type_button,$button_name,$button_classname,$button_value,$first_name,$first_classname,$last_name,$last_classname,$phone_pattern,$phone_classname,$email_name,$email_classname,$Reg_user_name,$Reg_user_classname,$Reg_pwd_name,$Reg_pwd_classname,$Reg_conf_pwd_name,$Reg_conf_pwd_classname,$save_name,$save_classname,$save_value,$type_reset,$reset_value,$type_email,$phone_name) 
	{
	formItem::renderLabel();
	//echo $type_txt;

	echo "<div class='log'><form name='logform' method='POST'><center><caption><b>Account Information</b></caption>";  // login form
	echo "<table border='1' align='center'><tr><td>";
	echo "<labe>$this->username</label></td><td>";  //username
        echo "<input type='{$type_txt}' name='{$user_name}' class='{$user_classname}' required/></td></tr><tr><td>";
	echo "<labe>$this->password</label></td><td>"; //password
        echo "<input type='{$type_pwd}' name='{$pwd_name}' class='{$pwd_classname}' required/></td></tr><tr><td>";
	echo "<labe>$this->conf_password</label></td><td>";//Confirm password
 echo "<input type='{$type_pwd}' name='{$conf_pwd_name}' class='{$conf_pwd_classname}' required/></td></tr><tr><td colspan='2' align='center'>";
        echo "<input type='{$type_button}'name='{$button_name}'class='{$button_classname}'value='{$button_value}'/></td></tr></table><br>";
	echo "<label class='newuser'>Create New Account</label></form></div>";

		//registration form
echo "<div class='reg' style='display:none'><form name='regform' method='POST'><center><caption><b>New User Registration</b></caption>"; 
	echo "<table border='1'><tr><td>";
	echo "<labe>$this->first_name</label></td><td>";//firstname  
        echo "<input type='{$type_txt}' name='{$first_name}' class='{$first_classname}' required/></td></tr><tr><td>";
	echo "<labe>$this->last_name</label></td><td>";//lastname
        echo "<input type='{$type_txt}' name='{$last_name}' class='{$last_classname}' required/></td></tr><tr><td>";
	echo "<labe>$this->phone_number</label></td><td>";//phone
        echo "<input pattern='{$phone_pattern}' name='{$phone_name}' class='{$phone_classname}' required/></td></tr><tr><td>";
	echo "<labe>$this->email_address</label></td><td>";//email
	echo "<input pattern='{$type_email}' name='{$email_name}' class='{$email_classname}' required/></td></tr><tr><td>";
	echo "<labe>$this->username</label></td><td>";//Reg_username
        echo "<input type='{$type_txt}' name='{$Reg_user_name}' class='{$Reg_user_classname}' required/></td></tr><tr><td>";
	echo "<labe>$this->password</label></td><td>";//Reg_password
        echo "<input type='{$type_pwd}' name='{$Reg_pwd_name}' class='{$Reg_pwd_classname}' required/></td></tr><tr><td>";
	echo "<labe>$this->conf_password</label></td><td>";//Confirm password
        echo "<input type='{$type_pwd}' name='{$Reg_conf_pwd_name}' class='{$Reg_conf_pwd_classname}' required/><p id='cpwd_id'></p></td></tr>
		<tr><td align='center'>";
		//save button
        echo "<input type='{$type_button}' name='{$save_name}' class='{$save_classname}' value='{$save_value}' onclick='insert()'/></td><td align='center'>";
		//reset button
        echo "<input type='{$type_reset}'  value='{$reset_value}'/></td></tr></table></form></div>";

	$_SESSION['savename']=$this->save_name;

}
}

	$obj=new formItem();
	$obj->type_txt='text';
	$obj->user_name='username';                //username filed attribute values
	$obj->user_classname='cusername';

	$obj->type_pwd='password';
	$obj->pwd_name='password';                //password filed attribute values
	$obj->pwd_classname='cpassword';

	$obj->conf_pwd_name='conf_password';
	$obj->conf_pwd_classname='cconf_password';  //confirm password filed attribute values

	$obj->type_button='submit';
	$obj->button_name='loginname';
	$obj->button_classname='cloginname';                 //login filed attribute values
	$obj->button_value='Log In';
	
	$obj->first_name='firstname';
	$obj->first_classname='cfirstname';                //firstname filed attribute values

	$obj->last_name='lastname';
	$obj->last_classname='clastname';                //lastname filed attribute values

	$obj->phone_pattern='[0-9]{10}';
	$obj->phone_name='phonename';                 //phone no filed attribute values
	$obj->phone_classname='cphonename';
	
	$obj->type_email='[a-zA-Z0-9]{3,}@[a-zA-Z]{3,}[.]{1}[a-zA-Z]{2,}';
	$obj->email_name='emailname';
	$obj->email_classname='cemailname';                //email id filed attribute values

	$obj->Reg_user_name='Reg_username';
	$obj->Reg_user_classname='Reg_cusername'; 

	$obj->Reg_pwd_name='Reg_password';
	$obj->Reg_pwd_classname='Reg_pwdclassname';

	$obj->Reg_conf_pwd_name='Reg_confpassword';
	$obj->Reg_conf_pwd_classname='Reg_confpwdclassname';

	$obj->save_name='savename';
	$obj->save_classname='csavename';	                //save filed attribute values
	$obj->save_value='Save';

	$obj->type_reset='reset';
	$obj->reset_value='Reset';		               //clear filed attribute values
	
	$obj->render($obj->type_txt,$obj->user_name,$obj->user_classname,$obj->type_pwd,$obj->pwd_name,$obj->pwd_classname,$obj->conf_pwd_name,
	$obj->conf_pwd_classname,$obj->type_button,$obj->button_name,$obj->button_classname,$obj->button_value,$obj->first_name,$obj->first_classname,$obj->last_name,$obj->last_classname,$obj->phone_pattern,$obj->phone_classname,$obj->email_name,$obj->email_classname,$obj->Reg_user_name,$obj->Reg_user_classname,$obj->Reg_pwd_name,$obj->Reg_pwd_classname,$obj->Reg_conf_pwd_name,$obj->Reg_conf_pwd_classname,$obj->save_name,$obj->save_classname,$obj->save_value,$obj->type_reset,$obj->reset_value,$obj->type_email,$obj->phone_name); //values passing... 
	
interface userInterface 
{
	public function save();
	public function load($uid = 0);
}
class  user implements userInterface
{
	public function save()
	{
	}
        
	public function load($uid = 0)
	{
			$cn=$_SESSION['cn'];
                	if(!$cn)// testing the connection  
                	{  
                	    die ("Cannot connect to the database");  
                	}
			else
			{
			//echo "connection created";   
			 //fetch table rows from mysql db

		//ameex_user_table_records
				$sql_login="select * from ameex_user";
 				$result_login = mysqli_query($cn, $sql_login) or die("Error in Selecting " . mysqli_error($connection));
				//create an array
			        $login_array = array();
			        while($row =mysqli_fetch_assoc($result_login))
    				{
				        $login_array[] = $row;
    				}
				echo "<br><b>Ameex User Details</b><br>";
			        echo json_encode($login_array)."<br>";
		    
			    //close the db connection
			    //mysqli_close($cn);
			}
	}
}
	$user_obj=new user();
	$user_obj->save();
	$user_obj->load('uid');

interface userProfileInterface 
{
	public function save();
	public function load($uid = 0);
}
class userProfile implements userProfileInterface
{
	public function save()
	{
/*	
$firstname=$_SESSION['firstname'];
$lastname=$_SESSION['lastname'];
$phone=$_SESSION['phone'];
$mail=$_SESSION['mail'];
echo $firstname;
*/
	}
	 function load($uid = 0)
	{
		$cn=$_SESSION['cn'];
		if(!$cn)// testing the connection  
                	{  
                	    die ("Cannot connect to the database");  
                	}
			else
			{
				echo "<br><b>Ameex User Profile Details</b><br>";   
			 //fetch table rows from mysql db

		//ameex_user_table_records
			    $sql = "select * from ameex_user_profile";
			    $result = mysqli_query($cn,$sql) or die("Error in Selecting " . mysqli_error($connection));
			    //create an array
			    $profile_array = array();
			    while($row =mysqli_fetch_assoc($result))
    				{
				        $profile_array[] = $row;
    				}
			    echo json_encode($profile_array);
			    
			    //close the db connection
	
			}
	}
}
	$userProfile_obj=new userProfile();
	$userProfile_obj->save();
	$userProfile_obj->load('uid');

?>
