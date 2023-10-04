<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="imagens/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        type="text/css" type="text/css" media="all">

    <link rel="stylesheet" href="../form.css">
    <script src="../form.js"></script>
    <title>Resultado | Clube do Tecnólogo</title>
</head>

<body>

    <?php

    // -------------------- PEGAR DADOS DO FORM --------------------
    
    $nome = $email = $senha = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = test_input($_POST["nomeAdm"]);
        $email = test_input($_POST["emailAdm"]);
        $senha = test_input($_POST["senhaAdm"]);

        $senha = password_hash($senha, PASSWORD_BCRYPT);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // -------------------- INSERT BD --------------------
    
    include_once('connection.php');

    $sql = "CALL insertAdmin(?, ?, ?)";

    $stmt = $con->prepare($sql);

    $stmt->bind_param("sss", $nome, $email, $senha);

    if (!$stmt->execute()) {
        echo "Erro na inserção: " . $stmt->error;
    }

    $stmt->close();
    $con->close();

    // -------------------- DISPLAY HTML --------------------

    include_once("deslogar.php");
    
    ?>

    <div>
        <img id="btnTheme" onclick="invertTheme()" class="icon btn floatR" />
    </div>

    <div class="formulario">
        <h1>Cadastrado com Sucesso!</h1>
        <h2>Novo administrador: <?= $nome ?></h2>
        <div class="centerItems">
            <a href="index.php">
                <input type="button" class="btn" value="Voltar">
            </a>
        </div>

    </div>

</body>

</html>