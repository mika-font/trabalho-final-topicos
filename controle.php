<?php
session_start();
if (isset($_SESSION['id_usuario']) && isset($_SESSION['email']) && isset($_SESSION['tipo'])) {
    include_once("conectar.php");
    $conexao = conectar();
} else {
    session_unset();
    session_destroy();
    header("Location: index.php");
}
?>