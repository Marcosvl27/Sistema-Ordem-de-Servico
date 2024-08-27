<html lang="PT-BR">
<head>
    <title>Cadastro de Ordem de Serviço</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<button onclick='voltar()'>Voltar</button>
    <div class="container mt-4">
        <h1>Cadastro de Ordem de Serviço</h1>
        <form id="ordemServicoForm" action="cadordem.php" method="post">
            <div class="mb-3">
            <label for="nome">Serviço para ser realizado:</label>
                <input type="text" class="form-control" id="nomeServico" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição do Serviço:</label>
                <textarea class="form-control" id="descricao" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="data">Data do Serviço:</label>
                <input type="date" class="form-control" id="data" required>
            </div>
            <div class="form-group">
                <label for="hora">Hora do Serviço:</label>
                <input type="time" class="form-control" id="hora" required>
            </div>
            <div class="form-group">
                <label for="local">Local do Serviço:</label>
                <input type="text" class="form-control" id="local" required>
            </div>
            <div class="form-group">
                <label for="responsaveis">Responsável pelo Serviço:</label>
                <input type="text" class="form-control" id="responsaveis" required>
            </div>
            <div class="form-group">
                <label for="materiais">Materiais Utilizados:</label>
                <textarea class="form-control" id="materiais" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status do Serviço:</label>
                <select class="form-control" id="status" required>
                    <option value="Em andamento">Em andamento</option>
                    <option value="Concluído">Concluído</option>
                    <option value="Atrasado">Atrasado</option>
                </select>
            </div>
</div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Função para enviar os dados do formulário para o servidor
            $("#ordemServicoForm").submit(function(event) {
                event.preventDefault();
                const data = {
                 nome_servico: $("#nomeServico").val(),
                 descricao_servico: $("#descricao").val(),
                 data_servico: $("#data").val(),
                 hora_servico: $("#hora").val(),
                 local_servico: $("#local").val(),
                 responsaveis_servico: $("#responsaveis").val(),
                 materiais_utilizados: $("#materiais").val(),
                 status_servico: $("#status").val()
};

                // Substitua a URL abaixo pela URL do seu servidor que receberá os dados
                const url = "cadordem.php";

                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    success: function(response) {
                        // Aqui você pode tratar a resposta do servidor, se necessário
                        alert("Ordem de Serviço cadastrada com sucesso");
                        setTimeout(function() {
           window.location.href = "http://localhost/ms/painel.php";
       }, 1);
                    },
                    error: function(error) {
                        // Aqui você pode tratar erros de requisição, se necessário
                        alert("Falaha no cadastramento de Ordem de serviço");
                        console.error(error);
                    }
                });
            });
        });
    </script>
</body>
</html>





<script>
    function voltar(){
        window.location.href = "http://localhost/ms/painel.php";
    }
</script>