<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agradecimento</title>
  @vite([ 'resources/sass/app.scss','resources/js/app.js'])
    @vite(['resources/css/error.css'])
  <link rel="icon" href="images/icon_sead.ico" type="image/ico">
</head>
<body>
  <div class="container">
    <img src="images/logo_gov_azul.png" alt="Imagem" class="imagem">
    <h1>Obrigado, {{ $firstname }}!</h1>
    <p>Agradecemos sinceramente por sua participação no nosso formulário. Seu feedback é extremamente valioso para nós. Obrigado por fazer parte do nosso processo de aprimoramento.</p>
    <button class="logout-button" onclick="redirectLogin()">Sair</button>
  </div>
</body>
<script src="./Obrigado/agradecimento.js"></script>
</html>
