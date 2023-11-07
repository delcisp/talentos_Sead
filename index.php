<?php
//conexao com o ldap
$ldap_host = 'ldap://10.46.22.252';
$ldap_port = 389;
$ldap_user_domain = 'dcsead-am.local'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    // Conecta ao servidor LDAP
    $ldap_conn = ldap_connect($ldap_host, $ldap_port);
  
    if (!$ldap_conn) {
      die("Não foi possível se conectar com o servidor");
    }
  
    // Realiza a autenticação LDAP
    $ldap_bind = @ldap_bind($ldap_conn, $username . '@' . $ldap_user_domain, $password);
  
    if ($ldap_bind) {
      $admin_users = ['delciane.pinheiro', 'alice.soledade', 'andrea.melo'];
  
      // Autenticação bem-sucedida
      if (in_array($username, $admin_users)) {
        // Se o usuário é um administrador, redirecione para o dashboard
        $dashboard_path = "dashboard.php";
        header("Location: " . $dashboard_path);
        exit();
      } else {
        // Se o usuário não é um administrador, inclua o arquivo de configuração do banco de dados
        require("config.php");
  
        // Conectar ao banco de dados
        $db_conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
  
        if ($db_conn->connect_error) {
          die("Erro na conexão com o banco de dados: " . $db_conn->connect_error);
        }
        $password = $_POST['password'];

        // Verificar se o campo 'password' não está vazio
        if (empty($password)) {
          echo "A senha é obrigatória.";
          // Adote uma ação apropriada, como redirecionar para a página de login
          exit();
        }
        
        // Hash da senha usando a função password_hash (use um algoritmo seguro e salto aleatório)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Inserir o nome de usuário na tabela de usuários
        $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($db_conn->query($insert_query) === TRUE) {
          // Redirecionar para a página de LGPD após a inserção bem-sucedida
          $lgpd_path = "lgpd.php";
          header("Location: " . $lgpd_path);
          exit();
        } else {
          echo "Erro ao inserir o usuário no banco de dados: " . $db_conn->error;
        }
  
        // Fechar a conexão com o banco de dados
        $db_conn->close();
      }
    } else {
      echo "
      <script>
        window.addEventListener('DOMContentLoaded', function() {
          alert('Login ou senha inválidos!');
        });
      </script>
      ";
      // Outras ações a serem realizadas em caso de falha na autenticação
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
    <link rel="icon" href="Imagens/icon_sead.ico" type="image/ico">
    <script src="./Login/login.js"></script>
    <script src="./errors/error.js " ></script>
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


