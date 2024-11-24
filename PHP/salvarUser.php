<?php
  $usuario = $_POST['data'];

  $dados = json_decode($usuario, true);

  if (!empty($dados)) {
    var_dump($dados); // Testando se as informações estão sendo armazenadas corretamente

    echo "Processando...";

    include_once('conexao.php');

    // Dados recebidos
    $login = $dados['login'];
    $senha = $dados['senha'];
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
        echo json_encode(['status' => 'sucesso', 'mensagem' => 'Usuário e dados adicionais inseridos com sucesso!']);
      } else {
        echo json_encode([
          'status' => 'erro',
          'mensagem' => 'Erro ao inserir dados na tabela extras.',
          'erro' => mysqli_error($conexao)
        ]);
      }
    } else {
      echo json_encode([
        'status' => 'erro',
        'mensagem' => 'Erro ao inserir dados na tabela usuarios.',
        'erro' => mysqli_error($conexao)
      ]);
    }
  } else {
    echo "Nenhum dado recebido.";
  }
?>
