<?php
// editar_servico.php

// Verifique se um ID de serviço foi fornecido
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id_servico = $_GET['id'];
    
    // Conecte-se ao banco de dados
    include('../config/conexao.php');
    
    // Busque os detalhes do serviço com base no ID
    $consulta = "SELECT * FROM servicos WHERE id = $id_servico";
    $resultado = $conn->query($consulta);

    if ($resultado->num_rows == 1) {
        $servico = $resultado->fetch_assoc();
    } else {
        echo "Serviço não encontrado.";
        exit();
    }
} else {
    echo "ID do serviço não fornecido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Serviço</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Serviço</h1>
        <form action="atualizar_servico.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $servico['id']; ?>">
            
            <!-- Aqui, você pode adicionar campos para permitir a edição de outras informações do serviço -->
            <div class="mb-3">
                <label for="nome_do_servico" class="form-label">Serviço</label>
                <input type="text" class="form-control" id="nome_do_servico" name="nome_do_servico" value="<?php echo $servico['nome_do_servico']; ?>">
           
                <div class="form-group">
                <label for="descricao">Descrição do Serviço:</label>
                <textarea class="form-control"name="descricao" value="<?php echo $servico['descricao_do_servico']; ?>" id="descricao" rows="3"><?php echo $servico['descricao_do_servico']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="data">Data do Serviço:</label>
                <input type="date" class="form-control" name="data" id="data" required value="<?php echo $servico['data_do_servico']; ?>">
            </div>
            <div class="form-group">
                <label for="hora">Hora do Serviço:</label>
                <input type="time" class="form-control" id="hora" name="hora" required value="<?php echo $servico['hora_do_servico']; ?>">
            </div>
            <div class="form-group">
                <label for="local">Local do Serviço:</label>
                <input type="text" class="form-control" id="local" name="local" required value="<?php echo $servico['local_do_servico']; ?>">
            </div>
            <div class="form-group">
                <label for="responsaveis">Responsável pelo Serviço:</label>
                <input type="text" class="form-control" id="responsaveis" name="responsavel" required value="<?php echo $servico['responsavel_servico']; ?>">
            </div>
            <div class="form-group">
                <label for="materiais">Materiais Utilizados:</label>
                <textarea class="form-control" name="material" id="materiais" rows="3"><?php echo $servico['materiais_utilizados']; ?></textarea value="<?php echo $servico['materiais_utilizados']; ?>">
            </div>
            <div class="form-group">
                <label for="status">Status do Serviço:</label>
                <select name="status" class="form-control" id="status" required value="<?php echo $servico['status_do_servico']; ?>">
                    <option value="Em andamento">Em andamento</option>
                    <option value="Concluído">Concluído</option>
                    <option value="Atrasado">Atrasado</option>
                </select>
            </div>

            </div>
       
            
            <!-- Adicione mais campos aqui para outros detalhes do serviço -->

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
