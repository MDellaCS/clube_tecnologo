<?php

$email = $senha = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["emailAdm"]);
    $senha = test_input($_POST["senhaAdm"]);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

include_once('connection.php');

$sql = "SELECT email, senha FROM tb_admin WHERE email = ? AND senha = ?";
$stmt = $con->prepare($sql);
$senha = hash('sha512', $senha);
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $stmt->close();
    $con->close();

    session_start();
    $_SESSION["email"] = $email;
    $_SESSION["senha"] = $senha;

    header("Location: lista.php");
    exit();
} else {
    $stmt->close();
    $con->close();

    header("refresh:0.001;url=index.php");

    echo "<script>alert('Email e/ou Senha inválidos');</script>";
    exit();
}

?>