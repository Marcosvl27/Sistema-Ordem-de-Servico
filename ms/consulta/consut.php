<?php
session_start();

// Verifica se o usuário está logado
if (isset($_SESSION['email']) && isset($_SESSION['nome'])) {
    $nomeUsuario = $_SESSION['nome'];
    $nomeadmin = "Vinicius Soares Silva"; // Coloque o email do usuário "admin" aqui
    $podeCadastrar = ($nomeUsuario === $nomeadmin);


} else {
    // Redireciona para a página de login se não estiver logado
    header("location: login.php");
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>;

<?php
// Configurações do banco de dados
include('../config/conexao.php');

// Parâmetros de filtro
$filtro_responsavel = $_GET['filtro_responsavel'] ?? '';
$filtro_data = $_GET['filtro_data'] ?? '';
$filtro_local = $_GET['filtro_local'] ?? '';
$filtro_status = $_GET['filtro_status'] ?? '';

// Consulta SQL base
$consulta = "SELECT * FROM servicos WHERE dad = 1";

// Aplicar filtros
if (!empty($filtro_responsavel)) {
    $consulta .= " AND responsavel_servico LIKE '%$filtro_responsavel%'";
}

if (!empty($filtro_data)) {
    $consulta .= " AND data_do_servico = '$filtro_data'";
}

if (!empty($filtro_local)) {
    $consulta .= " AND local_do_servico LIKE '%$filtro_local%'";
}

if (!empty($filtro_status)) {
    $consulta .= " AND status_do_servico = '$filtro_status'";
}

$resultado = $conn->query($consulta);


ob_start(); 
if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
       
       
       

       
      echo '  <div class="container mt-5">';
    echo' <table class="table">';
    echo'         <thead> ';
    echo'         <tr> ';
    echo'                <th>ID</th>';
    echo'              <th>Responsavel pelo serviço</th>';
    echo'                 <th>Nome do Serviço</th>';
    echo'                <th>Descrição</th>';
    echo'             <th>Data do Serviço</th>';
      echo'                 <th>Hora do Serviço</th>';
      echo'             <th>Local do Serviço</th>';
      echo'                <th>Materiais Uilizados</th>';
      echo'               <th>Status do Serviço</th>';
      echo'             <th>Ações</th> ';
      echo'        </tr>';
      echo'       </thead>';
       
       
        echo "<tr>";
        echo "<td>" . $linha["id"] . "</td>";
        echo "<td>" . $linha["responsavel_servico"] . "</td>";
        echo "<td>" . $linha["nome_do_servico"] . "</td>";
        echo "<td>" . $linha["descricao_do_servico"] . "</td>";
        echo "<td>" . $linha["data_do_servico"] . "</td>";
        echo "<td>" . $linha["hora_do_servico"] . "</td>";
        echo "<td>" . $linha["local_do_servico"] . "</td>";
        echo "<td>" . $linha["materiais_utilizados"] . "</td>";
        echo "<td>" . $linha["status_do_servico"] . "</td>";
        echo "<td>";
        if ($podeCadastrar){
      
        echo "<a href='editar_servico.php?id=" . $linha["id"] . "' class='btn btn-primary'>Editar</a>";
        echo "</td>";
        echo "<td>";
        echo " <a href='excluir_servico.php?id=" . $linha["id"] . "' class='btn btn-danger'>Excluir</a>";
        echo "</td>";
    } 
        echo "<td>";
        echo " <a href='indexconclusao.php?id=". $linha['id']. "' class='btn btn-success'>Concluir</a>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Nenhuma Ordem de serviço encontrada.</td></tr>";
}
$output = ob_get_clean();

// Fechar conexão
$conn->close();

echo $output
?>

