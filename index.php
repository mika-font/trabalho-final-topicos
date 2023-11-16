<?php
if (isset($_POST['acessar']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    include_once("conectar.php");
    $conexao = conectar();
    session_start();

    $email = mysqli_escape_string($conexao, $_POST['email']);
    $senha = mysqli_escape_string($conexao, $_POST['senha']);

    $comando = "SELECT * FROM usuario WHERE email = '$email'";
    $consulta = mysqli_query($conexao, $comando);

    if (mysqli_num_rows($consulta) == 1) {
        $dados = mysqli_fetch_assoc($consulta);
        if (password_verify($senha, $dados['senha'])) {
            $_SESSION['email'] = $email;
            $_SESSION['id_usuario'] = $dados['id_usuario'];
            header("Location: central.php");
        } else {
            session_destroy();
        }
    } else {
        session_destroy();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <title>Rituais do Café</title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container">

    </main>
    <?php include_once('rodape.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>