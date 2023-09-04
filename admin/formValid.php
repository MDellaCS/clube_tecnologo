<?php

$foto = $nome = $idade = $email = $celular = $ano = $semestre = $curso = $textoPessoal = $textoFatec = $textoLivre = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $foto = test_input($_POST["fotoTec"]);
    $nome = test_input($_POST["nomeTec"]);
    $idade = test_input($_POST["idadeTec"]);
    $email = test_input($_POST["emailTec"]);
    $celular = test_input($_POST["celularTec"]);
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

    include_once('formResult.php');

?>