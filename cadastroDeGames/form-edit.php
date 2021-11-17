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
$sql = "SELECT nomeJogo, dtLancamento, desenvolvedora, genero, preco, especsMin, especsRec, plataforma FROM jogos WHERE idJogo = :idJogo";
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
    </head>
    <body>
        <h1>Sistema de cadastro de Jogos</h1>
        <h2>Edição de Jogo</h2>
        <form action="edit.php" method="post">
            <label for="nomeJogo">Nome: </label>
            <br>
            <input type="text" name="nomeJogo" id="nomeJogo" value="<?php echo $jogos['nomeJogo'] ?>">
            <br><br>
            <label for="dtLancamento">Data de Lançamento: </label>
            <br>
            <input type="text" name="dtLancamento" id="dtLancamento" placeholder="dd/mm/YYYY"
            value="<?php echo dateConvert($jogos['dtLancamento']) ?>">
            <br><br>
            <label for="desenvolvedora">Desenvolvedora: </label>
            <br>
            <input type="text" name="desenvolvedora" id="desenvolvedora"  
                   value="<?php echo $jogos['desenvolvedora'] ?>">
            <br><br>
            <label for="genero">Gênero: </label>
            <br>
            <input type="text" name="genero" id="genero"  
                   value="<?php echo $jogos['genero'] ?>">
            <br><br>
            <label for="preco">Preço: </label>
            <br>
            <input type="text" name="preco" id="preco"  
                   value="<?php echo $jogos['preco'] ?>">
            <br><br>
            <label for="especsMin">Especificações Mínimas: </label>
            <br>
            <input type="text" name="especsMin" id="especsMin"  
                   value="<?php echo $jogos['especsMin'] ?>">
            <br><br>
            <label for="especsRec">Especificações Recomendadas: </label>
            <br>
            <input type="text" name="especsRec" id="especsRec"  
                   value="<?php echo $jogos['especsRec'] ?>">
            <br><br>
            <label for="plataforma">Plataformas: </label>
            <br>
            <input type="text" name="plataforma" id="plataforma"  
                   value="<?php echo $jogos['plataforma'] ?>">
            <br><br>
            <input type="hidden" name="idJogo" value="<?php echo $idJogo ?>">
            <input type="submit" value="Alterar">
        </form>
    </body>
</html>