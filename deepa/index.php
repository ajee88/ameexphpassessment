
<?php

require "../dbconfig.php";
?>
<!DOCTYPE HTML>
<html>
<head>
		<title>Deepa | PHP Assessment</title>		
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">		
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script>
 


 $(document).ready(function(){
 $(".edit").click(function(){
          var tr = $(this).closest("tr");

          tr.find(".td").each(function(){
              var name = $(this).attr("title");
              var value = $(this).html();
              
                
              var input = "<input type='text' name='"+name+"' value='"+value+"' />"; 
               
             
              $(this).html(input);
           
            
        
          });

          var submit = "<input type='submit' name='save' value='Save' class='btn btn-success' /><input type='button' name='Save' value='Delete' class='btn btn-danger' />";
          tr.find(".button").html(submit);

});
});
</script>           
</head>
<body>
<div id="edit">
	<body background-color="#fff">
		<div class="container">
			<div class="inner-container">
                           <div class="jumbotron">
				  	 <h1>USER PROFILE</h1> 
			    </div>

				<!-- Here you go with your code -->
                                 <form name="edit" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                 <div class="table-responsive">
                                 <table border="5" id="table" align="center" class="table table-bordered">
					            <tr>
                                                  <th></th>
                                                   <th>ID</th>
                                                       <th>UserName</th>
                                                   <th>firstname</th>
			                           <th>LastName</th>
                                		<th>Mail</th>
                                		<th>Phone</th>	
                                 		<th>Edit</th></tr>
                               
<?php

   

    $sql=("select ameex_user.uid,ameex_user.name,ameex_user_profile.first_name,ameex_user_profile.last_name,ameex_user_profile.mail,ameex_user_profile.phone from ameex_user_profile RIGHT JOIN ameex_user ON ameex_user.uid");
    $result = mysqli_query($cn,$sql) or  die("Error in Selecting " . mysqli_error($cn)); 

  

    while($row =mysqli_fetch_array($result))
    {
        
           echo "<tr class='row'><td class='td' title='id' name='id'>".$row[uid]."</td>";
           echo "<td class='td' title='name' name='name'>".$row[name]."</td>";
           echo "<td class='td'title='fname' name='fname'>".$row[first_name]."</td>";
           echo "<td class='td' title='lname' name='lname'>".$row[last_name]."</td>";
           echo "<td class='td' title='mail' name='mail'>".$row[mail]."</td>";
           echo "<td class='td' title='phone' name='phone'>".$row[phone]."</td>";
           echo "<td class='button' title='button'><input type='button' class='edit' value='Edit'  class='btn btn-primary'>";
           echo "<input type='button' value='Delete' id='delete' class='btn btn-danger'></td></tr>";
           

    }
      
   

 
  
?>
  


  
                                 </table>

                                 </div>  
				 </form>

            
</body>
</html>

     

 
