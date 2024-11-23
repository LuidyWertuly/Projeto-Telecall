<?php

$dbHost = 'localhost';
$dbUsername = 'admin';
$dbPassword = '12345678';
$dbName = 'registro';


$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

//  if ($conexao -> connect_errno) {
//      echo "Erro";
//  } else {
//      echo "Sucesso";
//  }

?>
