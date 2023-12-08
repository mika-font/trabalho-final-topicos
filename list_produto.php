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
        <div class="row">
            <?php if ($_SESSION['tipo'] > 0) { ?>
                <div class="col-xxl-6 col-xl-12">
                    <br>
                    <h4 class="md-3 text-center"><i>Formulário de Cadastro e Edição de Instrumento</i></h4>
                    <form id="form" onsubmit="return salvarInstru(event)" class="py-4">
                        <div class="row">
                            <div class="col-4">
                                <label class="form-label">ID: </label>
                                <input type="number" name="id" class="form-control" readonly>
                            </div>
                            <div class="col-4">
                                <label class="form-label">Nome: </label>
                                <input type="text" name="nome" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label class="form-label">Marca: </label>
                                <input type="text" name="marca" class="form-control" required>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-4">
                                <label class="form-label">Valor: </label>
                                <div class="input-group">
                                    <span class="input-group-text">R$</span>
                                    <input type="text" name="valor" id="valor" class="form-control" placeholder="100,00" required>
                                </div>
                            </div>
                            <div class="col-8">
                                <label class="form-label">Categoria: </label>
                                <input type="text" name="categoria" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Descrição: </label>
                                <input type="text" name="descricao" class="form-control" required>
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning" value="Salvar Instrumento">Salvar Instrumento</button>
                            <button type="reset" class="btn btn-danger" value="Cancelar Instrumento">Cancelar Instrumento</button>
                        </div>
                    </form>
                </div>
            <?php } ?>
            <div class="col-xxl-6 col-xl-12">
                <table class="table table-light table-striped table-hover ">
                    <h4 class="md-3 py-3 text-dark text-center"><i>Lista de Instrumentos</i></h4>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Marca</th>
                            <th>Valor</th>
                            <th>Categoria</th>
                            <th>Descrição</th>
                            <th colspan="2">Opções</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id="instrumentos">
                    </tbody>
                </table>
            </div>
        <main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="./assets/processainstru.js"></script>
</body>

</html>