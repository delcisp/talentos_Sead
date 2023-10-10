<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
    @vite([ 'resources/sass/app.scss','resources/js/app.js'])
    @vite(['resources/css/error.css'])
    <link rel="stylesheet" href="WAIDT/style.css">
 </head>
<body>
    <div class="container">
        <img src="images/logo_gov_azul.png" alt="Imagem" class="imagem">
        <h1>Olá, servidor(a)!</h1>
    <p>Bem-vindo ao nosso Banco de Talentos! Este é o lugar onde você pode mostrar seu potencial
         e habilidades para futuras oportunidades. É fácil e simples - basta preencher este formulário atentamente e todos os campos obrigatórios.
          Lembre-se de usar seu login corporativo/institucional (@sead.am.br).
           Estamos ansiosos para conhecer mais sobre você e suas habilidades! </p>
        <button class="logout-button" onclick="window.location.href='lgpd'">Próximo</button>
    </div>
    
</body>
</html>