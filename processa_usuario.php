<?php
if (isset($_POST['cadastrar'])) {
    include_once("conectar.php");
    $conexao = conectar();
    if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['cpf']) && !empty($_POST['endereco'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $cpf = $_POST['cpf'];
        $endereco = $_POST['endereco'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: cad_user.php?msg=1"); //email inválido
            exit();
        }
        if (strlen($senha) < 8 || strlen($senha) > 32) {
            header("Location: cad_user.php?msg=2"); //senha pequena ou grande
            exit();
        }
        $senha_cript = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $conexao->prepare("INSERT INTO usuario (nome, email, senha, cpf, endereco) VALUE (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nome, $email, $senha_cript, $cpf, $endereco);

        if ($stmt->execute()) {
            header("Location: index.php?msg=1");
            exit();
        } else {
            header("Location: cad_user.php?msg=3"); //falha ao cadastrar o usuario
            exit();
        }
    } else {
        header("Location: cad_user.php?msg=4"); //campos não preenchidos
        exit();
    }
} else if (isset($_POST['editar'])) {
    include_once("controle.php");
    $id_usuario = $_POST['id_usuario']; 
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];

    if (empty($nome) || empty($email) || empty($cpf) || empty($endereco)) {
        header("Location: editar_usuario.php?id_usuario=$id_usuario&msg=1");
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: editar_usuario.php?id_usuario=$id_usuario&msg=2");
        exit();
    }
    if (!empty($senha) && (strlen($senha) < 8 || strlen($senha) > 32)) {
        header("Location: editar_usuario.php?id_usuario=$id_usuario&msg=3");
        exit();
    }
    $senha_cript = !empty($senha) ? password_hash($senha, PASSWORD_DEFAULT) : null;
    $stmt = $conexao->prepare("UPDATE usuario SET nome=?, email=?, senha=?, cpf=?, endereco=? WHERE id_usuario=?");
    $stmt->bind_param("sssssi", $nome, $email, $senha_cript, $cpf, $endereco, $id_usuario);

    if ($stmt->execute()) {
        header("Location: central.php?msg=1"); // Sucesso ao editar
        exit();
    } else {
        header("Location: editar_usuario.php?id_usuario=$id_usuario&msg=4"); // Falha ao editar o usuário
        exit();
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
