

    <!DOCTYPE html>
    <?php
    include 'db.php';
     
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
    
    <form class="form-horizontal well" action="source.php" method="post" name="upload_excel" enctype="multipart/form-data">
    <fieldset>
    <legend>Import CSV/Excel file</legend>
    <div class="control-group">
    <div class="control-label">
    <label>CSV/Excel File:</label>
    </div>
    
    <input type="file" name="file" id="file" class="input-large">
    </div>
    <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
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
    <th class="info">mail</th>
    <th class="info">phone</th>     
     
    </tr>
    </thead>
    <?php
    $SQLSELECT = "SELECT * FROM ameex_user_detail ";
    $result_set = mysql_query($SQLSELECT, $conn);
    while($row = mysql_fetch_array($result_set))
    {
    ?>
     
    <tr>
    <td class="success"><?php echo $row['uid']; ?></td>
    <td class="info"><?php echo $row['name']; ?></td>
    <td class="info"><?php echo $row['password']; ?></td>
    <td class="info"><?php echo $row['first_name']; ?></td>
    <td class="info"><?php echo $row['last_name']; ?></td>
    <td class="info"><?php echo $row['mail']; ?></td>
    <td class="info"><?php echo $row['phone']; ?></td>
     
     
    </tr>
    <?php
    }
    ?>
    
    </table>
    </div>
     
    </div>
    </div>
     
    </body>
    </html>
