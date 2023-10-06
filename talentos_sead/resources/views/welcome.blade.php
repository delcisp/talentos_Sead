<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste</title>
    @vite([ 'resources/sass/app.scss','resources/js/app.js'])
</head>
<body>
    <div class="row">

        <div class="col-md-6"> 
          <label class="form-label-top" for="nome">Nome</label>
          <div class="form-outline-left">
            <input type="text" id="nome" name="name" class="form-control input-style" autocomplete="username" />
        
          </div>
        </div>
    
    
        <div class="col-md-6">
          <label class="form-label-top-right" for="sobrenome">Sobrenome</label>
          <div class="form-outline-right">
            <input type="text" id="sobrenome" name="lastname" class="form-control input-style" />
            
          </div>
        </div>
    </div>
</body>
</html>