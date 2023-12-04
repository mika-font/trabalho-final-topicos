<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/pacote.css">
    <link rel="shortcut icon" href="./assets/img-system/favicon_baixo.png" type="image/x-icon">
    <title>Cadastro de Usuário</title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="text-center pt-5">
                    <h3>Cadastrar Usuário</h3>
                    <hr>
                </div>
            </div>
        </div>
        <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
            <div class="row">
                <div class="col-xl-6">
                    <div class="py-2 mx-3">
                        <label class="form-label">Nome:</label>
                        <input class="form-control" type="text" name="nome" class="input" required>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="py-2 mx-3">
                        <label class="form-label">Email:</label>
                        <input class="form-control" type="email" name="email" class="input" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="py-2 mx-3">
                        <label class="form-label">Senha:</label>
                        <input class="form-control" type="password" id="senha" name="senha" required>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="py-2 mx-3">
                        <label class="form-label">CPF:</label>
                        <input class="form-control" type="text" placeholder="xxx.xxx.xxx-xx" id="cpf" name="cpf" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8">
                    <div class="py-2 mx-3">
                        <label class="form-label">Endereço:</label>
                        <input class="form-control" type="text" id="endereco" name="endereco" required>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="text-end pt-5 mx-3">
                        <button class="btn link-body-emphasis " type="submit" name="cadastrar" style="background-color: var(--color-yellow);">Cadastrar</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Início</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
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