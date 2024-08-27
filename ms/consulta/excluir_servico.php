<?php
// excluir_servico.php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_servico = $_GET['id'];
    
    // Inclua a classe Servico e crie uma instância
    include "../tabelas/ordemservico.php";
    $Servico = new Servico();
    
    // Chame o método para excluir o serviço
    if ($Servico->excluir($id_servico)) {
        // Redirecione de volta para a página principal


    } else {
        echo "Erro ao excluir o serviço.";
    }
} else {
    echo "ID do serviço não fornecido.";
}
?>

<script>
    window.alert("Ordem de serviço deletada com sucesso")
    setTimeout(function() {
            window.location.href = "http://localhost/ms/consulta/consultaServico.php";
        }, 1);
</script>