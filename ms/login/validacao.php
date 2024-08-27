

<?php

// Inicia a sessão
session_start();

// Verifica se os campos de email e senha estão preenchidos
if (isset($_POST['email']) && isset($_POST['senha'])) {

    // Limpa os dados do formulário
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

include "../config/conexao.php";

    // Verifica se o email existe no banco de dados
    $sql = "SELECT * FROM funcionario WHERE email = '$email'";
    $resultado = mysqli_query($conn, $sql);

    // Verifica se o usuário existe
    if (mysqli_num_rows($resultado) > 0) {

        // Obtém os dados do usuário do banco de dados
        $dados = mysqli_fetch_assoc($resultado);

        // Criptografa a senha
        $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

        // Verifica se a senha está correta
        if (password_verify($senha, $senha_criptografada)) {

            // Cria uma sessão para o usuário
            $_SESSION['email'] = $email;
            $_SESSION['nome'] = $dados['nome_usuario'];

 echo $senha_criptografada;

            // Redireciona o usuário para a página principal
        header("location: ../painel.php");

      
            exit();
        } else {
            header("location: login.php");
            echo "<script>
            window.alert('Usuario ou senha estão incorretos')
            </script>";
        }
    } else {
        header("location: login.php");
        echo "<script>
        window.alert('Usuario ou senha estão incorretos')
        </script>";
    }
} else {
    echo "Por favor, preencha todos os campos.";
}

?>