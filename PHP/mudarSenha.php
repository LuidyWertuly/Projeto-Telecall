<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION["alterar"]) && !empty($_SESSION["alterar"]) && isset($_POST["novaSenha"]) && !empty($_POST["novaSenha"])) {
        $login = $_SESSION["alterar"];
        $senha = $_POST['novaSenha'];

        include_once('conexao.php');

        $sql = mysqli_query($conexao, "UPDATE usuarios set senha = '$senha' WHERE login = '$login'") ;

        $retorno = 'errado';

        if ($sql == true) {
            $linhasAfetadas = mysqli_affected_rows($conexao);
            if($linhasAfetadas > 0){
                $retorno = 'correto';
                unset($_SESSION['alterar']);
            }
        }
        
        echo json_encode($retorno);
    }
}

else {
    echo "Método inválido.";
}
    
?>