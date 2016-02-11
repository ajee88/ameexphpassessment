

    <!DOCTYPE html>
    <?php
       include 'dbconfig.php';
    ?>	
    <html lang="en">
       <head>
          <meta charset="utf-8">
          <title>Kalyani | PHP Assessment</title>

          <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
          <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <meta name="description" content="Import Excel File To MySql Database Using php">
          <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      </head>
  <body>
     
         <!-- Navbar
               ================================================== -->
     
   <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
      <div class="container">
      <div class="inner-container">
      
       </div>
       </div>
       </div>
     
    <div id="wrap">
    <div class="container">
    <div class="row">
    
    <form class="form-horizontal well" action="result.php" method="post" name="upload_excel" enctype="multipart/form-data">
       <fieldset>
          <legend>Import CSV/Excel file</legend>
          <label>CSV/Excel File:</label>
          <div class="control-group">
            <div class="control-label">
    
           </div>
         <div class="controls">
             <input type="file" name="file" id="file" class="input-large">
         </div>
    </div>
     
         <div class="control-group">
           <div class="controls">
  <button type="submit" id="button" name="preview" class="btn btn-primary button-loading" onClick="preview()"data-loading-      text="Loading...">preview</button>
  <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-   text="Loading...">Upload</button>
          </div>
        </div>
    </fieldset>
   </form>
    </div>

 </div>
     
    <table class="table table-bordered">
      
    <thead class="active">
     <tr>
      <th class="success">uid</th>
      <th class="info">name</th>
      <th class="info">password</th>
      <th class="info">first_name</th>
      <th class="info">last_name</th>
      <th class="info">email</th>
      <th class="info">phone</th>     
     
     </tr>
    </thead>
     <?php
        $SQLSELECT1 = "SELECT * FROM ameex_user "; // preview for ameex_user table
        $result_set1 = mysqli_query($cn,$SQLSELECT1) or  die("Error in Selecting " . mysqli_error($cn)); 
            $userarray = array();
?>
<tr>
            <td class="success"><?php echo $row['uid']; ?></td>
            <td class="info"><?php echo $row['name']; ?></td>
            <td class="info"><?php echo $row['pass']; ?></td> 
            

   <?php
        while($row = mysqli_fetch_array($result_set1))
          { 
           $userarray[] = $row;
           }
          echo json_encode($userarray);
       ?>

      <?php
        $SQLSELECT = "SELECT * FROM ameex_user_profile "; // preview for ameex_user_profile table
        $result_set = mysqli_query($SQLSELECT, $cn);
           $profilearray = array();
?>	


<td class="info"><?php echo $row['first_name']; ?></td>
    <td class="info"><?php echo $row['last_name']; ?></td>
    <td class="info"><?php echo $row['email']; ?></td>
    <td class="info"><?php echo $row['phone']; ?></td>
     
     
    </tr>
<?php
         while($row = mysqli_fetch_array($result_set))
            {
             $profilearray[]=$row;
           }
        echo json_encode($profilearray);
   ?>
    
    </table>
    </div>
    </div>
    </div>

<?php
function preview()
{
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
}
?>

  
     
    </body>
    </html>
