<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de login</title>
  <link rel="stylesheet" href="./Login/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>
<body>
  <header>
  <action="lgpd.php" method="get" novalidate>
        <nav class="menu">
      <div class="menu-item">
        <img src="./Imagens/logo_gestao.png" alt="Imagem 1">
      </div>
      <div class="menu-item">
        <img src="./Imagens/sead.png" alt="Imagem 2">
      </div>
      <div class="menu-item">
        <img src="./Imagens/logo_gov.png" alt="Imagem 3">
      </div>
    </nav>
  </header>
  <div class="container">
    <div class="wrapper">
      <div class="title"><span>Gestão de competências</span></div>
      <form action="lgpd.php" method="POST">
        <div class="row">
          <i class="fas fa-user"></i>
          <input id="username" name="username" type="text" placeholder="Usuário" required>
        </div>
        <div class="row">
          <i class="fas fa-lock"></i>
          <input id="password" name="password" type="password" placeholder="Senha" required>
        </div>
        <div class="pass"><a href="#">Esqueceu a senha?</a></div>
        <div class="row button">
          <input type="submit" value="Entrar">
        </div>
      </form>
      <div id="error-message" class="error-message"></div> <!-- Novo elemento para exibir a mensagem de erro -->
    </div>
  </div>
  <script src="./Login/login.js"></script>
</body>
</html>
