<?php
include "../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUsuario = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $departamento = $_POST['departamento'];
    $cargo = $_POST['cargo'];

    // Consulta para atualizar as informações do usuário
    $consulta = "UPDATE funcionario SET nome_usuario = '$nome', cpf = '$cpf', email = '$email', telefone = '$telefone', departamento = '$departamento', cargo = '$cargo' WHERE id = $idUsuario";

    if ($conn->query($consulta)) {
        header("Location: consultauser.php"); // Redireciona de volta para a lista de usuários após a atualização
        exit();
    } else {
        echo "Erro ao atualizar as informações do usuário: " ;
    }
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $idUsuario = $_GET['id'];

        // Consulta para obter as informações do usuário a ser editado
        $consulta = "SELECT * FROM funcionario WHERE id = $idUsuario";
        $resultado = $conn->query($consulta);

        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();
        } else {
            echo "Usuário não encontrado.";
            exit();
        }
    } else {
        echo "ID de usuário inválido.";
        exit();
    }
}
?>