
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
</head>
<body>

<button onclick='voltar()'>Voltar</button>


<div class="container mt-5">
    <h2>Lista de Usuários</h2>

    



            <?php

    echo "
    <form method='GET' class='mb-3'>
        <div class='row'>
            <div class='col-md-4'>
                <select name='coluna' class='form-select'>
                    <option value='nome_usuario'>Nome</option>
                    <option value='cpf'>CPF</option>
                    <option value='cargo'>Cargo</option>
                </select>
            </div>
            <div class='col-md-6'>
                <input type='text' name='pesquisa' class='form-control' placeholder='Digite a pesquisa'>
            </div>
            <div class='col-md-2'>
                <button type='submit' class='btn btn-primary'>Pesquisar</button>
            </div>
        </div>
    </form>

    <table class='table'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Departamento</th>
                <th>Cargo</th>
                <th>Data do cadastro</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
    ";        

if (isset($_GET['coluna']) && isset($_GET['pesquisa'])) {
    $coluna = $_GET['coluna'];
    $pesquisa = $_GET['pesquisa'];
    $consulta = "SELECT * FROM funcionario WHERE $coluna LIKE '%$pesquisa%'";
} else {
    $consulta = "SELECT * FROM funcionario";
}

            include "../config/conexao.php";
           
            $resultado = $conn->query($consulta);
            
            while ($linha = $resultado->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $linha['id'] . '</td>';
                echo '<td>' . $linha['nome_usuario'] . '</td>';
                echo '<td>' . $linha['cpf'] . '</td>';
                echo '<td>' . $linha['email'] . '</td>';
                echo '<td>' . $linha['telefone'] . '</td>';
                echo '<td>' . $linha['departamento'] . '</td>';
                echo '<td>' . $linha['cargo'] . '</td>';
                echo '<td>' . $linha['data_criacao'] . '</td>';
                echo '<td>';
                echo '<a href="editar_usuario.php?id=' . $linha['id'] . '" class="btn btn-primary">Editar</a>';
                echo ' <a href="excluir_usuario.php?id=' . $linha['id'] . '" class="btn btn-danger">Excluir</a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<style>
    .btn.btn-primary{
       margin: 8px;
    }
    .btn.btn-danger{
        margin: 8px;
        width: 70px;
    }
</style>

<script>
    function voltar(){
        window.location.href = "http://localhost/ms/painel.php";
    }
</script>