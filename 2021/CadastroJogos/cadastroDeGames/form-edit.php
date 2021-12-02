<?php
require 'init.php';
// pega o ID da URL
$idJogo = isset($_GET['idJogo']) ? (int) $_GET['idJogo'] : null;
// valida o ID
if (empty($idJogo)) {
    echo "ID para alteração não definido";
    exit;
}
// busca os dados do usuário a ser editado
$PDO = db_connect();
$sql = "SELECT nomeJogo, bannerJogo ,dtLancamento, desenvolvedora, genero, preco, especsMin, especsRec, plataforma FROM jogos WHERE idJogo = :idJogo";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':idJogo', $idJogo, PDO::PARAM_INT);
$stmt->execute();
$jogos = $stmt->fetch(PDO::FETCH_ASSOC);
// se o método fetch() não retornar um array, significa que o ID não corresponde 
// a um usuário válido
if (!is_array($jogos)) {
    echo "Nenhum usuário encontrado";
    exit;
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Edição de Jogo</title>
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
        <h2 class="titulo">Edição de Jogo</h2>
        <br><br>
        <form action="edit.php" method="post">
            <div class="row">
                <div class="form-group">
                    <div class="col">
                        <label for="nomeJogo">Nome: </label>
                        <br>
                        <input type="text" class="form-control" size="35" name="nomeJogo" id="nomeJogo" value="<?php echo $jogos['nomeJogo'] ?>">
                        <br><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col">
                        <label for="desenvolvedora">Desenvolvedora: </label>
                        <br>
                        <input type="text" class="form-control" size="35" name="desenvolvedora" id="desenvolvedora" value="<?php echo $jogos['desenvolvedora'] ?>">
                        <br><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col">
                        <label for="genero">Gênero: </label>
                        <br>
                        <input type="text" class="form-control" size="35" name="genero" id="genero" value="<?php echo $jogos['genero'] ?>">
                        <br><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col">
                        <label for="preco">Preço: </label>
                        <br>
                        <input type="text" class="form-control" size="35" name="preco" id="preco" placeholder="R$00,00" value="<?php echo $jogos['preco'] ?>">
                        <br><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col">
                        <label for="dtLancamento">Data de Lançamento: </label>
                        <br>
                        <input type="date" class="form-control" size="35" name="dtLancamento" id="dtLancamento" placeholder="dd/mm/YYYY" value="<?php echo $jogos['dtLancamento'] ?>">
                        <br><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col">
                        <label for="plataforma">Plataformas: </label>
                        <br>
                        <input type="text" class="form-control" size="35" name="plataforma" id="plataforma" value="<?php echo $jogos['plataforma'] ?>">
                        <br><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col">
                        <label for="especsMin">Especs. Mínimas: </label>
                        <br>
                        <input type="text" class="form-control" size="35" name="especsMin" id="especsMin" value="<?php echo $jogos['especsMin'] ?>">
                        <br><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col">
                        <label for="especsRec">Especs. Recomendadas: </label>
                        <br>
                        <input type="text" class="form-control" size="35" name="especsRec" id="especsRec" value="<?php echo $jogos['especsRec'] ?>">
                        <br><br>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="form-group">
                    <div class="col">
                        <label for="bannerJogo">Imagem do Jogo: </label>
                        <br>
                        <input type="text" class="form-control" size="35" name="bannerJogo" id="bannerJogo" value="<?php echo $jogos['bannerJogo'] ?>">
                    </div>
                </div>
                <div class="col">
                    <label for="btnAlterar"> </label>
                    <br>
                    <input type="submit" id="btnAlterar" class="btn btn-primary" value="Alterar">
                </div>
            </div>
    </div>

    <input type="hidden" class="form-control" size="35" name="idJogo" value="<?php echo $idJogo ?>">
    </form>
</body>

</html>