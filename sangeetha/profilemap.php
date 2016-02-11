
     
<?php
session_start();
     


require "dbconfig.php"; 

          $name=$_SESSION['uname']; 
$uuid=$_SESSION['user_id']; 
//echo $uuid; 
echo'WELCOME :'. $_SESSION['uname'].'<br>';
         

// Connect to server and select database.
  if (!$cn) {
    die("Connection failed: " . mysqli_connect_error());
    
    //$conn->close();
  }
  else
  { 

 // echo "Connected successfully";
 
  }?>
<?php

//$sql="SELECT * FROM $tbl_name WHERE name='" . $name . "' ";
$sql= ("select ameex_user.uid,ameex_user.name,ameex_user_location.street,ameex_user_location.additional,ameex_user_location.city,ameex_user_location.province,ameex_user_location.postal_code,ameex_user_location.country,ameex_user_location.latitude,ameex_user_location.longitude from ameex_user_location RIGHT JOIN ameex_user ON ameex_user.uid = ameex_user_location.uid  WHERE ameex_user.uid='" . $uuid . "'");
 

$result=mysqli_query($cn,$sql) or  die("Error in Selecting " . mysqli_error($cn));
              //  echo json_encode($result);
	//$data=mysqli_fetch_array($result);

 if($cn->query($sql) === TRUE)
 {
    //echo "Login Error" .$sql ."<br>" .$cn->error;
 }
 else
 {

//echo "Login REGISTERED";
 }


?>
<html>
<head>
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

<body>
<form action="" method="POST">
<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<td>
<table width="400" border="1" cellspacing="0" cellpadding="3">


<?php
while($data=mysqli_fetch_array($result)){

?>
 <div class="col-xs-4" id ="main">
<tr>

<td align="center"><strong>UID:</strong></td><td><input name="name" type="text" id="name" value="<?php echo $data['uid']; ?>"></td></tr>
<td align="center"><strong>NAME:</strong></td><td><input name="name" type="text" id="name" value="<?php echo $data['name']; ?>"></td></tr>
<td align="center"><strong>STREET:</strong></td><td><input name="name" type="text" id="name" value="<?php echo $data['street']; ?>"></td></tr>
<td align="center"><strong>ADDITIONAL STREET:</strong></td><td><input name="name" type="text" id="name" value="<?php echo $data['additional']; ?>"></td></tr>
<td align="center"><strong>CITY:</strong></td><td><input name="lastname" type="text" id="lastname" value="<?php echo $data['city']; ?>"></td></tr>
<td align="center"><strong>PROVINCE:</strong></td><td><input name="uname" type="text" id="uname" value="<?php echo $data['province']; ?>"></td></tr>
<td align="center"><strong>ZIP CODE:</strong></td><td><input name="pass" type="text" id="pass" value="<?php echo $data['postal_code']; ?>"></td></tr>
<td align="center"><strong>COUNTRY:</strong></td><td><input name="email" type="text" id="email" value="<?php echo $data['country']; ?>"></td></tr>
<td align="center"><strong>LATITUDE:</strong></td><td><input name="d1" type="text" id="d1" value="<?php echo $data['latitude']; ?>"></td></tr>
<td align="center"><strong>LONGTITUDE:</strong></td><td><input name="d2" type="text" id="d2" value="<?php echo $data['longitude']; ?>"></td>
</tr>






</table>
</div>
<td align="center"><a href="updatemap.php?id=<?php echo $data['uid']; ?>">update</a></td>
<?php
}

?>


</form>




<?php
mysql_close();
?>


</body>
</html>
