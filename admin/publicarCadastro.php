<?php

$id = $_POST['id'];

include_once('connection.php');

$sql = "CALL publishTecnologo(?)";

$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->close();
$con->close();

?>