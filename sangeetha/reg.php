
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

   

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<form method="post" action="">
    <div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading">Please sign up</h2>
        
 <label for="inputEmail" class="sr-only"></label>
           <div class="col-xs-4">  NAME: <input type="name" id="inputEmail" class="form-control" placeholder="Enter name"  name="n2" required autofocus>
        <label for="inputPassword" class="sr-only"></label>
        PASSWORD:<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="n3" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-primary" type="submit" name="sum">SIGN UP</button>
  <button class="btn btn-primary" type="reset" name="sum">RESET</button>
      </form><br><br><br>
<a href="index.php">BACK HOME</button>
    </div> <!-- /container -->

<?php
$_SESSION['id']=0;

if(isset($_POST['sum']))
 {
  $servername="localhost";
  $username="root";
  $password="ameex";
  $db="sangeetha";
   
 
  $connection = mysqli_connect($servername,$username,$password,$db); 
 
// Check connection
  if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
    
    //$conn->close();
  }
  else
  { 


 
  }?>
<?php 
 if(isset($_POST['sum'])) 
{
$a0=uniqid();
$a1= $_POST['n2'];
$a2= $_POST['n3'];

} 
?>
<?php
 $sql = "INSERT INTO ameex_user values('$a0','$a1','$a2')";

 if($connection->query($sql) === TRUE)
 {
  echo "REGISTERED";
 header('location:join.php');
 }
 else
 {
  echo "Error" .$sql ."<br>" .$connection->error;
 }
  $connection->close();
 }
?>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
