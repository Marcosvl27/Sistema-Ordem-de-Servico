<?php
include "../config/conexao.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idUsuario = $_GET['id'];

    // Consulta para excluir o usuário
    $consulta = "DELETE FROM funcionario WHERE id = $idUsuario";

    if ($conn->query($consulta)) {
        header("Location: consultauser.php"); // Redireciona de volta para a lista de usuários após a exclusão
        exit();
    } else {
        echo "Erro ao excluir o usuário: " ;
    }
} else {
    echo "ID de usuário inválido.";
}
?>
