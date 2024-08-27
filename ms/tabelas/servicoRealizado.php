<?php 

class ServicoRealizado{

    private $nome_funcionario;
    private $contato_funcionario;
    private $data_servico;
    private $hora_inicial_servico;
    private $hora_final_servico;
    private $descricao_servico;
    private $observacao;
    private $materiais_utilizados;


    public function setnome_funcionario($nome_funcionario) {
        $this->nome_funcionario = $nome_funcionario;
    }

    public function getnome_funcionario() {
        return $this->nome_funcionario;
    }


    public function setcontato_funcionario($contato_funcionario) {
        $this->contato_funcionario = $contato_funcionario;
    }

    public function getcontato_funcionario() {
        return $this->contato_funcionario;
    }


    public function setdata_servico($data_servico) {
        $this->data_servico = $data_servico;
    }

    public function getdata_servico() {
        return $this->data_servico;
    }


    public function sethora_inicial_servico($hora_inicial_servico) {
        $this->hora_inicial_servico = $hora_inicial_servico;
    }

    public function gethora_inicial_servico() {
        return $this->hora_inicial_servico;
    }

    
    public function sethora_final_servico($hora_final_servico) {
        $this->hora_final_servico = $hora_final_servico;
    }

    public function gethora_final_servico() {
        return $this->hora_final_servico;
    }



    public function setdescricao_servico($descricao_servico) {
        $this->descricao_servico = $descricao_servico;
    }

    public function getdescricao_servico() {
        return $this->descricao_servico;
    }



    public function setmateriais_utilizados($materiais_utilizados) {
        $this->materiais_utilizados = $materiais_utilizados;
    }

    public function getmateriais_utilizados() {
        return $this->materiais_utilizados;
    }


    public function setobservacao($observacao) {
        $this->observacao = $observacao;
    }

    public function getobservacao() {
        return $this->observacao;
    }



    public function inserir() {
        
        include "config/conexao.php";
        
        
        $sql = "INSERT INTO `servico_realizado`(`nome_funcionario`, `contato_funcionario`, `data_servico`, `hora_inicial_servico`, `hora_final_servico`, `descricao_servico`, `observacao`, `materiais_utilizados`) 
        VALUES ('$this->nome_funcionario','$this->contato_funcionario','$this->data_servico',
        '$this->hora_inicial_servico','$this->hora_final_servico','$this->descricao_servico','$this->materiais_utilizados','$this->observacao')";
    
        if ($conn) {
            if (mysqli_query($conn, $sql)) {
                return "Inserido com sucesso!";
            } else {
                return 'Erro na inserção: ' . mysqli_error($conn);
            }
    
            // Fechar a conexão
   
        } else {
            return 'Erro na conexão com o banco de dados.';
        }
    }
    


}


?>