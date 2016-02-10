<!DOCTYPE HTML>

<?php
session_start();
?>
<?php

mysql_connect('localhost','root','ameex') or die(mysql_error());

mysql_select_db('user_profile') or die(mysql_error());

?>



<?php
$uid= $_SESSION['uid'];

$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$mail = $_SESSION['mail'];
$phone = $_SESSION['phone'];
?>


<html>
	<head>
		<title>Deepa | PHP Assessment</title>		
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">		
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
</script>	
			
	</head>
	<body background-color="#fff">
		<div class="container">
			<div class="inner-container">
                           <div class="jumbotron">
				  	 <h1>USER PROFILE</h1> 
				  	</div>
				<!-- Here you go with your code -->
                                 <form name="edit" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                <div class="table-responsive">
                                 <table border="5" align="center" class="table table-bordered">
					            <tr><th>User ID</th>
                                                   <th>ID</th>
			                    <th>First Name</th>
                                <th>Last Name</th>
                                <th>Mail</th>
                                <th>Phone</th>	
                                 <th>Option</th></tr>
<?php

   
    $query=mysql_query("select * from ameex_user_profile");
   
   while ($row= mysql_fetch_array($query)) 
              {


//$uid=$data[0];

 echo "<tr><td><input type='text' name='uid' value='".$row['UID']."'></td>";
//$id=$data[1];

 echo "<td><input type='text' name='id' value='".$row['ID']."'></td>";
//$fname=$data[2];
 echo "<td><input type='text' name='firstname[]' value='".$row['first_name']."'></td>";
//$lname=$data[3];
 echo "<td><input type='text' name='lastname' value='".$row['last_name']."'></td>";
//$mail=$data[4];
 echo "<td><input type='text' name='mail' value='".$row['mail']."'></td>";
//$phone=$data[5];
 echo "<td><input type='text' name='phone' value='".$row['phone']."'></td>";

             echo "<td><input type='submit' name='save' value='Save' class='btn btn-success'>";
             echo "<input type='submit' name='delete' value='".$row['UID']."' class='btn btn-danger'></td></tr>";
              }



     
?>
  
                                 </table>
</div>
				 </form>
			</div>
		</div>
	</body>
		</html>

<?php

 if(isset($_POST['save']))
  {

    foreach($_POST['firstname'] as $first)
{
echo $first;


$query = mysql_query("UPDATE ameex_user_profile SET first_name='".$first."'"); 

}
$result=mysql_db_query($query) or die("couldnot");

    
}

  
if(isset($_POST['delete']))
  {

echo "deepa";

 
      
    $first = $_POST['firstname'];
echo $first;
    if(isset($first))
     {
     $query = mysql_query("DELETE FROM ameex_user_profile WHERE ID='" . $_SESSION['uid'] . "'");
    
     }
  
    $last = $_POST['lastname'];
    if(isset($last))
     {
     $query = mysql_query("DELETE FROM ameex_user_profile WHERE ID='" . $_SESSION['uid'] . "'");
    
     }

     $mail = $_POST['mail'];
    if(isset($mail))
     {
     $query = mysql_query("DELETE FROM ameex_user_profile WHERE ID='" . $_SESSION['uid'] . "'");
    
     }

     $phone = $_POST['phone'];
    if(isset($phone))
     {
     $query = mysql_query("DELETE FROM ameex_user_profile WHERE ID='" . $_SESSION['uid'] . "'");
    
     }
   
        
}
?>
