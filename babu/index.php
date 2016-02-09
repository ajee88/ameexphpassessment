<?php
session_start();
$_SESSION['uid']=1;
require "../dbconfig.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Babu | PHP Assessment</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Hiding Login Page and showing registration page-->

<script>
function insert()
{
//alert("insert");
//alert("before if");
var password = document.regform.getElementById(".Reg_pwdclassname");
var Confirm_password = document.regform.getElementById(".Reg_confpwdclassname");
//alert("before if");
if(password.value == Confirm_password.value)
{alert("password match correctly");}else{alert("not matchh");}
}
</script>
<script>
$(document).ready(function () {
    $(".save_classname").click(function (e) {
        e.preventDefault();
        var matched,
            password = $(".Reg_pwdclassname").val(),
            confirm = $(".Reg_confpwdclassname").val();

        matched = (password == confirm) ? true : false;
        if(matched) { 
           //Shows success message and prevents submission.  In production, comment out the next 2 lines.
           // $("#cpwd_id").html("Passwords Match");
		alert("correct");
            return false;
    }
    else { 
//        $("#cpwd_id").html("Passwords don't match..."); 
		alert("not match");
        return false;
    }
});
</script>				

<script>
 document.getElementById(".save_classname").onclick = function () {
        location.href = "https://www.google.co.in/";
    };
</script>
<script>
$(document).ready(function()
{
    $(".newuser").click(function()  
    {
	$(".log").hide();
	$(".reg").show();
    });
});
</script>
<!-- client side validation -->
	</head>
	<body algin="center">	
	<form name="indexform" method="post">
		<div class="container">
			<div class="inner-container">
				<?php include 'interface.php';?>
			</div>
			</div>
</form>
<?php
if (isset($_POST['savename'])) 
{
//get value from form
$firstname =$_POST['firstname'];
$lastname =$_POST['lastname'];
$phone =$_POST['phonename'];
$mail =$_POST['emailname'];
$username=$_POST['Reg_username'];
$password=$_POST['Reg_password'];
$confirm_password=$_POST['Reg_confpassword'];
echo $firstname."<br>";
echo $lastname."<br>";
echo $phone."<br>";
echo $mail."<br>";
echo $username."<br>";
echo $password."<br>";
echo $confirm_password."<br>";
// Get the hash, letting the salt be automatically generated
$hash = crypt($password);
echo $hash."<br>";

//$login_sql="delete from ameex_user where uid=62";
$login_sql = "INSERT INTO ameex_user(name,pass)VALUES('$username','$hash')"; //login query
$login_result = mysqli_query($cn,$login_sql) or die("Error in login Inserting " . mysqli_error($cn));
echo json_encode($login_result);			    
if(!$login_result)          	                 // checking login
{
      die('Could not Enter Login Data: ' . mysql_error()); 
}
	echo "<br><b>Entered login data successfully<b>\n";
 //echo "<br><b>Login Data Deleted successfully<b>\n"; 

$login_get_sql = "select uid from ameex_user where name='$username'";    //getting user uid
$login_get_result = mysqli_query($cn,$login_get_sql) or die("Error in getting uid from login" . mysqli_error($cn));
$uid=mysqli_fetch_array($login_get_result);
						//echo json_encode($uid['uid']);
$user_uid=$uid['uid'];
			/*	//create an array
			    $uid_array = array();
			    while($row =mysqli_fetch_assoc($login_get_result))
    				{
				        $uid_array[] = $row;
    				}
			    echo json_encode($uid_array);
				
			*/    
$Reg_sql = "INSERT INTO ameex_user_profile (uid,first_name,last_name,mail,phone)VALUES('$user_uid','$firstname','$lastname','$mail','$phone')";
//$Reg_sql="delete from ameex_user_profile where uid=0";
$Reg_result = mysqli_query($cn,$Reg_sql) or die("Error in Register Data Inserting " . mysqli_error($cn));
echo json_encode($Reg_result);			    
if(!$Reg_result) 
{
      die('Could not Enter Register data: ' . mysql_error()); 
}
	echo "<br><b>Entered Registered data successfully<b>\n";
	//echo "<br><b>Data Deleted successfully<b>\n"; */
	
mysqli_close($cn); //close the db connection
}
?>

</body>
</html>
