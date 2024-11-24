<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['caminho']) && $_SESSION['caminho'] == 'esqSenha') {
        if (isset($_SESSION["temp_ES"]) && !empty($_SESSION["temp_ES"]) && isset($_POST["informacao"]) && isset($_POST["numero"]) && !empty($_POST["informacao"]) && !empty($_POST["numero"])) {
            $login = $_SESSION['temp_ES'];
            $verificar = $_POST["informacao"];
            $numero = $_POST["numero"];

            include_once('conexao.php');

            // Verificar se a conexão foi bem-sucedida
            if (mysqli_connect_errno()) {
                echo json_encode(['status' => 'erro', 'mensagem' => 'Falha na conexão com o banco de dados: ' . mysqli_connect_error()]);
                exit();
            }

            if ($numero == 1) {
                $sql = mysqli_prepare($conexao, "SELECT DTnascimento FROM extras WHERE DTnascimento = ? AND login = ?");
                mysqli_stmt_bind_param($sql, 'ss', $verificar, $login);
            } elseif ($numero == 2) {
                $sql = mysqli_prepare($conexao, "SELECT nomeMãe FROM extras WHERE nomeMãe = ? AND login = ?");
                mysqli_stmt_bind_param($sql, 'ss', $verificar, $login);
            } else {
                $sql = mysqli_prepare($conexao, "SELECT cep FROM extras WHERE cep = ? AND login = ?");
                mysqli_stmt_bind_param($sql, 'ss', $verificar, $login);
            }

            if (!mysqli_stmt_execute($sql)) {
                echo json_encode(['status' => 'erro', 'mensagem' => 'Erro na execução da consulta SQL: ' . mysqli_error($conexao)]);
                exit();
            }

            $result = mysqli_stmt_get_result($sql);
            $numLinhas = mysqli_num_rows($result);

            if ($numLinhas > 0) {
                $retorno = array(
                    'resultado' => 'valido',
                    'alterar' => 'alterar',
                );

                unset($_SESSION['temp_ES']);
                $_SESSION["alterar"] = $login;
            } else {
                $retorno = array(
                    'resultado' => 'invalido',
                );
            }

            echo json_encode($retorno);
        }
    } else {
        if (isset($_POST["informacao"]) && isset($_POST["numero"]) && !empty($_POST["informacao"]) && !empty($_POST["numero"])) {
            $verificar = $_POST["informacao"];
            $numero = $_POST["numero"];
            $login = '';
            $origem = '';

            if (isset($_SESSION['temp']) && !empty($_SESSION["temp"])) {
                $login = $_SESSION["temp"];
                $origem = 'session';
            } elseif (isset($_COOKIE['temp']) && !empty($_COOKIE["temp"])) {
                $login = $_COOKIE['temp'];
                $origem = 'cookie';
            }

            include_once('conexao.php');

            // Verificar se a conexão foi bem-sucedida
            if (mysqli_connect_errno()) {
                echo json_encode(['status' => 'erro', 'mensagem' => 'Falha na conexão com o banco de dados: ' . mysqli_connect_error()]);
                exit();
            }

            if ($numero == 1) {
                $sql = mysqli_prepare($conexao, "SELECT DTnascimento FROM extras WHERE DTnascimento = ? AND login = ?");
                mysqli_stmt_bind_param($sql, 'ss', $verificar, $login);
            } elseif ($numero == 2) {
                $sql = mysqli_prepare($conexao, "SELECT nomeMãe FROM extras WHERE nomeMãe = ? AND login = ?");
                mysqli_stmt_bind_param($sql, 'ss', $verificar, $login);
            } else {
                $sql = mysqli_prepare($conexao, "SELECT cep FROM extras WHERE cep = ? AND login = ?");
                mysqli_stmt_bind_param($sql, 'ss', $verificar, $login);
            }

            if (!mysqli_stmt_execute($sql)) {
                echo json_encode(['status' => 'erro', 'mensagem' => 'Erro na execução da consulta SQL: ' . mysqli_error($conexao)]);
                exit();
            }

            $result = mysqli_stmt_get_result($sql);
            $numLinhas = mysqli_num_rows($result);

            if ($numLinhas > 0) {
                $retorno = array(
                    'resultado' => 'valido',
                );

                if ($origem == 'cookie') {
                    setcookie('login', $login, time() + (60 * 60 * 24 * 31), '/');
                } else {
                    $_SESSION["login"] = $login;
                }

                unset($_SESSION['temp']);
                setcookie('temp', '', time() - 3600);
            } else {
                $retorno = array(
                    'resultado' => 'invalido',
                );
            }

            echo json_encode($retorno);
        }
    }
} else {
    echo "Método inválido.";
}
?>
