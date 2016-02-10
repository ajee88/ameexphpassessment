<html>
<body>
	<form name ="form1" method="post">
<?
 require "../dbconfig.php"; 

    if(isset($_POST['data']))
    {
 	 $make = $_POST['data'];
      echo $make;
     $sql = "select model from ameex_vehicles where make = '$make'";
     $result = mysqli_query($cn,$sql) or  die("Error in Selecting " . mysqli_error($connection)); 
     $model = array();

      while($row =mysqli_fetch_assoc($result))
     {
        $model[] = $row;
     }
    foreach ($model as $key => $value)
       {
      
        echo "<option value =" .$key.">" .$value."</option>";    
         
       }

    }
?>



