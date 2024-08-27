<?php


$id_servico= $_POST["id_servico_realizado"];
$nome_funcionario = $_POST["nome_funcionario"];
$contato_funcionario = $_POST["contato_funcionario"];
$data_servico = $_POST["data_servico"];
$hora_inicial_servico = $_POST["hora_inicial_servico"];
$hora_final_servico = $_POST["hora_final_servico"];
$descricao_servico = $_POST["descricao"];
$observacao = $_POST["observacao"];
$materiais_utilizados = $_POST["materiais_utilizados"];

include("../ms/tabelas/servicoRealizado.php");

$ServicoRealizado = new ServicoRealizado();


$ServicoRealizado ->setnome_funcionario($nome_funcionario);

$ServicoRealizado ->setcontato_funcionario($contato_funcionario);

$ServicoRealizado ->setdata_servico($data_servico);

$ServicoRealizado ->sethora_inicial_servico($hora_inicial_servico);

$ServicoRealizado ->sethora_final_servico($hora_final_servico);

$ServicoRealizado ->setdescricao_servico($descricao_servico);

$ServicoRealizado ->setmateriais_utilizados($materiais_utilizados);

$ServicoRealizado ->setobservacao($observacao);

$ServicoRealizado ->inserir();


include "tabelas/ordemservico.php";
    $Servico = new Servico();
    
    // Defina o status do serviço como "Concluído"
    $status = "Concluído";

    $Servico->setstatus_servico($status);

    $dad=1;

    $Servico->setdad($dad);

    $Servico->concluir($id_servico);


?>


<script>
                window.alert("Serviço concluido com sucesso");


setTimeout(function() {
             window.location.href = "http://localhost/ms/consulta/consultaServico.php";
        }, 0.2);

</script>