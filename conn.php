<?php
$servername = "localhost";
$username = "root";
$password = "hallo";

try {
//Creating connection for mysql
$conn = new PDO("mysql:host=$servername;dbname=incrowd", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}
?>
