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
        <br>
        <?php if ($total > 0) : ?>
            <?php while ($jogos = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                <div class="row">
                    <div class="col-sm-4">
                        <img class="imgJogo" width="350px" height="550px" src="<?php echo $jogos['bannerJogo'] ?>">
                    </div>
                    <div class="col-sm-8">
                        <p>
                        <h1 class="titulo"><?php echo htmlspecialchars($jogos['nomeJogo']) ?></h1>
                        </p>
                        <br>
                        <div class="row">
                            <div class="col-sm-5">
                                <p class="tituloJogos">Desenvolvedora:</p>
                                <p class="conteudoTxt">
                                    <?php echo htmlspecialchars($jogos['desenvolvedora']) ?>
                                </p>
                            </div>
                            <div class="col-sm-5">
                                <p class="tituloJogos">Gênero:</p>
                                <p class="conteudoTxt">
                                    <?php echo htmlspecialchars($jogos['genero']) ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <p class="tituloJogos">Preço:</p>
                                <p class="conteudoTxt">
                                    <?php echo htmlspecialchars($jogos['preco']) ?>
                                </p>
                            </div>
                            <div class="col-sm-5">
                                <p class="tituloJogos">Data de Lançamento:</p>
                                <p class="conteudoTxt">
                                    <?php echo dateConvert($jogos['dtLancamento']) ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <p class="tituloJogos">Especificações Mínimas:</p>
                                <p class="conteudoTxt">
                                    <?php echo htmlspecialchars($jogos['especsMin']) ?>
                                </p>
                            </div>
                            <div class="col-sm-5">
                                <p class="tituloJogos">Especificações Recomendadas:</p>
                                <p class="conteudoTxt">
                                    <?php echo htmlspecialchars($jogos['especsRec']) ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <p class="tituloJogos">Plataforma(s):</p>
                                <p class="conteudoTxt">
                                    <?php echo htmlspecialchars($jogos['plataforma']) ?>
                                </p>
                            </div>
                            <div class="col-sm-5">
                                <a class="btn btn-info" id="btnEditar" href="form-edit.php?idJogo=<?php echo $jogos['idJogo'] ?>">Editar</a>
                                <br><br>
                                <a class="btn btn-danger" id="btnRemover" href="delete.php?idJogo=<?php echo $jogos['idJogo'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">
                                    Remover
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br>
            <?php endwhile; ?>
            </tbody>
            </table>
        <?php else : ?>
            <p>Nenhum jogo cadastrado</p>
        <?php endif; ?>
        <br><br>
        <p><a class="btn btn-success" role="button" href="form-add.php">Adicionar Jogo</a></p>
    </div>
</body>

</html>