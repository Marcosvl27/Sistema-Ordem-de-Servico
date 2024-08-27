<?php
// concluir_servico.php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_servico = $_GET['id'];
    
    // Inclua a classe Servico e crie uma instância
    include "../tabelas/ordemservico.php";
    $Servico = new Servico();
    
    // Defina o status do serviço como "Concluído"
    $novo_status = "Concluído";
    $Servico->setstatus_servico($novo_status);

    $dad=1;

    $Servico->setdad($dad);

    $Servico->alterar($id_servico);
    
    // Redirecione de volta para a página principal
   
} else {
    echo "ID do serviço não fornecido.";
}
?>

<script>
                window.alert("Serviço concluido com sucesso");


setTimeout(function() {
             window.location.href = "http://localhost/ms/consulta/consultaServico.php";
        }, 0.2);

</script>