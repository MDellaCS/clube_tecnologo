<?php 

    $id=$_GET['id'];
    include_once('../connection.php');
    $sql = $con->prepare("DELETE FROM tbl_tecnologo WHERE id_tecnologo = ?");
    $sql->bind_param("i", $id);
    $sql->execute();
    if ($sql == true && $con == true) {
        mysqli_close($con);
        header('Location: listaCasosSucesso.php');
        exit;
    } else {
        echo "Erro ao tentar deletar o registro.";
    }
?>