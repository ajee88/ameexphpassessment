
 

<?php
session_start();
     


require "dbconfig.php"; 
$uuid1=$_SESSION['user_id']; 
// Connect to server and select database.
  if (!$cn) {
    die("Connection failed: " . mysqli_connect_error());
    
    //$conn->close();
  }
  else
  { 

 //echo "Connected successfully";
 
  }?>
<?php

// get value of id that sent from address bar
$id=($_GET['id']);


// Retrieve data from database 
$sql= ("select ameex_user.uid,ameex_user.name,ameex_user_location.street,ameex_user_location.additional,ameex_user_location.city,ameex_user_location.province,ameex_user_location.postal_code,ameex_user_location.country,ameex_user_location.latitude,ameex_user_location.longitude from ameex_user_location RIGHT JOIN ameex_user ON ameex_user.uid = ameex_user_location.uid  WHERE ameex_user.uid='" . $id . "'");
 

$result=mysqli_query($cn,$sql) or  die("Error in Selecting " . mysqli_error($cn));
//$data=mysql_fetch_array($result);
 if($cn->query($sql) === TRUE)
 {
    //echo "Login Error" .$sql ."<br>" .$cn->error;
 }
 else
 {

//echo " REGISTERED";
 }

?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
<table width="400" border="5" cellspacing="1" cellpadding="0" class="table table-bordered">
<tr>
<form name="form1" method="post" action="update_map.php">
<td>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
<tr>
<td>&nbsp;</td>
<td colspan="3"><strong>UPDATE IT IN MY TABLE</strong> </td>
</tr>
<tr>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
</tr>
<tr>
<td align="center">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<?php
while($data=mysqli_fetch_array($result)){

?>
<tr>
<td align="center"><strong>UID:</strong></td>
<td><input name="id" type="text" id="uid" value="<?php echo $data['uid']; ?>" size="15">
</td></tr>
<tr>
<td align="center"><strong>NAME:</strong></td>
<td><input name="name" type="text" id="name" value="<?php echo $data['name']; ?>" size="15">
</td></tr>
<tr>
<td align="center"><strong>STREET NAME:</strong></td>
<td><input name="strt" type="text" id="st" value="<?php echo $data['street']; ?>" size="15">
</td></tr>
<tr>
<td align="center"><strong>ADDITIONAL:</strong></td>
<td><input name="st" type="text" id="addst" value="<?php echo $data['additional']; ?>" size="15">
</td></tr>
<tr>
<td align="center"><strong>CITY:</strong></td>
<td><input name="ct" type="text" id="ct" value="<?php echo $data['city']; ?>" size="15">
</td></tr>

<tr>
<td align="center"><strong>PROVINCE:</strong></td>
<td><input name="pro" type="text" id="pro" value="<?php echo $data['province']; ?>" size="15">
</td></tr>
<tr>
<td align="center"><strong>ZIP CODE:</strong></td>

<td><input name="zip" type="text" id="zip" value="<?php echo $data['postal_code']; ?>" size="15">
</td></tr>
<tr>
<td align="center"><strong>COUNTRY:</strong></td>

<td><input name="cn" type="text" id="cn" value="<?php echo $data['country']; ?>" size="15">
</td></tr>

<tr>
<td align="center"><strong>LATITUDE:</strong></td>

<td><input name="l1" type="text" id="l1" value="<?php echo $data['latitude']; ?>" size="15">
</td></tr>
<tr>
<td align="center"><strong>LONGTITUDE:</strong></td>

<td><input name="l2" type="text" id="l2" value="<?php echo $data['longitude']; ?>" size="15">
</td></tr>

<?php } ?>

<td>&nbsp;</td>

<td align="center">
<input type="submit" name="Submit" value="Submit"><br><br>


</table>
</div>
</form>




<?php

// close connection 
mysql_close();
include 'markdrag.php';?>


