<?php
ini_set('display_startup_errors',1);
ini_set(E_ALL);
?>

<html>
<head>
<head>
  <?php require "../dbconfig.php"; ?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#make").on('change',function(){

  var getValue=$(this).val();
   
    $.ajax({
        type: "POST",
        url: "makemodelajax.php",
        data:'data:getValue',

        success: function(data)
         {
               $("#model").html(data);
         }
        });

  
});
});
</script>


<?
$sql = "select make from ameex_vehicles group by make";
$result = mysqli_query($cn,$sql) or  die("Error in Selecting " . mysqli_error($connection)); 

$emparray = array();

    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
     
?>
<body>
<form name = "f1" method ="post">
<select name="make" id= "make" class="make">   <!--select option for make-->
<option value="">-Select Make-</option>
<?php
  
   $test= explode(",",json_encode($emparray));
      print_r($test);
             
   foreach ($test as $key)
       {
      
        echo "<option >" .$key."</option>";    
         
       }
     ?>
</select>
<?php echo "<br>"; ?>

<select name="model" id="model" class="model">   <!--select option for model-->
<option value="">-Select Model-</option>
</select>  

<?php echo "<br>"; ?>

<select name="year" id="year" class="year">   <!--select option for make-->
<option value="">-Select Year-</option>
</select> 


<?php
 mysqli_close($connection);
?>

</select>
</form>
</body>
</html>
