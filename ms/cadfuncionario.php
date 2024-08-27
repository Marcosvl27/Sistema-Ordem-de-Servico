<?php 

$nome_usuario = $_POST["nome_usuario"];

$cpf = $_POST["cpf"];

$telefone = $_POST["telefone"];

$departamento = $_POST["departamento"];

$cargo = $_POST["cargo"];

$email = $_POST["email"];

$senha = $_POST["seha"];


include "../ms/tabelas/funcionario.php";

$Funcionario = new Funcionario;


$Funcionario->setnome_usuario($nome_usuario);

$Funcionario->setcpf($cpf);

$Funcionario->settelefone($telefone);

$Funcionario->setdepartamento($departamento);

$Funcionario->setcargo($cargo);

$Funcionario->setemail($email);

$Funcionario->setsenha($senha);

$Funcionario->inserir();


?>


