<?php
$ldap_host = 'ldap://10.46.22.252';
$ldap_port = 389;
$ldap_user_domain = 'dcsead-am.local'; // O domínio do usuário no LDAP 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtém as credenciais do formulário
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Conecta ao servidor LDAP
  $ldap_conn = ldap_connect($ldap_host, $ldap_port);

  if (!$ldap_conn) {
    die("Não foi possível se conectar com o servidor AD");
  }

  // Realiza a autenticação LDAP
  $ldap_bind = @ldap_bind($ldap_conn, $username . '@' . $ldap_user_domain, $password);

  if ($ldap_bind) {
    // Autenticação bem-sucedida
    // Redireciona para a página do documento LGPD após o login bem-sucedido
    header('Location: lgpd.php');
    exit();
  } else {
	echo "
<script>
  window.addEventListener('DOMContentLoaded', function() {
    alert('Login ou senha inválidos!');
  });
</script>
";
    
  }
}
?>

<!doctype html>
<html lang="pt-br" dir="ltr">
<head>
    <title>Gestão de Competências</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="./Login/login.css">

    <script src="./Login/login.js"></script>
</head>
<body>
<header>
    <form id="login-form" action="#" method="POST" class="signin-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section"></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url(Imagens/logo_sead.jpg);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Acesse a sua conta</h3>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" id="username" name="username" class="form-control" required>
                                <label class="form-control-placeholder" for="username">Usuário</label>
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" name="password" class="form-control" required>
                                <label class="form-control-placeholder" for="password">Senha</label>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3">Entrar</button>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</header>
</body>
</html>


