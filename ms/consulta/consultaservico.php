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
    <title>Consulta de Serviços</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<button onclick='voltar()'>Voltar</button>
<div class="mb-3">
<h1>Consulta de Serviços</h1>
   
    <form id="filtro-form" class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <label for="filtro_responsavel" class="sr-only">Responsável</label>
            <input type="text" class="form-control" id="filtro_responsavel" name="filtro_responsavel" placeholder="Responsável">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="filtro_data" class="sr-only">Data</label>
            <input type="date" class="form-control" id="filtro_data" name="filtro_data">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="filtro_local" class="sr-only">Local</label>
            <input type="text" class="form-control" id="filtro_local" name="filtro_local" placeholder="Local">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="filtro_status" class="sr-only">Status</label>
            <select class="form-control" id="filtro_status" name="filtro_status">
                <option value="">Status</option>
                <option value="Em andamento">Em andamento</option>
                <option value="Concluído">Concluído</option>
                <option value="Atrasado">Atrasado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Filtrar</button>
    </form>
</div>
    
       
            <?php
            // Configurações do banco de dados
            include('../config/conexao.php');

            // Parâmetros de filtro
            $filtro_responsavel = $_GET['filtro_responsavel'] ?? '';
            $filtro_data = $_GET['filtro_data'] ?? '';
            $filtro_local = $_GET['filtro_local'] ?? '';
            $filtro_status = $_GET['filtro_status'] ?? '';

            // Consulta SQL com filtros
            $consulta = "SELECT * FROM servicos where dad = 0";

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

            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    echo " <table class='table'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th >Responsavel pelo serviço</th>
                            <th >Nome do Serviço</th>
                            <th >Descrição</th>
                            <th >Data do Serviço</th>
                            <th >Hora do Serviço</th>
                            <th >Local do Serviço</th>
                            <th >Materiais Uilizados</th>
                            <th >Status do Serviço</th>
                            <th >Ações</th>
                        </tr>
                    </thead>
                    <tbody id='resultado-tabela'>";


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
                    echo "<td>";
                    }
                    echo " <a href='indexconclusao.php?id=". $linha['id']. "' class='btn btn-success'>Concluir</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Nenhuma ordem de serviço encontrada.</td></tr>";
            }

            // Fechar conexão
            $conn->close();
            ?>
                
</div>
            </tbody>
            </tbody>

        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
   $(document).ready(function() {
    $('#filtro-form').on('submit', function(event) {
        event.preventDefault();
        filtrarTabela();
    });

    function filtrarTabela() {
        var filtroResponsavel = $('#filtro_responsavel').val();
        var filtroData = $('#filtro_data').val();
        var filtroLocal = $('#filtro_local').val();
        var filtroStatus = $('#filtro_status').val();

        $.ajax({
            url: 'consult.php',
            type: 'GET',
            data: {
                filtro_responsavel: filtroResponsavel,
                filtro_data: filtroData,
                filtro_local: filtroLocal,
                filtro_status: filtroStatus
            },
            success: function(response) {
                if (response.trim() === "") {
                    $('.hidden-columns').addClass('hidden-columns');
                    $('#resultado-tabela').html("<tr><td colspan='10'>Nenhum resultado encontrado.</td></tr>");
                } else {
                    $('.hidden-columns').removeClass('hidden-columns');
                    $('#resultado-tabela').html(response);
                }
            }
        });
    }
});
</script>

<style>
    .hidden-columns {
        display: none;
    }
</style>
<script>
    function voltar(){
        window.location.href = "http://localhost/ms/painel.php";
    }
</script>