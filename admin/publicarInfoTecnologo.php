<?php 
    $id=$_GET['id'];
    $publicar=$_GET['publicar'];

    include_once('connection.php');

    $sql = $con->prepare("UPDATE tb_tecnologo SET publicado = 0 WHERE publicado = 1");
    $sql->execute();

    $sql = $con->prepare("UPDATE tb_tecnologo SET publicado = ? WHERE id = ?");
    $sql->bind_param("ii", $publicar, $id);
    $sql->execute();
    if ($sql == true && $con == true) {
        mysqli_close($con);
        header('Location: listaCasosSucesso.php');
        exit;
    } else {
        echo "Erro ao tentar deletar o registro.";
    }
?>