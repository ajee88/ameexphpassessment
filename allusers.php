<?php
include "dbconfig.php";

$sql = "SELECT * FROM ameex_vehicles";
$result = $cn->query($sql);
echo "<pre>"; print_r($result);
?>