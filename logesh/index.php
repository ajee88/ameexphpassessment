<?php
ini_set('display_error',1);
ini_set('display_startup_errors',1);
error_reporting('E_ALL');

?>
<?php
session_start();
?>
<?php require "../dbconfig.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#make").on('change',function(){
   
   // $("#model_id").show();
  var getValue=$(this).val();
   
    $.ajax({
        type: "GET",
        url: "makemodelajax.php",
        data: {make:getValue},

        success: function(data)
         {

              //  $("#model_id").show();
               $("#model").html(data);
         }
        });

  
});

$("#model").on('change',function(){

    //$("#year_id").show();
  var getValue1=$(this).val();
   
    $.ajax({
        type: "GET",
        url: "makemodelajax.php",
        data: {model:getValue1},

        success: function(data)
         {
              // $("#year_id").hide();
               $("#year").html(data);
         }
        });

  
});
});
</script>
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
  
    <!--register form , login and interface pages are included here -->

  <body>
        <form name="f1" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
     <div id= "login">
         <a  class ="text-success" href = "login.php" > login </a><a  class ="text-success" href = "profile.php" > profile </a>
     </div>      
		<div class="container">
			<div class="inner-container offset1 span8 pull-left">
              <h1>Account Information </h1>
				      	<table class ="table">
                                 <tr><th class="text-primary"><label for>Username:</label></th><td><input type ="text" id="username" name="username" value="" placeholder="Username" onfocus="validatefocus()" onblur="validateForm()"><p id="pid1"></p></td></tr>
                                 <tr><th class="text-primary"><label for>Password:</label></th><td> <input type ="password" id="password" name="password" placeholder="Password"  onfocus="validatefocus()" onblur="validateForm()"><p id="pid2"></p></td></tr>
                                 <tr><th class="text-primary"><label for>Confirm Password:</label></th><td><input type ="password" id="confirm_password" name="confirm_password" value="" placeholder="Confirm Password"  onfocus="validatefocus()" onblur="validateForm()"><p id="pid3"></p></td></tr>
                                 
 <?
$sql = "select make from ameex_vehicles group by make";
$result = mysqli_query($cn,$sql) or  die("Error in Selecting " . mysqli_error($connection)); 

$emparray = array();

?>
<body>
<form name = "f1" method ="get">
<table class = "table">
  <caption>Vehicle Infomation</caption>
  <tr><td>
<label class="text-primary">Make</label></td>
<td><select name="make" id= "make" class="make">   <!--select option for make-->
<option value="">-Select Make-</option>

<?php
  
    while($row =mysqli_fetch_assoc($result))
    {
      echo "<option>".$row['make']."</option>";
    }
     
?>
</select>
</td></tr>
<?php echo "<br>"; ?>

<tr><td><label class="text-primary">Model</label></td> 
<td><select name="model" id="model" class="model">   <!--select option for model-->
<option value="">-Select Model-</option>

</select></td></tr>  

<?php echo "<br>"; ?>
<tr><td>
<label class="text-primary">Year</label></td>
<td>
<select name="year" id="year" class="year">   <!--select option for year-->
<option value="">-Select Year-</option>

</select> 
</td></tr>
</table>

</select>
      </div>         
    </div>
<tr><td><input type="submit" class ="btn-success" value="Submit" name="submit_name" >
     </td></tr>
</table>  
       
    </form>
	</body>
   </html>
<!-- server side validation of register form-->
<?php

  if (isset($_POST['submit_name']))
  {
   $username = $_POST['username'];
   echo $username."<br>";
   $password = $_POST['password'];
   echo  $password."<br>";
   $confirm_password = $_POST['confirm_password'];
   echo $confirm_password."<br>";
   $make = $_POST['make'];
   echo $make."<br>";
   $model = $_POST['model'];
   echo $model."<br>";
   $year = $_POST['year'];
   echo $year."<br>";
   // checking the password and confirm_password are same
     if($password === $confirm_password)
     {
        $sql = "select name from ameex_user where name= '$username'";
        $result = mysqli_query($cn,$sql) or  die("Error in checking " . mysqli_error($connection));
              while($row =mysqli_fetch_assoc($result))
              {
              $checking = $row['name'];
              } 
                  // checking if username is already exist in the ameex_user table
                    if($username == $checking)
                     {
                      echo "Username is already exits"; 
                     } 
      
                    else
                    {
                       // inserting the username and password into the ameex_user table
                        $query = "insert into ameex_user(name,pass) values('$username','$password')"; 
                        $result = mysqli_query($cn,$query) or  die("Error in checking1 " . mysqli_error($connection));
                        echo "Inserted Successfully"; 
                        
                        // Retriving id from the tabel ameex_user  
                        $sql = "select uid from ameex_user where name= '$username'";
                        $result = mysqli_query($cn,$sql) or  die("Error in checking " . mysqli_error($connection));
                        while($row =mysqli_fetch_assoc($result))
                        {
                        $uid = $row['uid'];
                        }             
             }
      // inserting the user id, make , model and year in the ameex_user_vehicle database;
      $vehicle_info = "insert into ameex_user_vehicle(uid,make,model,year) values('$uid','$make','$model','$year')";
      $result = mysqli_query($cn,$vehicle_info) or  die("Error in checking2 " . mysqli_error($connection));
      echo "Inserted Successfully";
           
     }  
   else
     {
         echo "confirm the password again";
     }  // end if password ,confirm password

    
  }// end if $_POST[submit] 
$_SESSION['id'] = $uid;
?>
<?php
 mysqli_close($connection);
 ?>
