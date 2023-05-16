<?php 
$Servername = "sql1596.main-hosting.eu";
$database = "u876447700_integration";
$username = "u876447700_root";
$password = "XirTech191200.";

$conn = mysqli_connect($Servername, $database, $username, $password);

if (!$conn) {
  die("Cpnnection failed ". mysqli_connect_error());

}

?>