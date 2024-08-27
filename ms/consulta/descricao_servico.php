<?php
include('../config/conexao.php');

if (isset($_GET['id'])) {
    $idServico = $_GET['id'];

    $consulta = "SELECT * FROM servico_realizado where idservicos_realizado = $idServico";
    $resultado = $conn->query($consulta);

    if ($resultado->num_rows > 0) {
        $linha = $resultado->fetch_assoc();
        $descricao = $linha['descricao_servico'];
        $nome_funcionario = $linha['nome_funcionario'];
        $contato_funcionario = $linha['contato_funcionario'];
        $data_servico = $linha['data_servico'];
        $hora_inicial_servico = $linha['hora_inicial_servico'];
        $hora_final_servico = $linha['hora_final_servico'];
        $observacao = $linha['observacao'];
        $materiais_utilizados = $linha['materiais_utilizados'];
    } else {
        $descricao = "Descrição não encontrada.";
    }
} else {
    $descricao = "ID do serviço não especificado.";
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descrição do Serviço</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Descrição do Serviço</h1>
    <table class="table">
        <tr>
            <th>Nome do Funcionário</th>
            <td><?php echo $nome_funcionario; ?></td>
        </tr>
        <tr>
            <th>Contato do Funcionário</th>
            <td><?php echo $contato_funcionario; ?></td>
        </tr>
        <tr>
            <th>Descrição</th>
            <td><?php echo $descricao; ?></td>
        </tr>
        <tr>
            <th>Data do Serviço</th>
            <td><?php echo $data_servico; ?></td>
        </tr>
        <tr>
            <th>Hora Inicial do Serviço</th>
            <td><?php echo $hora_inicial_servico; ?></td>
        </tr>
        <tr>
            <th>Hora Final do Serviço</th>
            <td><?php echo $hora_final_servico; ?></td>
        </tr>
        <tr>
            <th>Observação</th>
            <td><?php echo $observacao; ?></td>
        </tr>
        <tr>
            <th>Materiais Utilizados</th>
            <td><?php echo $materiais_utilizados; ?></td>
        </tr>
    </table>
    <a href="javascript:history.back()" class="btn btn-secondary">Voltar</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
