<?php
$host = getenv('MYSQLHOST');
$user = getenv('MYSQLUSER');
$pass = getenv('MYSQLPASSWORD');
$db   = getenv('MYSQLDATABASE');
$port = (int)getenv('MYSQLPORT');

if(empty($host)) {
    die("DB env variables not set!");
}

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    die("DB Connection failed: " . mysqli_connect_error());
}
?>
