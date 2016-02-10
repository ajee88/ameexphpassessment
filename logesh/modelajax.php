<?php
 require "../dbconfig.php"; 

if(isset($_POST['data']))
 {
 	 $make = $_POST['data'];
      echo $make;
    $sql = "select model from ameex_vehicles where make = '$make'";
    $result = mysqli_query($cn,$sql) or  die("Error in Selecting " . mysqli_error($connection)); 
    
    foreach ($result as $key => $value)
       {
      
        echo "<option value=".$key.">" .$value."</option>";    
         
       }
 }
 ?>