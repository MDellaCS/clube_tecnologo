<?php 

include_once('connection.php');

$sql = $con->prepare
("INSERT INTO `tb_admin` (`nome`, `email`, `senha`) 
VALUES (?,?,?)");

$sql->bind_param("sssi", $nome, $email, $senha);

$nome = $_POST['nm_enviar_nome'];
$email = $_POST['nm_enviar_email'];
$senha = hash('sha512', $_POST['nm_enviar_password']);

$sql->execute();
$sql->close();
$con->close();

if ($sql == true) {
    session_start();
    $_SESSION['novousuario'] = "1";
	header('Location: loginTecnologoSucesso.php');
} else {
    echo "<h2>Erro no envio dos dados!</h2>";
}

?>