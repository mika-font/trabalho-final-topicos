<?php
include_once("controle.php");
$id_usuario = isset($_GET['id_usuario']) ? intval($_GET['id_usuario']) : 0;
$sql = "SELECT * FROM usuario WHERE id_usuario = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_usuario);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if ($result) {
    $dados = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
} else {
    echo "Erro na consulta: " . mysqli_error($conexao);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/pacote.css">
    <link rel="shortcut icon" href="./assets/img-system/favicon_baixo.png" type="image/x-icon">
    <title>Editar Usuário</title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="text-center pt-4">
                    <h3>Editar Usuário</h3>
                    <hr>
                </div>
            </div>
        </div>
        <form method="POST" action="processa_usuario.php">
            <div class="row">
                <div class="col-xl-4">
                    <div class="py-2 mx-3">
                        <input type="hidden" name="id_usuario" value="<?= $dados['id_usuario']; ?>">
                        <label class="form-label">Nome:</label>
                        <input class="form-control" type="text" name="nome" class="input" value="<?= $dados['nome']; ?>" required>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="py-2 mx-3">
                        <label class="form-label">Email:</label>
                        <input class="form-control" type="email" name="email" class="input" value="<?= $dados['email']; ?>" required>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="py-2 mx-3">
                        <label class="form-label">Senha:</label>
                        <input class="form-control" type="password" id="senha" name="senha" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="py-2 mx-3">
                        <label class="form-label">CPF:</label>
                        <input class="form-control" type="text" placeholder="xxx.xxx.xxx-xx" id="cpf" name="cpf" value="<?= $dados['cpf']; ?>" required>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="py-2 mx-3">
                        <label class="form-label">Endereço:</label>
                        <input class="form-control" type="text" id="endereco" name="endereco" value="<?= $dados['endereco']; ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="text-end py-2 mx-3">
                        <button class="btn link-body-emphasis" type="submit" name="editar" style="background-color: var(--color-yellow);">Editar</button>
                        <a href="central.php" class="btn link-body-emphasis text-light" style="background-color: var(--color-brown);">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="central.php" class="text-decoration-none">Central</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Editar Conta</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </form>
    </main>
    <?php include_once('rodape.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>