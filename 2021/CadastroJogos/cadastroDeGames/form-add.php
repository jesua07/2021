<?php
require 'init.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Jogo</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="index.html"><h1 class="textoEtecNavbar">ETEC GAMES</h1></a>
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
        <h1>Sistema de cadastro de Jogos</h1>
        <hr>
        </div>
        <h2 class="titulo">Cadastro de Jogo</h2>
        <br><br>
        <form action="add.php" method="post">
            <div class="row">
                <div class="form-group">
                <div class="col">
            <label for="nomeJogo">Nome: </label>
            <br>
            <input type="text" class="form-control" size="35" name="nomeJogo" id="nomeJogo">
            <br><br>
            </div>
            </div>
            <div class="form-group">
                <div class="col">
                <label for="desenvolvedora">Desenvolvedora: </label>
            <br>
            <input type="text" class="form-control" size="35" name="desenvolvedora" id="desenvolvedora">
            <br><br>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
            <div class="col">
            <label for="genero">Gênero: </label>
            <br>
            <input type="text" class="form-control" size="35" name="genero" id="genero">
            <br><br>
            </div>
            </div>
            <div class="form-group">
            <div class="col">
            <label for="preco">Preço: </label>
            <br>
            <input type="text" class="form-control" size="35" name="preco" id="preco" placeholder="R$00,00">
            <br><br>
            </div>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
            <div class="col">
            <label for="dtLancamento">Data de Lançamento: </label>
            <br>
            <input type="text" class="form-control" size="35" name="dtLancamento" id="dtLancamento" placeholder="dd/mm/YYYY">
            <br><br>
            </div>
            </div>
            <div class="form-group">
            <div class="col">
            <label for="plataforma">Plataformas: </label>
            <br>
            <input type="text" class="form-control" size="35" name="plataforma" id="plataforma">
            <br><br>
            </div>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
            <div class="col">
            <label for="especsMin">Especs. Mínimas: </label>
            <br>
            <input type="text" class="form-control" size="35" name="especsMin" id="especsMin">
            <br><br>
            </div>
            </div>
            <div class="form-group">
            <div class="col">
            <label for="especsRec">Especs. Recomendadas: </label>
            <br>
            <input type="text" class="form-control" size="35" name="especsRec" id="especsRec">
            <br><br>
            </div>
            </div>
            </div>
            <div class="row">
            <div class="form-group">
            <div class="col">
            <input type="submit" class="btn btn-primary"value="Cadastrar">
            </div>
            </div>
            <div class="form-group">
            <div class="col">
            <input type="hidden" name="idJogo">
            </div>
            </div>
            </div>
        </form>
     
    </body>
</html>
