<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2 align="center">Lista de Alunos</h2>

    <table border="1" align="center" cellpadding="5" cellspacing="0">
        <tr>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Celular</th>
            <th>Matrícula</th>
            <th>Email</th>
            <th>Turma</th>
        </tr>

        <?php
            include 'util.php';
            $conn = conecta();
            $sql = "SELECT * FROM alunos";
            $resultado = $conn->query($sql);

            while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>{$linha['nome']}</td>";
                echo "<td>{$linha['sexo']}</td>";
                echo "<td>{$linha['celular']}</td>";
                echo "<td>" . (!empty($linha['matricula']) ? $linha['matricula'] : '-') . "</td>";
                echo "<td>{$linha['email']}</td>";
                echo "<td>" . (!empty($linha['turma']) ? $linha['turma'] : '-') . "</td>";
                echo "</tr>";
            }
        ?>
    </table>

    <div align="center" style="margin-top: 20px;">
        <a href="alterarAlunos.php">Alterar</a>
    </div>

</body>
</html>
