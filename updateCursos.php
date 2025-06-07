<?php
    include "util.php";
    $conn = conecta();

    $sql = "UPDATE alunos SET 
                nome = :nome, sexo = :sexo, celular = :celular, 
                matricula = :matricula, email = :email, turma = :turma
            WHERE id = :id";

    $update = $conn->prepare($sql);

    $update->bindParam(':nome', $_POST['nome']);
    $update->bindParam(':sexo', $_POST['sexo']);
    $update->bindParam(':celular', $_POST['celular']);
    $update->bindParam(':matricula', $_POST['matricula']);
    $update->bindParam(':email', $_POST['email']);
    $update->bindParam(':turma', $_POST['turma']);
    $update->bindParam(':id', $_POST['id']);

    try {
        $update->execute();
        header("Location: alunos.php");
        exit;
    } catch (PDOException $e) {
        echo "Erro ao atualizar aluno: " . $e->getMessage();
        exit;
    }
?>
