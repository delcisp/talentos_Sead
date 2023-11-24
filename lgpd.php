<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Termos de LGPD</title>
  <link rel="stylesheet" href="./Lgpd/lgpd.css">
  <link rel="stylesheet" href="./Form/css/mdb.min.css" />
  <link rel="icon" href="Imagens/icon_sead.ico" type="image/ico">
</head>

<body>
  <div class="container">
    <embed src="./Lgpd/lgpd.pdf" type="application/pdf" width="100%" height="600px" />
    <div class="terms">
      <input type="checkbox" id="agree-checkbox">
      <label for="agree-checkbox">Ao submeter este formulário, estou ciente que minhas informações serão armazenadas e utilizadas para estudos, pesquisas, formulação de projetos e para oportunidades
        alinhadas ao meu perfil profissional. 
       </label>
    </div>
    <div class="d-flex justify-content-between">
    <button id="continue-button" disabled>Continuar</button>
    <button id="back-button" onclick="voltar()" >Voltar</button>
  </div>
  </div>
  <script src="./Lgpd/lgpd.js"></script>
</body>
<script>
    function voltar() {
      window.location.href = "whyiamdoingthis.php";
    }
  </script>
</html>
