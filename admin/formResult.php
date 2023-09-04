<?php

include_once('connection.php');

$sql = "INSERT INTO tbl_tecnologo 
VALUES('$nomeTec', $idadeTec, $anoFormacaoTec, '$semestreTec', '$emailTec', '$celularTec', '$cursoRealizadoTec', '$fotoTec', '$textoPessoal', '$textoFatec', '$textoLivre')";

$con->query($sql);

?>