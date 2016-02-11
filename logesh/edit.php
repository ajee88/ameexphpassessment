<?php
ini_set('display_error',1);
ini_set('display_startup_errors',1);
error_reporting('E_ALL');
require "../dbconfig.php";
?>
<?php
session_start();
$_SESSSION['id'] = $id;
$id1 =$_SESSION['id'];
echo $id1;
$name =  $_SESSION['name'];
$pass =  $_SESSION['pass'];
$make =  $_SESSION['make'];
$model=  $_SESSION['model'];
$year =  $_SESSION['year'];

?>
<?
$sql = "select make from ameex_vehicles group by make";
$result = mysqli_query($cn,$sql) or  die("Error in Selecting " . mysqli_error($connection)); 
?>

<html>
	<head>
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
		<title>Logesh | PHP Assessment</title>		
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">		
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>				
        <script type="text/javascript" src="clientvalidation.js"></script>       <!--included client validation js file -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> 
	</head>
  
  <body>
        <form name="f1" method="get" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">   
		<div class="container">
			<div class="inner-container offset1 span8 pull-left">
              <h1>Account Information </h1>
				      	<table class ="table">
                                 <tr><th class="text-primary"><label for>Username:</label></th><td><input type ="text" id="username" name="username" value= "<?php echo $name; ?>" placeholder="Username" onfocus="validatefocus()" onblur="validateForm()"><p id="pid1"></p></td></tr>
                                 <tr><th class="text-primary"><label for>Password:</label></th><td> <input type ="password" id="password" name="password" placeholder="Password" value= "<?php echo $pass; ?>"  onfocus="validatefocus()" onblur="validateForm()"><p id="pid2"></p></td></tr>
                                 <tr><th class="text-primary"><label for>Confirm Password:</label></th><td><input type ="password" id="confirm_password" name="confirm_password" value="" placeholder="Confirm Password"  onfocus="validatefocus()" onblur="validateForm()"><p id="pid3"></p></td></tr>
                                 </table>
             <div>

             <div>
              <table class="table">
                <h1> Vehicle Information<h1>
               <tr><td><label class="text-primary">Make</label></td> 
                   <td><select name="make" id="make" class="make">   <!--select option for make--> 
                   <option value=""><?php echo $make; ?></option>
                   <?php
  
                   while($row =mysqli_fetch_assoc($result))
                   {
                   echo "<option>".$row['make']."</option>";
                   }
                  ?>

                   </select></td></tr>  

                    <tr><td><td>
                    <tr><td><label class="text-primary">Model</label></td> 
                    <td> <select name="model" id="model" class="model">   <!--select option for model--> 
                    <option value=""><?php echo $model; ?></option>
                    </select></td></tr>   


                    <tr><td><label class="text-primary">Year</label></td> 
                   <td><select name="year" id="year" class="year">   <!--select option for year--> 
                   <option value=""><?php echo $year; ?></option>
                   </select></td></tr>  
                  </table>
             </div>	
           <a  class ="text-success" href = "logout.php" > logout </a> 
        <div>     	
        </body>
        </html>
        <?php
         mysqli_close($connection);
        ?>