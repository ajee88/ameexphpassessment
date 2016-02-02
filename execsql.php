<?php
	require "secure/dbconfig.php";
	if(!empty($_POST['query']))	{
		if ($cn->query($_POST['query']) === TRUE) {
		    echo "Query Executed Successfully";
		} else {
		    echo "Error: " . $_POST['query'] . "<br>" . $cn->error;
		}
		
		$cn->close();	
	}
?>
<html>
	<head>
		<title>Execute MySQL Query</title>		
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	
	<body>
		<div class="container">
			<div class="inner-container">
				<div class="center-block">
					<form role="form" name="execsql" id="execsql" method="post"enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<div class="form-group">
							<input type="text" name="query" />
						</div>					
						<div class="form-group">
							<input type="submit" />	
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</body>	
</html>
