
 

<?php         

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="ameex"; // Mysql password 
$db_name="sangeetha"; // Database name 
$tbl_name="ameex_loc"; // Table name

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// get value of id that sent from address bar
$id=($_GET['id']);

// Retrieve data from database 
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);

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
<td colspan="3"><strong>Update data in mysql</strong> </td>
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
<tr>
<td align="center"><strong>NAME:</strong></td>
<td><input name="name" type="text" id="name" value="<?php echo $rows['name']; ?>" size="15">
</td></tr>
<tr>
<td align="center"><strong>STREET NAME:</strong></td>
<td><input name="st" type="text" id="st" value="<?php echo $rows['street']; ?>" size="15">
</td></tr>
<tr>
<td align="center"><strong>CITY:</strong></td>
<td><input name="ct" type="text" id="ct" value="<?php echo $rows['city']; ?>" size="15">
</td></tr>

<tr>
<td align="center"><strong>ZIP CODE:</strong></td>
<td><input name="zip" type="text" id="zip" value="<?php echo $rows['zip']; ?>" size="15">
</td></tr>
<tr>
<td align="center"><strong>STATE:</strong></td>

<td><input name="stt" type="text" id="stt" value="<?php echo $rows['state']; ?>" size="15">
</td></tr>
<tr>
<td align="center"><strong>COUNTRY:</strong></td>

<td><input name="cn" type="text" id="cn" value="<?php echo $rows['country']; ?>" size="15">
</td></tr>

<tr>
<td align="center"><strong>LATITUDE:</strong></td>

<td><input name="l1" type="text" id="l1" value="<?php echo $rows['lat']; ?>" size="15">
</td></tr>
<tr>
<td align="center"><strong>LONGTITUDE:</strong></td>

<td><input name="l2" type="text" id="l2" value="<?php echo $rows['lng']; ?>" size="15">
</td></tr>



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


