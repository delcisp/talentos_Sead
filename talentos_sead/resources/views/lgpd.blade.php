<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Termos LGPD</title>
    <script src="{{ asset('js/lgpd.js') }}"></script>
    <link rel="icon" href="images/icon_sead.ico" type="image/ico">
    @vite([ 'resources/sass/app.scss','resources/js/app.js'])
    @vite(['public/css/lgpd.css'])
    
</head>
<body>
    <div class="container">
        <embed src="pdfs/lgpd.pdf" type="application/pdf" width="100%" height="600px" />
        <div class="terms">
          <input type="checkbox" id="concordo">
          <label for="concordo">Li e concordo com os termos do documento LGPD</label>
        </div>
        <button id="continue-button" disabled>Continuar</button>
      </div>
      @vite(['public/js/lgpd.js'])
    
</body>
</html>