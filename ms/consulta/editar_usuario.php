
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
</head>
<body>

<div class="container mt-5">
    <h2>Editar Usuário</h2>
    
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $usuario['nome_usuario']; ?>">
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $usuario['cpf']; ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $usuario['email']; ?>">
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $usuario['telefone']; ?>">
        </div>
        <div class="mb-3">
            <label for="departamento" class="form-label">departamento</label>
            <input type="text" class="form-control" id="departamento" name="departamento" value="<?php echo $usuario['departamento']; ?>">
        </div>
        <div class="mb-3">
            <label for="cargo" class="form-label">cargo</label>
            <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo $usuario['cargo']; ?>">
        </div>
        
        <!-- Adicione aqui os outros campos de edição (CPF, Email, Telefone, Departamento, Cargo, etc.) -->
        
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

</body>
</html>
