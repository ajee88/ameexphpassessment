<?php 
            session_start();  
	    include "class.user.php";
	    $user = new User();
	 
	    if (isset($_REQUEST['submit'])) {
	        extract($_REQUEST);
	        $login = $user->check_login($name, $pass);

	        if ($login) { // Registration Success
                  $uid=$_SESSION['uid'];
                   $_SESSION['uid']=$uid;
                   $_SESSION['name']=$name;
                   //$name=$_SESSION['name'];
	          header("location:profile.php");
                   
	        } else {
	            // Registration Failed
	            echo 'Wrong username or password';
	        }
	    }
?>
<html>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style><!--
        #container{width:400px; margin: 0 auto;}
	--></style><div id="container">	 	 
	<h1>Login Here</h1>
	<form action="" method="post" name="login">
	<table>
	<tbody>
	<tr>
	<th>UserName:</th>
	<td><input type="text" name="name" required="" /></td>
	</tr>
	<tr>
	<th>Password:</th>
	<td><input type="password" name="pass" required="" /></td>
	</tr>

	<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Login" /></td>
	</tr>
	<tr>
	<td></td>
	<td><a href="newreg.php">Register new user</a></td>
	</tr>
	</tbody>
	</table></form>
	</div>
        </html>

