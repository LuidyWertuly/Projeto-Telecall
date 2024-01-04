<?php

// Obtém o nome do script atual
$scriptName = basename($_SERVER['SCRIPT_NAME']);

// Define o caminho com base no nome do script
if ($scriptName === 'index.php') {
    $caminho = './Pages/erro.php';
} else {
    $caminho = '../Pages/erro.php';
}

function handleError($errno, $errstr, $errfile, $errline) {
    // Redireciona para a página de erro
    global $caminho;
    header("Location: $caminho ");
    exit;
}

// Define a função de tratamento de erro
set_error_handler("handleError");

?>