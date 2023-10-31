<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<form action="teste.php" method="post">
    <input type="text" name="username" placeholder="Usuário">
    <input type="password" name="password" placeholder="Senha">
    <input type="submit" value="Entrar">
</form>
<?php
use \LdapRecord\Connection;


$connection = new Connection ([
    'hosts' => ['10.46.22.252'],
]);

if ($connection->auth()->attempt('cn=john doe,dc=local,dc=com', 'p@ssw0rd', $stayAuthenticated = true)) {
    $dashboard_path = "dashboard.php";
        
    // Redireciona para a página do dashboard
    header("Location: " . $dashboard_path);
} else {
    echo "lembra direito";
}
?>


</body>
</html>
