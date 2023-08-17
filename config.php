<?php

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "12345";
$dbName = "formcompetencias";

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// if ($conn->connect_error) {
//    echo "NAO TA CONECTANDO COM O BANCO DE DADOSSSSSSS " . $conn->connect_error;
//} else {
//    echo "TA CONECTADO COM O BANCO PORAR";

//}


//$conn->close();
?>