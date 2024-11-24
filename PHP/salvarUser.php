<?php
  $usuario = $_POST['data'];

  $dados = json_decode($usuario, true);

  if (!empty($dados)) {
    var_dump($dados); // Testando se as informações estão sendo armazenadas

    echo "bommmm";

    include_once('conexao.php');

    // Dados para a tabela `usuarios`
    $login = $dados['login'];
    $senha = $dados['senha'];

    // Dados para a tabela `extras`
    $cep = $dados['cep'];
    $DTnascimento = $dados['dataNascimento'];
    $nomeMae = $dados['nomeMaterno'];

    // Inserção na tabela `usuarios`
    $queryUsuario = "INSERT INTO usuarios (cargo, login, senha) VALUES ('user', '$login', '$senha')";
    $resultUsuario = mysqli_query($conexao, $queryUsuario);

    if ($resultUsuario) {
      // Obter o último ID inserido na tabela `usuarios`
      $idUser = mysqli_insert_id($conexao);

      // Inserção na tabela `extras` com referência ao `idUser`
      $queryExtras = "INSERT INTO extras (idUser, cep, nomeMae, DTnascimento) 
                      VALUES ('$idUser', '$cep', '$nomeMae', '$DTnascimento')";
      $resultExtras = mysqli_query($conexao, $queryExtras);

      if ($resultExtras) {
        echo json_encode(['status' => 'sucesso', 'mensagem' => 'Usuário inserido com sucesso!']);
      } else {
        echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao inserir dados na tabela extras.']);
      }
    } else {
      echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao inserir dados na tabela usuarios.']);
    }
  } else {
    echo "Ruimmm";
  }
?>
