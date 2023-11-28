<?php
if (isset($_POST['cadastrar'])) {
    include_once("conectar.php");
    $conexao = conectar();
    if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['fone'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['fone'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: cad_user.php?msg=1"); //email inválido
            exit();
        }
        if (strlen($senha) < 8) {
            header("Location: cad_user.php?msg=2"); //senha pequena
            exit();
        }
        $senha_cript = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $conexao->prepare("INSERT INTO usuario (nome, email, senha, telefone) VALUE (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $email, $senha_cript, $telefone);

        if ($stmt->execute()) {
            header("Location: index.php?msg=1");
        } else {
            header("Location: cad_user.php?msg=3"); //falha ao cadastrar o usuario
        }
    }
} else if (isset($_POST['editar'])) {
    include_once("controle.php");
    if (!empty($_POST['id_usuario']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['fone'])) {
        $id_usuario = $_POST['id_usuario'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['fone'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: edit_user.php?id_usuario=$id_usuario&msg=1");
            exit();
        }
        if (strlen($senha) < 8) {
            header("Location: edit_user.php?id_usuario=$id_usuario&msg=2");
            exit();
        }
        $senha_cript = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $conexao->prepare("UPDATE usuario SET nome=?, email=?, senha=?, telefone=? WHERE id_usuario=?");
        $stmt->bind_param("ssssi", $nome, $email, $senha_cript, $telefone, $id_usuario);

        if ($stmt->execute()) {
            header("Location: central.php?msg=1");
        } else {
            header("Location: edit_user.php?id_usuario=$id_usuario&msg=3");
        }
    }
} else if (isset($_GET['excluir'])) {
    include_once("controle.php");
    $id_usuario = $_GET['excluir'];
    $stmt = $conexao->prepare("DELETE FROM usuario WHERE id_usuario = ?");
    $stmt->bind_param("i", $id_usuario);
    if ($stmt->execute()) {
        header("Location: logout.php");
    } else {
        header("Location: central.php?msg=2");
    }
}
?>