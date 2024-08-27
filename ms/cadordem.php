<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os dados enviados pelo formulário
    $nome_servico = $_POST["nome_servico"];
    $descricao_servico = $_POST["descricao_servico"];
    $data_servico = $_POST["data_servico"];
    $hora_servico = $_POST["hora_servico"];
    $local_servico = $_POST["local_servico"];
    $responsaveis_servico = $_POST["responsaveis_servico"];
    $materiais_utilizados = $_POST["materiais_utilizados"];
    $status_servico = $_POST["status_servico"];

 
    include "../ms/tabelas/ordemservico.php";

   $Servico = new Servico;

   $Servico->setnome_servico($nome_servico);

   $Servico->setdescricao_servico($descricao_servico);

   $Servico->setdata_servico($data_servico);

   $Servico->sethora_servico($hora_servico);

   $Servico->setlocal_servico($local_servico);

   $Servico->setresponsaveis_servico($responsaveis_servico);

   $Servico->setmateriais_utilizados($materiais_utilizados);

   $Servico->setstatus_servico($status_servico);

   $Servico->gravar();



}
?>

<script>
   
   setTimeout(function() {
           window.location.href = "http://localhost/ms/painel.php";
       }, 1);
   </script>";