<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["emailAdm"]);
    $senha = test_input($_POST["senhaAdm"]);

    include_once('connection.php');

    $sql = "SELECT nome, email, senha FROM tb_admin WHERE email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row["senha"])) {
            $_SESSION["nome"] = $row["nome"];
            $_SESSION["email"] = $email;
            $_SESSION["senha"] = $senha;

            header("Location: lista.php");
            exit();
        }
    }

    $stmt->close();
    $con->close();
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

header("Location: index.php?error=1");
exit();
?>