<?php

include_once('connection.php');

$sql = $con->prepare
("INSERT INTO `tbl_tecnologo` (`nome`, `idade`, `ano_formacao`, 
`semestre_formacao`, `email`, `celular`, `curso_realizado`, `foto`,
`info_sobre`, `info_fatec`, `info_area_livre`) 
VALUES (?,?,?,?,?,?,?,?,?,?,?)");

$sql->bind_param("siissssssss", $nome, $idade, $anoFormacao, 
$semestreFormacao, $email, $celular, $cursoRealizado, $foto, $infoSobre, 
$infoFatec, $infoAreaLivre);

// pegando o que vem do post
$nome = $_POST['nm_nome'];
$idade = $_POST['nm_idade'];
$anoFormacao = $_POST['nm_anof'];
$semestreFormacao = $_POST['radioSemestre'];
$email = $_POST['nm_email'];
$celular = $_POST['nm_celular'];
$cursoRealizado = $_POST['nm_curso'];

$file_path = "fotos"."/".str_replace(' ', '', strtolower($nome));
$file_image = $_FILES['nm_foto']['name'];
$image_extension = pathinfo($file_image, PATHINFO_EXTENSION);

if($_FILES['nm_foto']['name']){
	if(!file_exists($file_path)){
		mkdir($file_path, 0777, true);
	}
	date_default_timezone_set("America/Sao_Paulo");
	//movendo o arquivo para a pasta desejada e renomeando o arquivo
  	move_uploaded_file($_FILES['nm_foto']['tmp_name'], 
	  $file_path."/".date('d-m-Y-H-i-s')."_".str_replace(' ', '', strtolower($nome)).".".$image_extension);
}

$foto = $file_path."/".date('d-m-Y-H-i-s')."_".str_replace(' ', '', strtolower($nome)).".".$image_extension;

$infoSobre = $_POST['nm_infoSobre'];
$infoFatec = $_POST['nm_infoFatec'];
$infoAreaLivre = $_POST['nm_infoAreaLivre'];

$sql->execute();

if ($sql == true) {
	header('Location: successPage.html');
} else {
	header('Location: errPage.html');
}

$sql->close();
$con->close();
?>