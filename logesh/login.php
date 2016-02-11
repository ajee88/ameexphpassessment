<?php
session_start();
require "../dbconfig.php";
?>
 
<!DOCTYPE HTML>
<html>
<head>
  </head>
		<title>Logesh | PHP Assessment</title>		
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">		
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>				
        <script type="text/javascript" src="clientvalidation.js"></script>        <!--included client validation js file -->
</head>
<body>
  <a  class ="text-success" href = "profile.php" >profile</a>
<form name="f2" name="form" method="post">
<table class ="table">
               <div id ="login_div"  float:"left">
                       <h1>LOGIN</h1>
                      <div class="offset1 span8 pull-left" float:"left">
                       <table>
                            <tr><th class="text-primary"><label for>Username:</label></th><td>
                	        <input type ="text" id="username" name="username" value="" placeholder="Username" onfocus="validatefocus()" onblur="validateForm()"><p id="pid1"></p></td></tr>
                            <tr><th class="text-primary"><label for>Password:</label></th><td>
                            <input type ="password" id="password" name="pas" placeholder="Password"  onfocus="validatefocus()" onblur="validateForm()"><p id="pid2"></p></td></tr>
                            <tr><td> </td><td> <input type ="submit" id ="login_name" name="login_name"  value= "login" class="text-primary" onclick="logout()"></td></tr>   
                        </table>
                        

                        </div> 

                         
                                 
              </div>
<!--server side scripting for login page-->
 <?php

if(isset($_POST['login_name']))
{
  $username = $_POST['username'];
               
      $sql = "select uid ,name from ameex_user where name='$username'";
      $result = mysqli_query($cn,$sql) or  die("Error in checking " . mysqli_error($connection));
      $id_session =array();

        while($row =mysqli_fetch_assoc($result))
    {
        $id= $row['uid'];
        $name = $row['name'];
    }
    echo $id;
    $_SESSION[id]= $id;
    // session has started    
      
 mysqli_close($connection);
}

?>
</form>
</body>
</html>