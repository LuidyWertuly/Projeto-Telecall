<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se o campo "nome" foi enviado
    if (isset($_POST["login"]) && isset($_POST["senha"]) && isset($_POST["tipo"]) && isset($_POST["estado"]) && !empty($_POST["login"]) && !empty($_POST["senha"]) && !empty($_POST["tipo"]) && !empty($_POST["estado"])) {

        // Obtenha o valor do campo "login" e "senha"
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        $tipo = $_POST["tipo"];
        $estado = $_POST["estado"];
        $tipoCheck = "";

        include_once('conexao.php');

        $consultaCargo = mysqli_query($conexao, "SELECT cargo FROM usuarios WHERE login = '$login' and cargo = 'admin'") ;
        $verificarUsuario = mysqli_query($conexao, "SELECT * FROM usuarios WHERE login = '$login' and senha = '$senha'") ;
        $numLinhas = mysqli_num_rows($verificarUsuario);
        $cargo = mysqli_num_rows($consultaCargo);
        
        // Envie a resposta de volta para o JavaScript
        if ($numLinhas > 0 ) {

            if($tipo == 'admin' && $cargo == 1){

                $tipoCheck = "true";

                if($estado == 'cookie'){
                    setcookie('login',$login, time() + (60*60*24*31), '/');
                }
    
                else{
                    $_SESSION["login"] = $login;
                }
            }
            else if($tipo == 'user' && $cargo == 0){

                $tipoCheck = "true";

                if($estado == 'cookie'){
                    setcookie('temp',$login, time() + (60*60), '/');
                }
    
                else{
                    $_SESSION["temp"] = $login;
                }
            }
            else{
                $tipoCheck = "";
            }
        }

        else{
            $tipoCheck = "false";
        }

        // Criando uma resposta para o ajax do javascript
        $resposta = array(
            'numLinhas' => $numLinhas,
            'userCargo' => $cargo,
            'login' => $login,
            'tipoCheck' => $tipoCheck
        );

        echo json_encode($resposta);

    } else {

        $resposta = "Por favor, forneça um login." ;
        // Se o campo "login" não foi enviado
        echo $resposta ;

    }
} else {
    
    // Se a requisição não foi do tipo POST
    echo "Método inválido.";

}
?>
