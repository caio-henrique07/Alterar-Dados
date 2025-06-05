<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        include "util.php";
        $conn = conecta();
        $id = $_GET['id']; // recupera o id
        $varSQL = "SELECT * FROM alunos WHERE id = :id";
        $select = $conn->prepare($varSQL);
        $select->bindParam(':id', $id);
        $select->execute();
        $linha = $select->fetch(); // não tem while, é 1 linha

        try {
            $select->execute();
            header("Location: alunos.php");
            exit;
        } catch (PDOException $e) {
            echo "Erro ao alterar dados do aluno: " . $e->getMessage();
            exit;
        }

        $id = $linha['id'];
        $nome = $linha['nome'];
        $celular = $linha['celular'];
        $email = $linha['email'];
        $turma = $linha['turma'];
        $sexo = $linha['sexo'];
        $matricula = $linha['matricula'];
    ?>

    <form action="updateCursos.php" method="post">
        <input type='hidden' name='id' value='<?php echo $id; ?>'>
        Nome<br>
        <input type='text' name='nome'
            value='<?php echo $nome ?>'>
        Celular<br>
        <input type='numeric' name=''
            value='<?php echo $nome ?>'>
        Email<br>
        <input type='text' name='nome'
            value='<?php echo $nome ?>'>
        Turma<br>
        <input type='text' name='nome'
            value='<?php echo $nome ?>'>
        Sexo<br>
        <input type='text' name='nome'
            value='<?php echo $nome ?>'>
        Matricula<br>
        <input type='text' name='nome'
            value='<?php echo $nome ?>'>
                
        
    </form>
</body>

</html>