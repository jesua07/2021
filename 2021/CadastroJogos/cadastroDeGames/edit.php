<?php
require_once 'init.php';
// resgata os valores do formulário
$idJogo = isset($_POST['idJogo']) ? $_POST['idJogo'] : null;
$nomeJogo = isset($_POST['nomeJogo']) ? $_POST['nomeJogo'] : null;
$bannerJogo = isset($_POST['bannerJogo']) ? $_POST['bannerJogo'] : null;
$dtLancamento = isset($_POST['dtLancamento']) ? $_POST['dtLancamento'] : null;
$desenvolvedora = isset($_POST['desenvolvedora']) ? $_POST['desenvolvedora'] : null;
$genero = isset($_POST['genero']) ? $_POST['genero'] : null;
$preco = isset($_POST['preco']) ? $_POST['preco'] : null;
$especsMin = isset($_POST['especsMin']) ? $_POST['especsMin'] : null;
$especsRec = isset($_POST['especsRec']) ? $_POST['especsRec'] : null;
$plataforma = isset($_POST['plataforma']) ? $_POST['plataforma'] : null;
// validação (bem simples, mais uma vez)
if (empty($nomeJogo) || empty($bannerJogo) || empty($dtLancamento) || empty($desenvolvedora) || empty($genero) || empty($preco) || empty($especsMin) || empty($especsRec) || empty($plataforma)) {
    echo "Volte e preencha todos os campos";
    exit;
}

// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE jogos SET nomeJogo = :nomeJogo, bannerJogo = :bannerJogo, dtLancamento = :dtLancamento,"
    . " desenvolvedora = :desenvolvedora, genero = :genero," .  "preco = :preco, especsMin = :especsMin, especsRec = :especsRec, plataforma = :plataforma WHERE idJogo = :idJogo";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nomeJogo', $nomeJogo);
$stmt->bindParam(':bannerJogo', $bannerJogo);
$stmt->bindParam(':dtLancamento', $dtLancamento);
$stmt->bindParam(':desenvolvedora', $desenvolvedora);
$stmt->bindParam(':genero', $genero);
$stmt->bindParam(':preco', $preco);
$stmt->bindParam(':especsMin', $especsMin);
$stmt->bindParam(':especsRec', $especsRec);
$stmt->bindParam(':plataforma', $plataforma);
$stmt->bindParam(':idJogo', $idJogo, PDO::PARAM_INT);
if ($stmt->execute()) {
    header('Location: telaInicial.php');
} else {
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}
