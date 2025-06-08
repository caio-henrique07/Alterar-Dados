<?php
include "util.php";
$conn = conecta();

$sql = "INSERT INTO alunos (nome, sexo, celular, matricula, email, turma)
        VALUES (:nome, :sexo, :celular, :matricula, :email, :turma)";

$insert = $conn->prepare($sql);

$insert->bindParam(':nome', $_POST['nome']);
$insert->bindParam(':sexo', $_POST['sexo']);
$insert->bindParam(':celular', $_POST['celular']);
$insert->bindParam(':matricula', $_POST['matricula']);
$insert->bindParam(':email', $_POST['email']);
$insert->bindParam(':turma', $_POST['turma']);

try {
    $insert->execute();
    header("Location: alunos.php");
    exit;
} catch (PDOException $e) {
    echo "Erro ao inserir aluno: " . $e->getMessage();
    exit;
}
?>
