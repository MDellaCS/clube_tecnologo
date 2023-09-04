<?php

include_once('connection.php');

$email = $_POST['nm_email'];
$senha = $_POST['nm_senha'];

$sql = "SELECT * FROM tbl_usuario WHERE email = ? AND senha = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $email, hash('sha512', $senha));
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if($user == true && $user['aprovado'] == 1){
    session_start();
    $_SESSION['login'] = "1";
	header('Location: listaCasosSucesso.php');
}else{
    session_start();
    $_SESSION['login'] = "0";
    header('Location: loginTecnologoSucesso.php');
}

?>