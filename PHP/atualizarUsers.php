<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"]) && !empty($_POST["id"])) {

        $idUser = $_POST['id'];

        include_once('conexao.php');

        $sql = mysqli_query($conexao, "DELETE FROM usuarios WHERE idUser = '$idUser'") ;

        $retorno = 'erro';

        if ($sql == true) {
            $linhasAfetadas = mysqli_affected_rows($conexao);
            if($linhasAfetadas > 0){
                $retorno = 'apagado';
            }
        }
        
        echo json_encode($retorno);
    }

    else if(isset($_POST["dado"]) && !empty($_POST["dado"])){
        $dados = $_POST['dado'];

        include_once('conexao.php');

        $sql = mysqli_query($conexao, "UPDATE usuarios SET cargo='{$dados['cargo']}', login='{$dados['login']}', senha='{$dados['senha']}', cep='{$dados['cep']}', nomeMae='{$dados['nomeMae']}', DTnascimento='{$dados['DTnascimento']}' WHERE idUser='{$dados['idUser']}'");

        $retorno = 'erro';

        if ($sql == true) {
            $linhasAfetadas = mysqli_affected_rows($conexao);
            if($linhasAfetadas > 0){
                $retorno = 'atualizado';
            }
        }
        
        echo json_encode($retorno);
    }

    else if(isset($_POST['gerar']) && !empty($_POST['gerar'])){

        include_once('conexao.php');

        for($i = 0; $i <= 49; $i++){
            $sql = mysqli_query($conexao, "INSERT INTO usuarios(cargo,login,senha,cep,nomeMae,DTnascimento) VALUES ('user','teste1', 'teste123', '12345678','mãe dos testes','1852-12-01')");
        }

        $retorno = 'gerado';
        echo json_encode($retorno);

    }

    else if(isset($_POST['procura']) && !empty($_POST['procura']) && isset($_POST['tipo']) && !empty($_POST['tipo'])){
        $procura = $_POST["procura"];
        $tipo = $_POST["tipo"];

        include_once('conexao.php');

        $sql = mysqli_query($conexao, "SELECT * FROM usuarios WHERE $tipo = '$procura'");

        $usuarios = array();

        while ($row = mysqli_fetch_assoc($sql)) {
            $usuarios[] = $row;
        }

        echo json_encode($usuarios);
    }

    else{
        echo "Método vazio";
    }
}

else {
    echo "Método inválido.";
}
    
?>