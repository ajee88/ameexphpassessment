<?php require "db.php"; ?>

<!DOCTYPE HTML>
<html>
<head>
		<title>Deepa | PHP Assessment</title>		
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">		
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
                <!-- Hiding the div-->
		<script>
                        function myFunction() {
    			confirm("Are you sure to delete this??");
			}
			$(document).ready(function(){
			$("#next").hide()
			$("#edit").click(function(){
			$("#edit").hide()
			$("#next").show()
                        
                        
			});
			});
		</script>	
			
</head>
<body>
<div class="container">
			<div class="inner-container">
				  <div class="jumbotron">
				  	 <h1>USER PROFILE</h1> 
				  </div>
 				<div id="edit">
				<!-- Here you go with your code -->
                                 <form name="index" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                 	<div class="table-responsive">  
                             
                                 <table border="5" align="center" class="table table-bordered">
					        <tr><th>User ID</th>
			                    	<th>First Name</th>
                                		<th>Last Name</th>
                                		<th>Mail</th>
                                		<th>Phone</th>	
                              			<th>Option</th></tr>

<?php
interface userInterface {
public function save();
}     
class index implements userInterface
{
public $query;
public $data;
public $uid;
public $fname;
public $lname;
public $mail;
public $phone;
public function save()
{
   
     $this->query = mysql_query("select ameex_user.ID,ameex_user_profile.first_name,ameex_user_profile.last_name,ameex_user_profile.mail,ameex_user_profile.phone from ameex_user_profile RIGHT JOIN ameex_user ON ameex_user_profile.ID=ameex_user.ID;");


              
               while ($this->data= mysql_fetch_row($this->query )) 
              {
    
		$this->uid=$this->data[0];
 		echo "<tr><td id='uid'>".$this->uid."</td>";
		$this->fname=$this->data[1];
		echo "<td id>".$this->fname."</td>";
		$this->lname=$this->data[2];
 		echo "<td>".$this->lname."</td>";
		$this->mail=$this->data[3];
 		echo "<td>".$this->mail."</td>";
		$this->phone=$this->data[4];
 		echo "<td>".$this->phone."</td>";
		echo "<td><input type='button' name='edit' value='Edit' class='btn btn-primary'></td></tr>";
              }
}
}
$myindex = new index();
$myindex->save();
?>

                                
                                </table>
				</div>
				</div>
				</form>
                          </div>
                    </div>
              </div>




                                                           <!--//editing page-->
<div id="next">


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
$query=mysql_query("select ameex_user.ID,ameex_user_profile.UID,ameex_user_profile.first_name,ameex_user_profile.last_name,ameex_user_profile.mail,ameex_user_profile.phone from ameex_user_profile RIGHT JOIN ameex_user ON ameex_user_profile.ID=ameex_user.ID;");
   		while ($data= mysql_fetch_row($query)) 
                {
			$uid=$data[0];
			echo "<tr><td><input type='text' name='uid' value='$uid'></td>";
			$id=$data[1];
			echo "<td><input type='text' name='id' value='$id'></td>";
			$fname=$data[2];
 			echo "<td><input type='text' name='firstname' value='$fname'></td>";
			$lname=$data[3];
 			echo "<td><input type='text' name='lastname' value='$lname'></td>";
			$mail=$data[4];
 			echo "<td><input type='text' name='mail' value='$mail'></td>";
			$phone=$data[5];
 			echo "<td><input type='text' name='phone' value='$phone'></td>";
			echo "<td><input type='submit' name='save' value='Save' class='btn btn-success'>";
             		echo "<input type='submit' name='delete' value='Delete'  id='delete' class='btn btn-danger' onclick='myFunction();'>";
		}

	

?>
  
                                 </table>
                                 </div>
				 </form>
			</div>
		</div>
	
<?php    // to save the profile
if(isset($_POST['save']))
  {


	

           
      
	 if(isset($first))
     	{
             
     		$query = mysql_query("UPDATE ameex_user_profile SET first_name='$first' WHERE ID=$uid");
	}
  
   	$last = $_POST['lastname'];
    	if(isset($last))
     	{    
              
     		$query = mysql_query("UPDATE ameex_user_profile SET last_name='$last' WHERE ID=$uid");
    
     	}
	$mail = $_POST['mail'];
    	if(isset($mail))
       {
     		$query = mysql_query("UPDATE ameex_user_profile SET mail='$mail' WHERE ID=$uid");
       }
       $phone = $_POST['phone'];
       if(isset($phone))
       {
		$query = mysql_query("UPDATE ameex_user_profile SET phone=$phone WHERE ID=$uid");
       }
   
 }

if(isset($_POST['delete']))     //to delete the profile
  {
     $uid = $_GET['id'];

 
    $first = $_POST['firstname'];

    if(isset($first))
     {
     $query = mysql_query("DELETE FROM ameex_user_profile WHERE ID=$uid");
    
     }
  
    $last = $_POST['lastname'];
    if(isset($last))
     {
     $query = mysql_query("DELETE FROM ameex_user_profile WHERE ID=$uid");
    
     }

     $mail = $_POST['mail'];
    if(isset($mail))
     {
     $query = mysql_query("DELETE FROM ameex_user_profile WHERE ID=$uid");
    
     }

     $phone = $_POST['phone'];
    if(isset($phone))
     {
     $query = mysql_query("DELETE FROM ameex_user_profile WHERE ID=$uid");
    
     }
     
     	
   
        
}
?>
</div>
</body>
</html>
