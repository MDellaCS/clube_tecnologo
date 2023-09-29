<?php
$dbHost = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName = "fateczle_clubetecnologo";

$con = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>