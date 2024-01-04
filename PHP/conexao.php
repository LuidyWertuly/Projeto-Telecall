<?php

// $dbHost = 'localhost';
// $dbUsername = 'apunat60_admin';
// $dbPassword = 'T@s23106672';
// $dbName = 'apunat60_Projeto-LWs';

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'registro';


$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

//  if ($conexao -> connect_errno) {
//      echo "Erro";
//  } else {
//      echo "Sucesso";
//  }

?>