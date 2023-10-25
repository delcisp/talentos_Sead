<?php
use DirectoryTree\LdapRecord\Connection;

$connection = new Connection([
    'host' => env('LDAP_HOST'),
    'port' => env('LDAP_PORT'),
    'username' => env('LDAP_USERNAME'),
    'password' => env('LDAP_PASSWORD'),
    'baseDn' => env('LDAP_BASE_DN'),
]);

$connection->connect();

if ($connection->isConnected()) {
    echo "A conexão LDAP foi estabelecida com sucesso.";
} else {
    echo "Falha ao estabelecer conexão LDAP.";
}




