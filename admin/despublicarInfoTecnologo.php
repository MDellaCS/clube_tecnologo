<?php
$id = $_GET['id'];
$despublicar = $_GET['despublicar'];

include_once('../connection.php');

$sql = $con->prepare("UPDATE tb_tecnologo SET publicado = ? WHERE id = ?");
$sql->bind_param("ii", $despublicar, $id);
$sql->execute();
if ($sql == true && $con == true) {
    mysqli_close($con);
    header('Location: listaCasosSucesso.php');
    exit;
} else {
    echo "Erro ao tentar deletar o registro.";
}
?>