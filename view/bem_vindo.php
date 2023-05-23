<?php
  require_once("../controle/login.php");
  testa_login();
  require("cabecalho.php");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <title>Home</title>
</head>
<body>
  <div id="listarCentro">
    <div class="text-center mt-4 mb-5">
      <?php echo "<h2>Seja Bem vindo $_SESSION[nome]</h2>";?>
      <p>Ao seu sistema de gerenciamento da livraria.</p>
      <hr class="linha">
    </div>

    <div class="container">
      <ul class="list-group list-group-flush">
        <button type="button" class="list-group-item list-group-item-action active text-center">
          <h4 class="mt-2">Avisos sobre o Sistema:</h4>
        </button>
        <li class="list-group-item">
          Para efetuar cadastros é preciso preencher todos os dados sem exceção, 
          caso digite algo errado é possivel alterar indo na listagem que escreveu algo errado clicar em alterar.
        </li>

        <li class="list-group-item">
          Para cadastrar um novo tema, autor e editora é preciso selecionar "Cadastrar novo" dentre as opções do qual você deseja auterar, 
          os campos necessários para preenchimento iram surgir, continue o resto do cadastro normalmente e quando finalizado o novo item será adicionado para escolha.
        </li>

        <li class="list-group-item">
          Relatorios de dias, meses e anos que tiveram apenas uma ou nenhum venda irão retornar um alerta de "Não existem dados na tabela".
        </li>

        <li class="list-group-item">
          A tela de vendas <strong>não vai exibir o desconto</strong>, isso é exibido logo acima da opção de escolha de método de pagamento na página de confirmação da verda.
        </li>

        <li class="list-group-item"></li>
      </ul>
    </div>
  </div>
</body>