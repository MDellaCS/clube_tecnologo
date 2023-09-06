<?php 

$dbHost = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName = "db_clube";

$con = new mysqli();

$con->real_connect($dbHost, $dbUsername, $dbPassword, $dbName);

if($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>