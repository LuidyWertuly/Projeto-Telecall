<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["dado"]) && !empty($_POST["dado"])) {

        $login = $_POST["dado"];

        include_once('conexao.php');

        $query = mysqli_query($conexao, "SELECT login FROM usuarios WHERE login = '$login'") ;
        $numeroLinhas = mysqli_num_rows($query);

        $retornoSenha = array(
            'numerolinhas' => $numeroLinhas,
            'login' => $login,
        );

        if ($numeroLinhas > 0) {

            $_SESSION["caminho"] = 'esqSenha';
            $_SESSION["temp_ES"] = $login;

        }

        echo json_encode($retornoSenha);
    }
} 
else {
    echo "Método inválido.";
}
    
?>