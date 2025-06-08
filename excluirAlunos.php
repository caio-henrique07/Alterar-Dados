<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Excluir Alunos</title>
    <link rel="stylesheet" href="style-alterar.css">
</head>
<body>
    <div class="container">
        <?php
            include "util.php";
            $conn = conecta();
            $id = $_GET['id'];
            $varSQL = "DELETE FROM alunos WHERE id = :id";
            $delete = $conn->prepare($varSQL);
            $delete->bindParam(':id', $id);
            $delete->execute();
        ?>
        <p class="mensagem-sucesso">Aluno excluído com sucesso.</p>
        <a href="alunos.php" class="link-voltar">Voltar para a lista de alunos</a>
    </div>
</body>
</html>
