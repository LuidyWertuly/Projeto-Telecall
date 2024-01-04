<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['caminho']) && $_SESSION['caminho'] == 'esqSenha'){
        if (isset($_SESSION["temp_ES"]) && !empty($_SESSION["temp_ES"]) && isset($_POST["informacao"]) && isset($_POST["numero"]) && !empty($_POST["informacao"]) && !empty($_POST["numero"])) {
            $login = $_SESSION['temp_ES'];
            $verificar = $_POST["informacao"];
            $numero = $_POST["numero"];

            include_once('conexao.php');

            if($numero == 1){
                $sql = mysqli_query($conexao, "SELECT DTnascimento FROM usuarios WHERE DTnascimento = '$verificar' and login = '$login'") ;
                $numLinhas = mysqli_num_rows($sql);
            }
            else if($numero == 2){
                $sql= mysqli_query($conexao, "SELECT nomeMae FROM usuarios WHERE nomeMae = '$verificar' and login = '$login'") ;
                $numLinhas = mysqli_num_rows($sql);
            }
            else{
                $sql = mysqli_query($conexao, "SELECT cep FROM usuarios WHERE cep = '$verificar' and  login = '$login'") ;
                $numLinhas = mysqli_num_rows($sql);
            }

            if ($numLinhas > 0) {

                $retorno = array(
                    'resultado' => 'valido',
                    'alterar' => 'alterar',
                );

                unset($_SESSION['temp_ES']);
                $_SESSION["alterar"] = $login;

            }
            else{
                $retorno = array(
                    'resultado' => 'invalido',
                );
            }

            echo json_encode($retorno);
        }
    }

    else{
        if (isset($_POST["informacao"]) && isset($_POST["numero"]) && !empty($_POST["informacao"]) && !empty($_POST["numero"])) {
            $verificar = $_POST["informacao"];
            $numero = $_POST["numero"];
            $login = '';
            $origem = '';

            if(isset($_SESSION['temp']) && !empty($_SESSION["temp"])){
                $login = $_SESSION["temp"];
                $origem = 'session';
            }
            else if(isset($_COOKIE['temp']) && !empty($_COOKIE["temp"])){
                $login = $_COOKIE['temp'];
                $origem = 'cookie';
            }

            include_once('conexao.php');

            if($numero == 1){
                $sql = mysqli_query($conexao, "SELECT DTnascimento FROM usuarios WHERE DTnascimento = '$verificar' and login = '$login'") ;
                $numLinhas = mysqli_num_rows($sql);
            }
            else if($numero == 2){
                $sql= mysqli_query($conexao, "SELECT nomeMae FROM usuarios WHERE nomeMae = '$verificar' and login = '$login'") ;
                $numLinhas = mysqli_num_rows($sql);
            }
            else{
                $sql = mysqli_query($conexao, "SELECT cep FROM usuarios WHERE cep = '$verificar' and  login = '$login'") ;
                $numLinhas = mysqli_num_rows($sql);
            }

            if ($numLinhas > 0) {

                $retorno = array(
                    'resultado' => 'valido',
                );

                if($origem == 'cookie'){
                    setcookie('login',$login, time() + (60*60*24*31), '/');
                }

                else{
                    $_SESSION["login"] = $login;
                }

                unset($_SESSION['temp']);
                setcookie('temp', '', time() - 3600);

            }
            else{
                $retorno = array(
                    'resultado' => 'invalido',
                );
            }

            echo json_encode($retorno);
        }
    }
} 
else {
    echo "Método inválido.";
}
    
?>