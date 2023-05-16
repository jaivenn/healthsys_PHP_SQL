<?php
$sname = "sql596.main-hosting.eu";
$uname = "u876447700_root";
$password = "XirTech191200.";
//DB Connection
$db_name = "u876447700_integration";
$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    echo "Connection Failed!";
}