

include_once('connection.php');

$sql = "INSERT INTO tbl_tecnologo(nome, idade, ano_formacao, semestre_formacao, email, celular, curso_realizado, foto, info_sobre, info_fatec, info_area_livre) VALUES('$nomeTec', $idadeTec, $anoFormacaoTec, '$semestreTec', '$emailTec', '$celularTec', '$cursoRealizadoTec', '$fotoTec', '$textoPessoal', '$textoFatec', '$textoLivre')";

$con->query($sql);

?>