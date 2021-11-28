<?php
require_once 'init.php';
// pega o ID da URL
$idJogo = isset($_GET['idJogo']) ? $_GET['idJogo'] : null;
// valida o ID
if (empty($idJogo))
{
    echo "ID do Jogo não informado";
    exit;
}
// remove do banco
$PDO = db_connect();
$sql = "DELETE FROM jogos WHERE idJogo = :idJogo";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':idJogo', $idJogo, PDO::PARAM_INT);
if ($stmt->execute())
{
    header('Location: telaInicial.php');
}
else
{
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}