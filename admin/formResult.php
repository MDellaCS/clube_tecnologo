<?php

$foto = $nome = $idade = $email = $ano = $semestre = $curso = $textoPessoal = $textoFatec = $textoLivre = "";

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
    $textoLivre = test_input($_POST["textoLivreTec"]);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

include_once('connection.php');

$sql = "INSERT INTO tb_tecnologo (nome, idade, ano_formacao, semestre_formacao, email, curso, foto, texto_sobre, texto_fatec) VALUES ('$nome', $idade, $ano, '$semestre', '$email', '$curso', '$foto', '$textoPessoal', '$textoFatec')";

$con->query($sql);

// mail($email, 'Obrigado por se cadastrar no Clube do Tecnólogo', 'mensagem');

?>