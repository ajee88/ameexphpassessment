<?php
session_start();
     

include 'design.php';
          $name=$_SESSION['name'];  
echo'WELCOME :'. $_SESSION['name'].'<br>';
         

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="ameex"; // Mysql password 
$db_name="sangeetha"; // Database name 
$tbl_name="ameex_loc"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$sql="SELECT * FROM $tbl_name WHERE name='" . $name . "' ";
$result=mysql_query($sql);
?>
<html>
</head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <title>Signin Template for Bootstrap</title>

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
</head>
<body>
<form action="" method="POST">
<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<td>
<table width="400" border="1" cellspacing="0" cellpadding="3">


<?php
while($rows=mysql_fetch_array($result)){
?>
 <div class="col-xs-4">
<tr>

<td align="center"><strong>NAME:</strong></td><td><input name="name" type="text" id="name" value="<?php echo $rows['name']; ?>"></td></tr>
<td align="center"><strong>STREET:</strong></td><td><input name="name" type="text" id="name" value="<?php echo $rows['street']; ?>"></td></tr>
<td align="center"><strong>CITY:</strong></td><td><input name="lastname" type="text" id="lastname" value="<?php echo $rows['city']; ?>"></td></tr>
<td align="center"><strong>ZIP CODE:</strong></td><td><input name="uname" type="text" id="uname" value="<?php echo $rows['zip']; ?>"></td></tr>
<td align="center"><strong>STATE:</strong></td><td><input name="pass" type="text" id="pass" value="<?php echo $rows['state']; ?>"></td></tr>
<td align="center"><strong>COUNTRY:</strong></td><td><input name="email" type="text" id="email" value="<?php echo $rows['country']; ?>"></td></tr>
<td align="center"><strong>LATITUDE:</strong></td><td><input name="d1" type="text" id="d1" value="<?php echo $rows['lat']; ?>"></td></tr>
<td align="center"><strong>LONGTITUDE:</strong></td><td><input name="d2" type="text" id="d2" value="<?php echo $rows['lng']; ?>"></td>
</tr>






</table>
</div>
<td align="center"><a href="updatemap.php?id=<?php echo $rows['id']; ?>">update</a></td>
<?php
}
echo'<a href="signout.php">Signout</a>';
?>


</form>




<?php
mysql_close();
?>


</body>
</html>
