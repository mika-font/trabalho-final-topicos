<?php
include_once('controle.php');
if (isset($_GET['buscar'])) {
    $busca = $_GET['buscar'];
    $consulta = "SELECT * FROM instrumento WHERE nome LIKE '%$busca%'";
    $resultConsulta = mysqli_query($conexao, $consulta);
    $busca = mysqli_fetch_assoc($resultConsulta);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Listar Produtos</title>
</head>

<body>
    <?php include_once('cabecalho.php'); ?>
    <main class="container">
        <div class="row m-4">
            <div class="float-left">
                <form method="GET" action="<?= $_SERVER['PHP_SELF']; ?>" class="form-inline">
                    <div class="input-group mt-3 mx-auto shadow" style="width: 35%;">
                        <input class="form-control text-center" name="barra" type="search" aria-label="Search" id="produto" placeholder="Pesquise por um produto">
                        <div class="input-group-append">
                            <button class="btn btn-warning" name="buscar" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="35" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg> Buscar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>