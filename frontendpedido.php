<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CRUD de Pedidos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include 'cabecalho.php';
?>
<div class="container mt-5">
    <h2>CRUD de Pedidos</h2>

    <!-- Botão para abrir o formulário de cadastro -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#cadastroModal">
        Novo Pedido
    </button>

    <!-- Tabela para listar os pedidos -->
    <table class="table">
        <thead>
            <tr>
                <th>ID do Pedido</th>
                <th>ID do Usuário</th>
                <th>Data do Pedido</th>
                <th>Status</th>
                <th>Quantidade de Itens</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="pedidos-lista">
            <!-- Conteúdo da lista de pedidos aqui -->
        </tbody>
    </table>
</div>

<!-- Modal de Cadastro -->
<div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="cadastroModalLabel" aria-hidden="true">
    <!-- Conteúdo do formulário de cadastro aqui -->
</div>

<script>
// Funções de manipulação DOM e AJAX aqui
</script>

</body>
</html>
