<?php
if (isset($_SESSION['id_usuario']) && isset($_SESSION['email'])) {
    include_once("conectar.php");
    $conexao = conectar();
} else {
    session_unset();
    session_destroy();
    header("Location: index.php");
}
?>