<?php

$id = $_POST['id'];

// -------------------- PUBLICAR CADASTRO --------------------

include('connection.php');

$sql = "CALL publishTecnologo(?)";

$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->close();
$con->close();

// -------------------- ENVIAR EMAIL --------------------

include('connection.php');

$sql = "SELECT nome, email FROM tb_tecnologo WHERE id = ?";

$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

$nome = $row['nome'];
$email = $row['email'];

$to = $email;
$subject = "Confirmação de Dados FATEC-ZL Clube do Tecnólogo";
$message = "
<div style='font-size:24px'>Parabéns $nome!</div>
<div style='font-size:20px'>
    Seu post no clube do tecnólogo foi aprovado.
</div>
    ";
$headers = "From: FatecZL | Clube do Tecnólogo" . "\r\n" .
    "Reply-To: f111.clubetecnologo@fatec.sp.gov.br" . "\r\n" .
    'Content-Type: text/html; charset=utf-8' . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

mail($to, $subject, $message, $headers);

$stmt->close();
$con->close();

?>