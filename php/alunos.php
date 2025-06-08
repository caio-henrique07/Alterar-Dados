<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="/css/style.css">
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
                echo "<td>
                    <a href='/php/alterarAlunos.php?id={$linha['id']}' class='botao-alterar'>Alterar</a>
                    <a href='/php/confirmacaoExclusao.php?id={$linha['id']}' class='botao-excluir'>Excluir</a>
                </td>";
                echo "</tr>";
            }
        ?>
    </table>

    <div class="botao-container">
        <a href="/php/adicionarAlunos.php" class="botao-adicionar">Adicionar</a>
    </div>

</body>
</html>