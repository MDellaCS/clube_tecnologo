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
<div style='margin-bottom: 64px; width: 50%; margin-left: auto; margin-right: auto; display: flex; justify-content: space-between;'>
    <img width='100' src='https://www.fateczl.edu.br/assets/logos/fatec-zl.png'>
    <img width='70' src='https://bkpsitecpsnew.blob.core.windows.net/uploadsitecps/sites/1/2022/10/centro-paula-souza-logo.svg'>
    <img width='110' style='background-color: black; padding: 7px;' src='https://bkpsitecpsnew.blob.core.windows.net/uploadsitecps/sites/1/2023/07/GOV_LOGO.svg'>
</div>
<div style='font-size:24px; text-align: center'>Parabéns, $nome!</div>
<br>
<br>
<div style='font-size:20px'>
    Seu post no Clube do Tecnólogo foi aprovado:
    <br>
    https://fateczl.edu.br/clube_tecnologo/
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