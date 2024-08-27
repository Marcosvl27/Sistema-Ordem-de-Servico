<?php

class Funcionario{

    private $nome_usuario;
    private $departamento;
    private $cargo;
    private $telefone;
    private $email;
    private $senha;
    private $cpf;


public function setnome_usuario($nome_usuario){
    $this->nome_usuario= $nome_usuario;
}

public function getnome_usuario(){
    return  $this->nome_usuario;
}

public function setdepartamento($departamento){
    $this->departamento = $departamento;
}

public function getdepartamento(){
    return $this->departamento;
}
public function setcargo($cargo){
    $this->cargo = $cargo;
}

public function getcargo(){
    return $this->cargo;
}
public function settelefone($telefone){
    $this->telefone = $telefone;
}

public function gettelefone(){
    return $this->telefone;
}
public function setemail($email){
    $this->email = $email;
}

public function getemail(){
    return $this-> email;
}
public function setsenha($senha){
    $this->senha = $senha;
}

public function getsenha(){
    return $this->senha;
}
public function setcpf($cpf){
    $this->cpf = $cpf;
}

public function getcpf(){
    return $this->cpf;
}


public function inserir(){

    include "config/conexao.php";

    $sql = "INSERT INTO `funcionario`(`nome_usuario`, `senha`, `email`, `telefone`, 
    `cargo`, `departamento`, `cpf`) VALUES ('$this->nome_usuario','$this->senha','$this->email','$this->telefone','$this->cargo',
    '$this->departamento', '$this->cpf')";
  
  if (mysqli_query($conn,$sql)){
    return"gravado com sucesso!";
}else {
    return'erro na tabela produtos'.$sql;
}

}

}


?>