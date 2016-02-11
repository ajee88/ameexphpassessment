<?php
 include 'dbconfig.php';
if(isset($_POST["preview"]))
{

echo $filename=$_FILES["file"]["tmp_name"];
          


        if($_FILES["file"]["size"] > 0)
          {
            echo "<html><body><table>\n\n";
            $f = fopen($filename, "r");
               while (($line = fgetcsv($f)) !== false) 
                {
                echo "<tr>";
                   foreach ($line as $cell) 
                     {
                     echo "<td>" . htmlspecialchars($cell) . "</td>";
                     }
                 echo "</tr>\n";
                 }
        fclose($f);
            }
  }
echo "\n</table></body></html>";

?>


<!DOCTYPE HTML>
<html>
	<head>
				
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">		
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
                </script>				
	</head>
	<body>
	<div class="container">
	 <div class="inner-container">
		<form class="form-horizontal well" action="trial.php" method="post" name="upload_excel" enctype="multipart/form-data">
                 <fieldset>
                   <legend>Import CSV/Excel file</legend>
                   <label>CSV/Excel File:</label>
     <div class="controls">
  
       <button type="submit" id="submit" name="preview" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
      </div>
                </fieldset>
               </form>
			</div>
		</div>
	</body>
</html>


