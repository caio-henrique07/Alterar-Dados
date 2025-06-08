<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Alterar Alunos</title>
    <link rel="stylesheet" href="/css/style-form.css">
    <link rel="stylesheet" href="/css/style-error.css">
</head>
<body>
    <?php
        include "util.php";
        $conn = conecta();

        if (!isset($_GET['id']) || empty($_GET['id'])) {
            echo '<div id="error-message">
                    ID do aluno não informado.
                    <br><br>
                    <a href="alunos.php">Voltar para lista</a>
                </div>';
            exit;
        }

        $id = (int) $_GET['id'];

        // Busca o aluno
        $sql = "SELECT * FROM alunos WHERE id = :id";
        $select = $conn->prepare($sql);
        $select->bindParam(':id', $id);
        $select->execute();
        $linha = $select->fetch(PDO::FETCH_ASSOC);

        // Se não encontrou, mostra mensagem e sai
        if (!$linha) {
            echo '<div id="error-message">
                    Aluno não encontrado.
                    <br><br>
                    <a href="alunos.php">Voltar para lista</a>
                </div>';
            exit;
        }

        // Se encontrou, pega os dados
        $nome = $linha['nome'];
        $sexo = $linha['sexo'];
        $celular = $linha['celular'];
        $matricula = $linha['matricula'];
        $email = $linha['email'];
        $turma = $linha['turma'];

        $turmaOpcao1 = ($turma == 'INI2A') ? 'selected' : '';
        $turmaOpcao2 = ($turma == 'INI2B') ? 'selected' : '';
        $turmaOpcao3 = ($turma == 'INI2') ? 'selected' : '';
    ?>

    <div class="container">
        <h1>Alterar Aluno</h1>
        <form action="updateCursos.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required>

            <label>Sexo:</label>
            <div class="radio-group">
                <input type="radio" id="masculino" name="sexo" value="Masculino" <?php if ($sexo == 'Masculino') echo 'checked'; ?> required>
                <label for="masculino">Masculino</label>
                <input type="radio" id="feminino" name="sexo" value="Feminino" <?php if ($sexo == 'Feminino') echo 'checked'; ?> required>
                <label for="feminino">Feminino</label>
            </div>

            <label for="celular">Celular:</label>
            <input type="text" id="celular" name="celular" value="<?php echo $celular; ?>" required>

            <label for="matricula">Matrícula:</label>
            <input type="text" id="matricula" name="matricula" value="<?php echo $matricula; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

            <label for="turma">Turma:</label>
            <select id="turma" name="turma" required>
                <option value="INI2A" <?php echo $turmaOpcao1; ?>>INI2A</option>
                <option value="INI2B" <?php echo $turmaOpcao2; ?>>INI2B</option>
                <option value="INI2" <?php echo $turmaOpcao3; ?>>INI2</option>
            </select>

            <input type="submit" value="Salvar Alterações" class="btn">
        </form>
        <a href="/php/alunos.php" class="link-voltar">Voltar para lista</a>
    </div>
</body>
</html>
