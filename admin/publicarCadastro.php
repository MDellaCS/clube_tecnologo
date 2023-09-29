<?php

$id = $_POST['id'];

include_once('connection.php');

$sql = "CALL publishTecnologo(?)";

$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

// -------------------- ENVIAR EMAIL --------------------

$sql = "SELECT nome, ra, email FROM tb_tecnologo WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$stmt->close();
$con->close();

$nome = $row['nome'];
$ra = $row['ra'];
$email = $row['email'];

$to = $email;
$subject = "Aprovação de Post no Clube do Tecnólogo FATECZL";
$message = "<h2 class='centerItems'>Parabéns $nome!<br>RA: $ra<br><br>Sua publicação no Clube do Tecnólogo foi aprovada.<br>https://clube_tecnologo/.com.br";
$headers = "From: f111.clubetecnologo@fatec.sp.gov.br" . "\r\n" .
    "Reply-To: f111.clubetecnologo@fatec.sp.gov.br" . "\r\n" .
    'Content-Type: text/plain; charset=utf-8' . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

echo $message;

//mail($to, $subject, $message, $headers);

?>