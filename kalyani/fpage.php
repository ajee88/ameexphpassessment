

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
    
      <form class="form-horizontal well" action="importcsv.php" method="post" name="upload_excel" enctype="multipart/form-data">
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
  <button type="submit" id="submit" name="preview" class="btn btn-primary button-loading" data-loading-   text="Loading...">Preview</button>
          </div>
        </div>
    </fieldset>
   </form>
    </div>

 </div>
     
    
    
    
    </div>
     
    </div>
    </div>
     
    </body>
    </html>
