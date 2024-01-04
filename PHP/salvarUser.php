<?php
  $usuario = $_POST['data'];

  $dados = json_decode($usuario, true);

  if ($dados != "") {
     var_dump($dados); //testando se as informações estão sendo armazenada 

     echo "bommmm'";

    include_once('conexao.php');

    $login = $dados['login'];
    $senha = $dados['senha'];
    $cep = $dados['cep'];
    $DTnascimento = $dados['dataNascimento'];
    $nomeMãe = $dados['nomeMaterno'];
  
    $result = mysqli_query($conexao, "INSERT INTO usuarios(cargo,login,senha,cep,nomeMae,DTnascimento) VALUES ('user','$login', '$senha', '$cep','$nomeMãe','$DTnascimento')");

  }

  else{
    echo "Ruimmm";
  }
  
?>