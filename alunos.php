<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2 class="titulo">Lista de Alunos</h2>

    <table class="tabela-alunos">
        <tr>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Celular</th>
            <th>Matrícula</th>
            <th>Email</th>
            <th>Turma</th>
            <th></th>
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
                echo "<td><a href='alterarAlunos.php?id={$linha['id']}' class='botao-azul'>Alterar</a></td>";
                echo "</tr>";
            }
        ?>
    </table>

</body>
</html>