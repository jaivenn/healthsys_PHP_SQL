<?php 
$host = "sql596.main-hosting.eu";
$user = "u876447700_root";
$password = "XirTech191200.";
$db = "u876447700_integration";
try {

  $con = new PDO("mysql:dbname=$db;port=3306;host=$host", 
  	$user, $password); 
  // set the PDO error mode to exception
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: ".
   $e->getMessage();
  echo $e->getTraceAsString();
  exit;
}
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 



//24 minutes default idle time
// if(isset($_SESSION['ABC'])) {
// 	unset($_SESSION['ABC']);
// }

?>