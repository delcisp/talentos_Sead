<?php
//conexao com o ldap
$ldap_host = 'ldap://10.46.22.252';
$ldap_port = 389;
$ldap_user_domain = 'dcsead-am.local'; 

session_start();
$first_login = true;

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
    $admin_users = ['delciane.pinheiro'];
    if (in_array($username, $admin_users)) {
      // User is an admin, redirect to dashboard.php
      header("Location: dashboard.php");
      exit();
  }
if ($first_login) {
  // Se é a primeira vez que o usuário está fazendo login, armazene o username no banco de dados
  require("config.php");

  // Conectar ao banco de dados
  $db_conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

  if ($db_conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $db_conn->connect_error);
  }

  // Inserir o nome de usuário na tabela de usuários
  $insert_query = "INSERT INTO users (username) VALUES ('$username')";
  if ($db_conn->query($insert_query) === TRUE) {
    // Obter o ID do usuário recém-inserido
    $user_id = $db_conn->insert_id;

    // Armazenar o ID do usuário em $_SESSION
    session_start();
    $_SESSION['user_id'] = $user_id;

    // Atualizar a variável de sessão para indicar que não é mais a primeira vez
    $first_login = false;

    // Redirecionar para a página de LGPD após a inserção bem-sucedida
    $waidt_path = "whyiamdoingthis.php";
    header("Location: " . $waidt_path);
    exit();
  } else {
    echo "Erro ao inserir o usuário no banco de dados: " . $db_conn->error;
  }

  // Fechar a conexão com o banco de dados
  $db_conn->close();
}
  }
  else {
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
    <title>SEAD Talentos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./Login/login.css">
    <link rel="icon" href="Imagens/icon_sead.ico" type="image/ico">
    <script src="./Login/login.js"></script>
    <script src="./errors/error.js " ></script>
</head>
<body style="background-color: #E1EBEE;">
		<form id="login-form" action="#" method="POST" class="signin-form">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<!-- aqui tinha um h2 -->
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(Imagens/logo_censo.jpeg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Acesse a sua Conta</h3>
			      		</div>
							
			      	</div>
							<form action="#" class="signin-form">
			      		<div class="form-group mb-3">
			      			<label class="label" for="username">Usuário</label>
			      			<input type="text" id="username" name="username" class="form-control" placeholder="Usuário" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Senha</label>
		              <input type="password" id="password" name="password" class="form-control" placeholder="Senha" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3" style="background-color: #01d28e;">Entrar</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	
									</div>
								
		            </div>
		          </form>
		          <p class="text-center">O acesso é o seu acesso no computador SEAD </p>
		        </div>
		      </div>
				</div>
			</div>
 		</div>
	</form>
</body>
</html>


