<?php
// atualizar_servico.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
        // Conecte-se ao banco de dados
        include("../tabelas/ordemservico.php");
        
        $id_servico = $_POST['id'];
        $nome_servico = $_POST['nome_do_servico'];
        $descricao_servico = $_POST['descricao'];
        $data_servico = $_POST['data'];
        $hora_servico = $_POST['hora'];
        $local_servico = $_POST['local'];
        $responsaveis_servico = $_POST['responsavel'];
        $materiais_utilizados = $_POST['material'];
        $status_servico = $_POST['status'];

        // Defina os valores para os outros campos
        
        $Servico = new Servico;

        $Servico->setnome_servico($nome_servico);
     
        $Servico->setdescricao_servico($descricao_servico);
     
        $Servico->setdata_servico($data_servico);
     
        $Servico->sethora_servico($hora_servico);
     
        $Servico->setlocal_servico($local_servico);
     
        $Servico->setresponsaveis_servico($responsaveis_servico);
     
        $Servico->setmateriais_utilizados($materiais_utilizados);
     
        $Servico->setstatus_servico($status_servico);
     
        $Servico->alterar($id_servico);


        // Atualize os dados no banco de dados
          }
?>



<script>
                window.alert("Serviço alterado com sucesso");


setTimeout(function() {
             window.location.href = "http://localhost/ms/consulta/consultaServico.php";
        }, 0.2);

</script>
