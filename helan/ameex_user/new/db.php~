<?php


$configVars = json_decode(file_get_contents("http://irwinner.in/ameexphpassessment/secure/dbconfig.php"));
// Create connection
$cn = new mysqli(base64_decode($configVars->servername), base64_decode($configVars->username), base64_decode($configVars->password), base64_decode($configVars->dbname));
// Check connection
if ($cn->connect_error) {
die("Connection failed: " . $cn->connect_error);
}
else
{
echo "connected";
}
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$pass=$_POST['pass'];
            $sql1="INSERT INTO chec SET name='$name', pass='$pass'"; 
            //$query = "insert into chec(name,pass) values('$name','$pass')"; 
            $result = mysqli_query($cn,$sql1) or  die(mysqli_connect_errno()."Data cannot be inserted"); 
            $json_string = json_encode($result);
            echo $json_string;
            }

?>

<html>
<form action="" method="post" name="login">
	<table>
	<tbody>
	<tr>
	<th>UserName:</th>
	<td><input type="text" name="name" required="" /></td>
	</tr>
	<tr>
	<th>Password:</th>
	<td><input type="password" name="pass" required="" /></td>
	</tr>
        <tr>	
	<td><input type="submit" name="submit" value="Login" /></td>
	</tr>
</form>
</html>
