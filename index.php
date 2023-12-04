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
            $msg = 2;
        }
    } else {
        session_destroy();
        $msg = 3;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/pacote.css">
    <link rel="shortcut icon" href="./assets/img-system/favicon_baixo.png" type="image/x-icon">
    <title>Alquimia dos Acordes</title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container">
        <div class="row">
            <div class="col-xl-6">
                <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
                    <div class="text-center pt-5">
                        <h3>Login</h3>
                    </div>
                    <?php if (isset($_GET['msg'])) {
                        $msg = $_GET['msg'];
                        if ($msg == 1) { ?>
                            <div class="alert alert-success alert-dismissible fade show mx-3" role="alert">
                                <button class="btn-close" data-bs-dismiss="alert"></button>
                                Usuário cadastrado com sucesso!
                            </div>
                        <?php }} else if (isset($msg) && $msg == 2) { ?>
                        <div class="alert alert-danger alert-dismissible fade show mx-3" role="alert">
                            <button class="btn-close" data-bs-dismiss="alert"></button>
                            Senha incorreta, verifique suas credenciais!
                        </div>
                    <?php } else if (isset($msg) && $msg == 3) { ?>
                        <div class="alert alert-danger alert-dismissible fade show mx-3" role="alert">
                            <button class="btn-close" data-bs-dismiss="alert"></button>
                            Email não consta em nosso banco, verifique suas credenciais!
                        </div>
                    <?php } ?>
                    <div class="py-2 mx-3">
                        <label class="form-label">Email:</label>
                        <input class="form-control" type="email" name="email" class="input" required>
                    </div>
                    <div class="py-2 mx-3">
                        <label class="form-label">Senha:</label>
                        <input class="form-control" type="password" id="senha" name="senha" required>
                    </div>
                    <div class="text-center py-2">
                        <button class="btn link-body-emphasis w-25" type="submit" name="acessar" style="background-color: var(--color-yellow);">Acessar</button>
                        <p class="py-2">Não possui conta? <a href="cad_user.php">Cadastre-se</a></p>
                    </div>
                </form>
            </div>
            <div class="col-xl-6">
                <img src="./assets/img-system/logo_loja.png" class="py-4" height="100%" width="auto">
            </div>
        </div>
    </main>
    <?php include_once('rodape.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>