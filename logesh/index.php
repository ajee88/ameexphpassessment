<?php
ini_set('display_error',1);
ini_set('display_startup_errors',1);
error_reporting('E_ALL');

?>
<?php
session_start();
?>
<?php require "../dbconfig.php"; ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Logesh | PHP Assessment</title>		
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">		
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>				
        <script type="text/javascript" src="clientvalidation.js"></script>        <!--included client validation js file -->
	</head>
  <!--this script shows the div tag of login and option id of login and interface class and hide the div class=container -->
    <script>
        
        $(document).ready(function(){
        $("#login").click(function(){
        $(".container").hide();    
        $("#login_div").show();
        $("#option").show();
    });
       });   
    </script>
    <!--register form , login and interface pages are included here -->
	<body >
        <form name="f1" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            <h1><center>HIGH PERFORMANCE PRODUCT CONFRIGURATOR</center></h1>
		<div class="container">
			<div class="inner-container offset1 span8 pull-left">
				      	<table class ="table">
                               	<caption><CENTER>LOGIN</CENTER></caption>		
                                 <tr><th class="text-primary"><label for>Username:</label></th><td><input type ="text" id="username" name="username" value="" placeholder="Username" onfocus="validatefocus()" onblur="validateForm()"><p id="pid1"></p></td></tr>
                                 <tr><th class="text-primary"><label for>Password:</label></th><td> <input type ="password" id="password" name="pas" placeholder="Pas"  onfocus="validatefocus()" onblur="validateForm()"><p id="pid2"></p></td></tr>
                                 <tr><th class="text-primary"><label for>Confirm Password:</label></th><td><input type ="password" id="confirm_password" name="con" value="" placeholder="Confirm Password"  onfocus="validatefocus()" onblur="validateForm()"><p id="pid3"></p></td></tr>
                                 <tr><td><center><input type="submit" class ="btn" value="submit" name="submit_name"></center></td>
                                              <td><center><input type="button" class ="btn" value="login" id="login" name="login" ></center></td>
                                 </tr>
                                </table>  
                    </div>             
			    

   </div>


        <div id ="login_div" width="50%" style="display:none" float:"left">
               <div class="offset1 span8 pull-left">
                <tr><th class="text-primary"><label for>Username:</label></th><td><input type ="text" id="username" name="username" value="" placeholder="Username" onfocus="validatefocus()" onblur="validateForm()"><p id="pid1"></p></td></tr>
                                 <tr><th class="text-primary"><label for>Password:</label></th><td> <input type ="password" id="password" name="pas" placeholder="Password"  onfocus="validatefocus()" onblur="validateForm()"><p id="pid2"></p></td></tr>
                                  <input type ="submit" name="logout" value ="logout" class ="btn-success" onclick="header("Location:index.php")"> 
                               </div class= "table"> 
                      <table>
                        <div id ="option" style="display:none" float:"right">
                         <?php include 'select.php'; ?>  <!-- select page has included here-->

                       </div>          
              </div>
        </div>
    </form>
	</body>
   </html>
<!-- server side validation of register form-->
<?php

  if (isset($_POST['submit_name']))
  {
   $username = $_POST['username'];
   if($username)
   {
    echo $username; 
   }
    $pas = $_POST['pas'];
   if($pas)
   {
    echo $pas; 
   }
    $con = $_POST['con'];
   if($con)
   {
    echo $con; 
   }
     if($pas == $con)
     {
        $sql = "select name from ameex_user where name= '$username'";
        $result = mysqli_query($cn,$sql) or  die("Error in checking " . mysqli_error($connection));
        $emparray = array();
              while($row =mysqli_fetch_assoc($result))
              {
              $emparray[] = $row;
              }
               $json_string = json_encode($emparray);   
           if($username == $json_string)
            {
              echo "username is already exits";
            } 

        else{
            $query = "insert into ameex_user(name,pass) values('$username','$password')"; 
            $result = mysqli_query($cn,$query) or  die("Error in Selecting " . mysqli_error($connection)); 
            $json_string = json_encode($result);
            echo $json_string;
            }            
     }  
   else
     {
         echo "confirm the password again";
     }

}
?>
<!--server side login page are done here-->
<?php

 
 include 'select.php'; //login validation page has included here

mysqli_close($connection);

?>
