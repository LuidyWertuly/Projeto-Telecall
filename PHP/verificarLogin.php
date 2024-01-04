<?php
session_start();

$valido = '';
$nome = '';

if(isset($_COOKIE["login"])){
    $nome = $_COOKIE["login"];
    //definindo estado da variavel
    $valido = 'sim';
}

else if(isset($_SESSION["login"])){ 
    $nome = $_SESSION["login"];
    //definindo estado da variavel
    $valido = 'sim';
}

else{
    //definindo estado da variavel
    $valido = 'nao';
}

include_once('conexao.php');

$sql = mysqli_query($conexao, "SELECT cargo FROM usuarios WHERE login = '$nome' and cargo = 'admin'") ;
$cargo = mysqli_num_rows($sql);

// Retornar os dados como JSON pro JS

$data = array(
    'valido' => $valido,
    'nome' => $nome,
    'cargo' => $cargo
);

echo json_encode($data);

?>