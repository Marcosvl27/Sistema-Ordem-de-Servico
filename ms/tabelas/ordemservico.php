<?php

class Servico {
    private   $nome_servico;
    private   $descricao_servico;
    private   $data_servico;
    private   $hora_servico;
    private   $local_servico;
    private   $responsaveis_servico;
    private   $materiais_utilizados;
    private   $status_servico;
    private   $dad;


    public function setnome_servico($nome_servico) {
        $this->nome_servico = $nome_servico;
    }

    public function getnome_servico() {
        return $this->nome_servico;
    }
    public function setdescricao_servico($descricao_servico) {
        $this->descricao_servico = $descricao_servico;
    }

    public function getdescricao_servico() {
        return $this->descricao_servico;
    }
    public function setdata_servico($data_servico) {
        $this->data_servico = $data_servico;
    }

    public function getdata_servico() {
        return $this->data_servico;
    }
    public function sethora_servico($hora_servico) {
        $this->hora_servico = $hora_servico;
    }

    public function gethora_servico() {
        return $this->hora_servico;
    }
    public function setlocal_servico($local_servico) {
        $this->local_servico = $local_servico;
    }

    public function getlocal_servico() {
        return $this->local_servico;
    }
    public function setresponsaveis_servico($responsaveis_servico) {
        $this->responsaveis_servico = $responsaveis_servico;
    }

    public function getresponsaveis_servico() {
        return $this->responsaveis_servico;
    }
    public function setmateriais_utilizados($materiais_utilizados) {
        $this->materiais_utilizados = $materiais_utilizados;
    }

    public function getmateriais_utilizados() {
        return $this->materiais_utilizados;
    }
    public function setstatus_servico($status_servico) {
        $this->status_servico = $status_servico;
    }

    public function getstatus_servico() {
        return $this->status_servico;
    }
    public function setdad($dad) {
        $this->dad = $dad;
    }
    
    public function getdad() {
        return $this->dad;
    }

    public function gravar(){
        include "config/conexao.php";
        $sql ="INSERT INTO `servicos`(`nome_do_servico`, `descricao_do_servico`, `data_do_servico`, `hora_do_servico`, `local_do_servico`, `responsavel_servico`, `materiais_utilizados`, `status_do_servico`) 
        VALUES ('$this->nome_servico','$this->descricao_servico','$this->data_servico','$this->hora_servico','$this->local_servico','$this->responsaveis_servico','$this->materiais_utilizados','$this->status_servico')";
    if (mysqli_query($conn,$sql)){
        return"gravado com sucesso!";
    }else {
        return'erro na tabela produtos'.$sql;
    }
    }

    public function alterar($id_servico){
        include "../config/conexao.php";
        $sql = "UPDATE servicos
        SET nome_do_servico = '$this->nome_servico',
            descricao_do_servico = '$this->descricao_servico',
            data_do_servico = '$this->data_servico',
            hora_do_servico = '$this->hora_servico',
            local_do_servico = '$this->local_servico',
            responsavel_servico = '$this->responsaveis_servico',
            materiais_utilizados = '$this->materiais_utilizados',
            status_do_servico = '$this->status_servico',
            dad = '$this->dad'
        WHERE id = $id_servico";;
        
        if (mysqli_query($conn, $sql)) {
            return "Atualizado com sucesso!";
        } else {
            return 'Erro na atualização: ' . mysqli_error($conn);
        }
    }

    
    public function excluir($id_servico){
        include "../config/conexao.php";
        $sql = "DELETE FROM servicos WHERE id = $id_servico";
        
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    }


    public function concluir($id_servico){
        include "config/conexao.php";

        $sql= "UPDATE servicos set status_do_servico = '$this->status_servico',
        dad = '$this->dad'
    WHERE id = $id_servico";
     if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
    }
    
}
?>