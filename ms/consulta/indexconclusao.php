<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conclusão</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Preencher Informações de Conclusão</h1>
        <br>
        <form action="../concluir_servico_realizado.php" method="POST">

            <input type="hidden"  name="id_servico_realizado" value='<?= $_GET['id'] ?>'>
            
            <label>

            <div class="mb-3">
            <label for="nome_funcionario"><b> Nome do funcionário </label>
            <input type="text" class="form-control" name="nome_funcionario" id="nome_funcionario">
            </div>

            <div class="mb-3">
            <label for="contato_funcionario"> Contato do funcionário </label>
            <input type="text" class="form-control" name="contato_funcionario" id="contato_funcionario">
            </div>

            <div class="mb-3">
            <label for="data_servico"> Data da realização  </label>
            <input type="date" class="form-control" name="data_servico" id="data_servico">
            </div>

            <div class="mb-3">
            <label for="hora_inicial_servico"> Hora inicial do serviço  </label>
            <input type="time" class="form-control" name="hora_inicial_servico" id="hora_inicial_servico">
            </div>

            <div class="mb-3">
            <label for="hora_final_servico"> Hora final do serviço  </label>
            <input type="time" class="form-control" name="hora_final_servico" id="hora_final_servico">
            </div>

            <div class="form-floating">
                <textarea class="form-control" name="descricao" id="floatingTextarea2" style="height: 100px" rows="3"></textarea>
                <label class="floatingTextarea2" for="descricao">Descrição da Conclusão:</label>
            </div>
            <br>
            <div class="form-floating">
                <textarea class="form-control" name="observacao" id="observacao" rows="4"></textarea>
                <label class="floatingTextarea2" for="observacao">Observação:</label>
            </div>
            <br>
            <div  class="form-floating">
                <textarea class="form-control" name="materiais_utilizados" id="floatingTextarea2" style="height: 100px; width : 600px"  rows="4"></textarea>
                <label class="floatingTextarea2" for="materiais">Materiais Utilizados na Conclusão:</label>
            </div>
            </label><br>
            <button type="submit" class="btn btn-primary">Concluir Serviço</button>
            
        </form>
    </div>

    <style>
        body{
            background-color: darkgray;
        }
    </style>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>