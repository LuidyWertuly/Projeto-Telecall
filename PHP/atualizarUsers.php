<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"]) && !empty($_POST["id"])) {
        // Deletar usuário e dados extras relacionados
        $idUser = $_POST['id'];

        include_once('conexao.php');

        // Excluir da tabela `usuarios` (os dados relacionados na tabela `extras` serão excluídos automaticamente pelo ON DELETE CASCADE)
        $sql = mysqli_query($conexao, "DELETE FROM usuarios WHERE IDUser = '$idUser'");

        $retorno = 'erro';

        if ($sql == true) {
            $linhasAfetadas = mysqli_affected_rows($conexao);
            if ($linhasAfetadas > 0) {
                $retorno = 'apagado';
            }
        }
        
        echo json_encode($retorno);
    } 
    else if (isset($_POST["dado"]) && !empty($_POST["dado"])) {
        // Atualizar usuário e dados extras
        $dados = $_POST['dado'];

        include_once('conexao.php');

        // Atualizar a tabela `usuarios`
        $sqlUsuarios = mysqli_query($conexao, "UPDATE usuarios 
                                               SET Cargo = '{$dados['cargo']}', 
                                                   Login = '{$dados['login']}', 
                                                   Senha = '{$dados['senha']}' 
                                               WHERE IDUser = '{$dados['idUser']}'");

        // Atualizar a tabela `extras`
        $sqlExtras = mysqli_query($conexao, "UPDATE extras 
                                             SET Cep = '{$dados['cep']}', 
                                                 NomeMãe = '{$dados['nomeMae']}', 
                                                 DTnascimento = '{$dados['DTnascimento']}' 
                                             WHERE IDUser = '{$dados['idUser']}'");

        $retorno = 'erro';

        if ($sqlUsuarios && $sqlExtras) {
            $linhasAfetadasUsuarios = mysqli_affected_rows($conexao);
            $linhasAfetadasExtras = mysqli_affected_rows($conexao);

            if ($linhasAfetadasUsuarios > 0 || $linhasAfetadasExtras > 0) {
                $retorno = 'atualizado';
            }
        }
        
        echo json_encode($retorno);
    } 
    else if (isset($_POST['gerar']) && !empty($_POST['gerar'])) {
        // Inserir dados simulados para testes
        include_once('conexao.php');

        for ($i = 0; $i <= 49; $i++) {
            $sqlUsuarios = mysqli_query($conexao, "INSERT INTO usuarios (Cargo, Login, Senha) 
                                                   VALUES ('user', 'teste$i', 'teste123')");

            if ($sqlUsuarios) {
                $idInserido = mysqli_insert_id($conexao); // Obtém o ID do último usuário inserido
                
                // Inserir dados na tabela `extras`
                mysqli_query($conexao, "INSERT INTO extras (IDExtra, Cep, NomeMãe, DTnascimento, IDUser) 
                                        VALUES ('$idInserido', '12345678', 'mãe dos testes', '1852-12-01', '$idInserido')");
            }
        }

        $retorno = 'gerado';
        echo json_encode($retorno);
    } 
    else if (isset($_POST['procura']) && !empty($_POST['procura']) && isset($_POST['tipo']) && !empty($_POST['tipo'])) {
        // Procurar dados de usuários e extras
        $procura = $_POST["procura"];
        $tipo = $_POST["tipo"];

        include_once('conexao.php');

        $sql = mysqli_query($conexao, "SELECT usuarios.IDUser, usuarios.Cargo, usuarios.Login, usuarios.Senha, 
                                              extras.Cep, extras.NomeMãe, extras.DTnascimento 
                                       FROM usuarios 
                                       LEFT JOIN extras ON usuarios.IDUser = extras.IDUser 
                                       WHERE $tipo = '$procura'");

        $usuarios = array();

        while ($row = mysqli_fetch_assoc($sql)) {
            $usuarios[] = $row;
        }

        echo json_encode($usuarios);
    } 
    else {
        echo "Método vazio";
    }
} 
else {
    echo "Método inválido.";
}

?>
