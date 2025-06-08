<?php
    include "util.php";
    $conn = conecta();

    if (!isset($_GET['id']) || empty($_GET['id'])) {
        echo "<p>ID do aluno não informado.</p>";
        echo '<p><a href="alunos.php">Voltar</a></p>';
        exit;
    }

    $id = (int) $_GET['id'];

    // Verifica se aluno existe (opcional, mas recomendado)
    $sql = "SELECT nome FROM alunos WHERE id = $id";
    $aluno = $conn->query($sql)->fetch();

    if (!$aluno) {
        echo "<p>Aluno não encontrado.</p>";
        echo '<p><a href="alunos.php">Voltar</a></p>';
        exit;
    }
?>

<script>
    if (confirm("Deseja realmente excluir o(a) aluno(a) '<?php echo addslashes($aluno['nome']); ?>'?")) {
        window.location.href = "/php/excluirAlunos.php?id=<?php echo $id; ?>";
    } else {
        window.location.href = "/php/alunos.php";
    }
</script>
