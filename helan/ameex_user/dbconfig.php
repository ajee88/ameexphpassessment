<?php
$configVars = json_decode(file_get_contents("http://irwinner.in/ameexphpassessment/secure/dbconfig.php"));

// Create connection
$cn = new mysqli(base64_decode($configVars->servername), base64_decode($configVars->username), base64_decode($configVars->password), base64_decode($configVars->dbname));
// Check connection
if ($cn->connect_error) {
    die("Connection failed: " . $cn->connect_error);
} 
?>
