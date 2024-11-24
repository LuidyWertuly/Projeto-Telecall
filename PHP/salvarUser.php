<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$usuario = $_POST['data'];

$dados = json_decode($usuario, true);

if (!empty($dados)) {
  var_dump($dados); // Verificando os dados recebidos

  echo "Processando...";

  include_once('conexao.php');

  // Verificar se a conexão foi bem-sucedida
  if (mysqli_connect_errno()) {
      echo "Falha na conexão com o banco de dados: " . mysqli_connect_error();
      exit();
  }

  // Dados recebidos
  $login = $dados['login'];
  $senha = $dados['senha'];
  $cep = $dados['cep'];
  $DTnascimento = date('Y-m-d', strtotime($dados['dataNascimento']));  // Formatar a data corretamente
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
