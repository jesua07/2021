<?php
require_once 'init.php';
// abre a conexão
$PDO = db_connect();

// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), 
// mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
$sql_count = "SELECT COUNT(*) AS total FROM jogos ORDER BY nomeJogo ASC";

// SQL para selecionar os registros
$sql = "SELECT * "
    . "FROM jogos ORDER BY nomeJogo ASC";

// conta o total de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Sistema de Cadastro de Jogos</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="/imagens/ETEC.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="index.html">
            <h1 class="textoEtecNavbar">ETEC GAMES</h1>
        </a>
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="telaInicial.php">CADASTRO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sobrenos.html">SOBRE NÓS</a>
            </li>
        </ul>
    </nav>
    <br><br>
    <div class="container">
        <div class="page-header">
            <h1>Sistema de Cadastro de Jogos</h1>
            <hr>
        </div>
        <h2 class="titulo">Lista de Jogos</h2>
        <p>Total de Jogos: <?php echo $total ?></p>
        <?php if ($total > 0) : ?>
            <div class="shadow p-3 mb-5 bg-white rounded">
                <table class="tabelaVerdinha">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Desenvolvedora</th>
                            <th>Gênero</th>
                            <th>Preço</th>
                            <th>Data de lançamento</th>
                            <th>Plataforma</th>
                            <th>Especificações minimas</th>
                            <th>Especificações recomendadas</th>
                            <th>Ajustes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($jogos = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                            <tr>
                                <td><?php echo $jogos['nomeJogo'] ?></td>
                                <td><?php echo $jogos['desenvolvedora'] ?></td>
                                <td><?php echo $jogos['genero'] ?></td>
                                <td><?php echo $jogos['preco'] ?></td>
                                <td><?php echo dateConvert($jogos['dtLancamento']) ?></td>
                                <td><?php echo $jogos['plataforma'] ?></td>
                                <div class="max-width">
                                    <td><?php echo $jogos['especsMin'] ?></td>
                                    <td><?php echo $jogos['especsRec'] ?></td>
                                </div>
                                <td align="right">
                                    <a class="btn btn-info" href="form-edit.php?idJogo=<?php echo $jogos['idJogo'] ?>">Editar</a>
                                    <br><br>
                                    <a class="btn btn-danger" href="delete.php?idJogo=<?php echo $jogos['idJogo'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">
                                        Remover
                                    </a>
                                </td>

                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>Nenhum jogo cadastrado</p>
            <?php endif; ?>
            </div>
            <p><a class="btn btn-success" role="button" href="form-add.php">Adicionar Jogo</a></p>
</body>

</html>