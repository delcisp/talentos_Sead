<?php
session_start();

if (isset($_SESSION['competencias'])) {
  $competencias = $_SESSION['competencias'];
} else {
  $competencias = [];
}

$response = ['competencias' => $competencias];
echo json_encode($response);
?>