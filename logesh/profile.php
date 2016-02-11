<?php require "../dbconfig.php"; ?>
<?php
session_start();
$id = $_SESSION['id'];  
?>
<html>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">		
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
function edit()
{
	header("Location:edit.php");
}
</script>
<body>
	<div>
		<div>
	<table class="table">
		<caption> DETAILS</caption>
		<tr><td>ID</td><td><?php echo $id ?></td></tr>
<?php

$sql = "select name,pass from ameex_user where uid = '$id'";
$result = mysqli_query($cn,$sql) or  die("Error in Selecting " . mysqli_error($connection)); 

    while($row =mysqli_fetch_assoc($result))
    {
        echo "<tr><td>Username</td><td>".$row['name']."</td></tr>";
        echo "<tr><td>Password</td><td>".$row['pass']."</td></tr>";
         $_SESSION['name'] = $row['name'];
         $_SESSION['pass'] = $row['pass']; 
    }
       

?>
<?php
$sql = "select make,model,year from ameex_user_vehicle where uid = '$id'";
$result = mysqli_query($cn,$sql) or  die("Error in Selecting " . mysqli_error($connection)); 



    while($row =mysqli_fetch_assoc($result))
    {
        echo "<tr><td>Make</td><td>".$row['make']."</td></tr>";
        echo "<tr><td>Model</td><td>".$row['model']."</td></tr>";
        echo "<tr><td>Year</td><td>".$row['year']."</td></tr>";
          $_SESSION['make'] = $row['make'];
            $_SESSION['model'] = $row['model'];
              $_SESSION['year'] = $row['year']; 
    }
   


 mysqli_close($connection);
?>
</table>
<a  class ="text-success" href = "edit.php" >Edit</a>
<a  class ="text-success" href = "logout.php" >logout</a>  

  </div>
  </div>
	</body>
	</html>