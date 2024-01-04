<?php

session_start();
session_destroy();
header('Location: ../index.php');
setcookie("login", "", time() - 3600, "/");

?>