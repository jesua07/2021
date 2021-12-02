<?php
require_once 'init.php';

// pega os dados do formuário
$idJogo = isset($_POST['idJogo']) ? $_POST['idJogo'] : null;
$bannerJogo = isset($_POST['bannerJogo']) ? $_POST['bannerJogo'] : null;
$nomeJogo = isset($_POST['nomeJogo']) ? $_POST['nomeJogo'] : null;
$dtLancamento = isset($_POST['dtLancamento']) ? $_POST['dtLancamento'] : null;
$desenvolvedora = isset($_POST['desenvolvedora']) ? $_POST['desenvolvedora'] : null;
$genero = isset($_POST['genero']) ? $_POST['genero'] : null;
$preco = isset($_POST['preco']) ? $_POST['preco'] : null;
$especsMin = isset($_POST['especsMin']) ? $_POST['especsMin'] : null;
$especsRec = isset($_POST['especsRec']) ? $_POST['especsRec'] : null;
$plataforma = isset($_POST['plataforma']) ? $_POST['plataforma'] : null;

// validação (bem simples, só pra evitar dados vazios)
if (empty($nomeJogo) || empty($bannerJogo) || empty($dtLancamento) || empty($desenvolvedora) || empty($genero) || empty($preco) || empty($especsMin) || empty($especsRec) || empty($plataforma)) {
    echo "Volte e preencha todos os campos";
    exit;
}

// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO jogos(nomeJogo, bannerJogo, desenvolvedora, genero, preco, dtLancamento, plataforma, especsMin, especsRec) VALUES(:nomeJogo, :bannerJogo, :desenvolvedora, :genero, :preco, :dtLancamento, :plataforma, :especsMin, :especsRec)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nomeJogo', $nomeJogo);
$stmt->bindParam(':bannerJogo', $bannerJogo);
$stmt->bindParam(':desenvolvedora', $desenvolvedora);
$stmt->bindParam(':genero', $genero);
$stmt->bindParam(':preco', $preco);
$stmt->bindParam(':dtLancamento', $dtLancamento);
$stmt->bindParam(':plataforma', $plataforma);
$stmt->bindParam(':especsMin', $especsMin);
$stmt->bindParam(':especsRec', $especsRec);

if ($stmt->execute()) {
    header('Location: telaInicial.php');
} else {
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
