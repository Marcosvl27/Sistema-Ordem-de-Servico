<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de funcionario</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<body>
<button onclick='voltar()'>Voltar</button>
<form method="POST" action="cadfuncionario.php">
    
<label class="form-control form-control-lg" for="">Nome do usuário
    <input type="text" name="nome_usuario"  class="form-control form-control-lg" id="inputZip" required id=""> 
</div>

CPF do funcionario
    <input type="number" name="cpf" class="form-control form-control-lg" id="inputZip" required id="">
</div> 
<div class="mb-11">

 Contato do funcionario
    <input type="number" name="telefone" class="form-control form-control-lg" id="inputZip" required id="">
</div>
<div class="mb-11">

 Departamento do funcionario
    <input type="text" name="departamento" class="form-control form-control-lg" id="inputZip" required id="">
</div>
<div class="mb-11">

Cargo do funcionário
    <input type="text" name="cargo" class="form-control form-control-lg" id="inputZip" required id="">
</div>

<div class="mb-11">
 Email do funcionário
    <input type="email" name="email" class="form-control form-control-lg" id="inputZip" required id="">
</div>
<div class="mb-11">

<div class="mb-11">
 Senha do funcionário
    <input type="password" name="seha" class="form-control form-control-lg" id="inputZip" required id="">
</div>
<div class="mb-11">


<input type="submit" class="btn btn-primary mb-3" class="form-control form-control-lg" id="inputZip" value="Gravar">



</form>


</body>
</html>

<style>
    body{
        background-color: black;
    }
</style>

<script>
    function voltar(){
        window.location.href = "http://localhost/ms/painel.php";
    }
</script>