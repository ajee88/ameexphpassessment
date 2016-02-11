<?php  require "../dbconfig.php"; ?>

<?
 

    if(isset($_GET['make']))
    {
 	 $make = $_GET['make'];
      
     $sql = "select model from ameex_vehicles where make = '$make'";
     $result = mysqli_query($cn,$sql) or  die("Error in Selecting " . mysqli_error($connection)); 

      while($row =mysqli_fetch_assoc($result))
     {
        echo  "<option>".$row['model']."</option>";
     }
 
    }
?>

<? 

    if(isset($_GET['model']))
    {
 	 $model = $_GET['model'];
      
     $sql = "select min_year,max_year from ameex_vehicles where model = '$model'";
     $result = mysqli_query($cn,$sql) or  die("Error in Selecting " . mysqli_error($connection)); 

      while($row =mysqli_fetch_assoc($result))
     {
        if($row['max_year'] == null)
        {
        	$row['max_year'] = '2016';
         echo  "<option>".$row['min_year']."</option>";
         echo  "<option>".$row['max_year']."</option>";	
        }
        else {
         	 echo  "<option>".$row['min_year']."</option>";
         	 echo  "<option>".$row['max_year']."</option>";	
         } 
         
     }
 
    }
?>



