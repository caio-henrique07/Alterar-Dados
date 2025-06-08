<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Adicionar Aluno</title>
    <link rel="stylesheet" href="/css/style-form.css">
</head>
<body>
    <div class="container">
        <h1>Adicionar Aluno</h1>
        <form action="insertCursos.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label>Sexo:</label>
            <div class="radio-group">
                <input type="radio" id="masculino" name="sexo" value="Masculino" required>
                <label for="masculino">Masculino</label>
                <input type="radio" id="feminino" name="sexo" value="Feminino" required>
                <label for="feminino">Feminino</label>
            </div>

            <label for="celular">Celular:</label>
            <input type="text" id="celular" name="celular" required>

            <label for="matricula">Matrícula:</label>
            <input type="text" id="matricula" name="matricula" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="turma">Turma:</label>
            <select id="turma" name="turma" required>
                <option value="INI2A" selected>INI2A</option>
                <option value="INI2B">INI2B</option>
                <option value="INI2">INI2</option>
            </select>

            <input type="submit" value="Cadastrar" class="btn btn-cadastrar">
        </form>
        <a href="/php/alunos.php" class="link-voltar">Voltar para lista</a>
    </div>
</body>
</html>
