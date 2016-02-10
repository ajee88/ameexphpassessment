<?php
session_start();
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

 

			
	</head>
<script>

$(document).ready(function() {

	$.getJSON("server.php",function(data){	
		if(data) {
		var json_data;
		
		$('#table').show();
		$.each(data, function(i,ameex_user_profile){
		json_data = '<tbody id="editable"><tr id="'+ameex_user_profile.uid+'">'+
			'<td valign="top" contenteditable="true" id="'+ameex_user_profile.uid+'">'+
			+ameex_user_profile.uid+'</td>'+
                        '<td class="editable-col" contenteditable="true" id="'+ameex_user_profile.uid+'">'+ameex_user_profile.name+'</td>'+
		'<td class="editable-col" contenteditable="true" id="'+ameex_user_profile.uid+'">'+ameex_user_profile.first_name+'</td>'+
                        '<td class="editable-col" contenteditable="true" id="'+ameex_user_profile.uid+'">'+ameex_user_profile.last_name+'</td>'+
                        '<td class="editable-col" contenteditable="true" id="'+ameex_user_profile.uid+'">'+ameex_user_profile.mail+'</td>'+
                        '<td class="editable-col" contenteditable="true" id="'+ameex_user_profile.uid+'">'+ameex_user_profile.phone+'</td>'+
                        '<td><input type="button" class="btn btn-success" value="Save"></a>'+'</td>'+
                         '<td><input type="button" value="delete">'+'</td>'+
			'</td>'+
			'</tr>'+'</tbody>'+
		$(json_data).appendTo('#table');
		});
		} 		
	});



});
</script>
</head><body>
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
                                                   <th>ID</th>
                                                   <th>UserName</th>
                                                   <th>firstname</th>
			                           <th>LastName</th>
                               
                                                       <th>Mail</th>
                                <th>Phone</th>	
                                 <th>Edit</th>
                                  <th>Delete</th></tr><tbody></tbody>
                                  
                                 </table>

</div>  
				 </form>
			</div></div>
		</div>



</div>




  
  






		
</head>

		</html>





