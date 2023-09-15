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

    $foto = $nome = $idade = $email = $ano = $semestre = $curso = $textoPessoal = $textoFatec = $textoLivre = "";

    if (isset($_POST["formado"]) || !isset($_POST["anoTec"]) || !isset($_POST["semestreTec"])) {
        $_POST["anoTec"] = null;
        $_POST["semestreTec"] = null;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $foto = test_input($_POST["fotoTec"]);
        $nome = test_input($_POST["nomeTec"]);
        $idade = test_input($_POST["idadeTec"]);
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
        // echo $data, "  |  ";
        return $data;
    }

    include_once('../connection.php');

    $sql = "INSERT INTO tb_tecnologo (nome, idade, ano_formacao, semestre_formacao, email, curso, foto, texto_sobre, texto_fatec) VALUES ('$nome', '$idade', '$ano', '$semestre', '$email', '$curso', '$foto', '$textoPessoal', '$textoFatec')";

    $con->query($sql);

    // mail($email, 'Obrigado por se cadastrar no Clube do Tecnólogo', 'mensagem');
    
    $nome = explode(" ", $nome);
    $nome = $nome[0];

    ?>

    <div class="formulario">
        <h1>Enviado com Sucesso!</h1>
        <h2>Obrigado <strong><?php echo $nome ?></strong>!</h2>
        <h2>Por favor, verifique o seu e-mail (<strong><?php echo $email ?></strong>) para verificar os seus dados, e, posteriormente, receber a confirmação de inclusão no clube.</h2>
        
        <div style="text-align: center;">
            <a href="form.php">
                <input type="button" class="btn" value="Voltar">
            </a>
        </div>

    </div>

</body>

</html>