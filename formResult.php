<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../imagens/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        type="text/css" type="text/css" media="all">

    <link rel="stylesheet" href="form.css">
    <script src="form.js"></script>
    <title>Resultado | Clube do Tecnólogo</title>
</head>

<body>

    <?php

    // -------------------- ENVIAR A IMAGEM PARA O DIRETÓRIO --------------------
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if ($_FILES["fotoTec"]["error"] == 0) {
            $nomeArquivo = $_FILES["fotoTec"]["name"];
            $microsegundos = microtime(true);
            $caminhoTemporario = $_FILES["fotoTec"]["tmp_name"];

            $path = "profilePictures/";

            move_uploaded_file($caminhoTemporario, $path . $microsegundos . $nomeArquivo);
        }
    }

    // -------------------- PEGAR DADOS DO FORM --------------------
    
    $foto = $nome = $idade = $ra = $email = $ano = $semestre = $curso = $textoPessoal = $textoFatec = "";

    if ($_POST["formacaoTec"] == "Cursando") {
        $_POST["anoTec"] = 1901;
        $_POST["semestreTec"] = "";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $foto = test_input($microsegundos . $nomeArquivo);
        $nome = test_input($_POST["nomeTec"]);
        $idade = test_input($_POST["idadeTec"]);
        $ra = test_input($_POST["raTec"]);
        $email = test_input($_POST["emailTec"]);
        $ano = test_input($_POST["anoTec"]);
        $semestre = test_input($_POST["semestreTec"]);
        $curso = test_input($_POST["cursoTec"]);
        $textoPessoal = test_input($_POST["textoPessoalTec"]);
        $textoFatec = test_input($_POST["textoFatecTec"]);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // -------------------- INSERT BD --------------------
    
    include_once('admin/connection.php');

    $sql = "CALL insertTecnologo(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $con->prepare($sql);

    $stmt->bind_param("sissssssss", $nome, $idade, $ra, $ano, $semestre, $email, $curso, $foto, $textoPessoal, $textoFatec);

    if (!$stmt->execute()) {
        echo "Erro na inserção: " . $stmt->error;
    }

    $stmt->close();
    $con->close();

    // -------------------- ENVIAR EMAIL --------------------
    
    $to = $email;
    $subject = "Confirmação de Dados FATEC-ZL Clube do Tecnólogo";
    $message = "$nome, $idade, $ra, $ano, $semestre, $email, $curso, $foto, $textoPessoal, $textoFatec";
    $headers = "From: f111.clubetecnologo@fatec.sp.gov.br" . "\r\n" .
        "Reply-To: f111.clubetecnologo@fatec.sp.gov.br" . "\r\n" .
        'Content-Type: text/plain; charset=utf-8' . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    //mail($to, $subject, $message, $headers);
    
    // -------------------- DISPLAY HTML --------------------
    
    $nome = explode(" ", $nome);
    $nome = $nome[0];

    ?>

    <div>
        <img onclick="invertTheme()" class="icon btn floatR" />
    </div>

    <div class="formulario">
        <h1>Enviado com Sucesso!</h1>
        <h2>Obrigado <strong><?= $nome ?></strong>!</h2>
        <h2>Por favor, verifique o seu e-mail (<strong><?= $email ?></strong>) para verificar os seus dados, e, posteriormente, receber a confirmação de inclusão no clube.</h2>

        <div class="centerItems">
            <a href="index.php">
                <input type="button" class="btn" value="Voltar">
            </a>
        </div>

    </div>

</body>

</html>