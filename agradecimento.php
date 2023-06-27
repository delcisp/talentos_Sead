<?php
$firstname = isset($_GET['firstname']) ? $_GET['firstname'] : 'Usuário';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agradecimento</title>
  <link rel="stylesheet" href="./Obrigado/agradecimento.css">
</head>
<body>
  <div class="container">
    <img src="./Imagens/logo_gov_azul.png" alt="Imagem" class="imagem">
    <h1>Obrigado, <?php echo $firstname; ?>!</h1>
    <p>Agradecemos sinceramente por sua participação no nosso formulário. Seu feedback é extremamente valioso para nós. Obrigado por fazer parte do nosso processo de aprimoramento.</p>
    <button class="logout-button" onclick="redirectLogin()">Sair</button>
  </div>
</body>
<script src="./Obrigado/agradecimento.js"></script>
</html>
