<?php if (isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == 2 || $_SESSION['tipo'] == 1) { ?>
    <div class="row">
        <div class="col-xl-12">
            <header>
                <nav class="navbar navbar-expand-sm" style="background-color: var(--color-yellow);">
                    <div class="container border-bottom p-1 mb-2">
                        <a href="central.php" class="text-light link-body-emphasis text-decoration-none"><img class="navbar-brand me-3" src="./assets/img-system/logo_trans.png" width="30" height="auto">Central</a>
                        <ul class="navbar-nav text-end">
                            <li class="nav-item"><a class="nav-link link-body-emphasis text-light" href="list_produto.php">Produtos </a></li>
                            <li class="nav-item"><a class="nav-link link-body-emphasis text-light" href="carrinho.php">Carrinho </a></li>
                        </ul>
                        <div class="dropdown">
                            <a class="d-block link-body-emphasis text-decoration-none dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false">Conta</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="edit_user.php?id_usuario=<?= $_SESSION['id_usuario']; ?>">Editar Conta</a></li>
                                <li><a class="dropdown-item" href="processa_usuario.php?excluir=<?= $_SESSION['id_usuario']; ?>">Excluir Conta</a></li>
                                <?php if($_SESSION['tipo'] == 2){?><li><a class="dropdown-item" href="list_user.php">Usuários do Sistema</a></li><?php } ?>
                                <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
        </div>
    </div>
<?php } else if (isset($_SESSION['id_usuario']) && $_SESSION['tipo'] == 0) { ?>
    <div class="row">
        <div class="col-xl-12">
            <header>
                <nav class="navbar navbar-expand-sm" style="background-color: var(--color-yellow);">
                    <div class="container border-bottom p-1 mb-2">
                        <a href="central.php" class="text-light link-body-emphasis text-decoration-none"><img class="navbar-brand me-3" src="./assets/img-system/logo_trans.png" width="30" height="auto">Central</a>
                        <ul class="navbar-nav text-end">
                            <li class="nav-item"><a class="nav-link link-body-emphasis text-light" href="list_produto.php">Produtos</a></li>
                            <li class="nav-item"><a class="nav-link link-body-emphasis text-light" href="carrinho.php">Carrinho </a></li>
                        </ul>
                        <div class="dropdown">
                            <a class="d-block link-body-emphasis text-decoration-none dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false">Conta</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="edit_user.php?id_usuario=<?= $_SESSION['id_usuario']; ?>">Editar Conta</a></li>
                                <li><a class="dropdown-item" href="processa_usuario.php?excluir=<?= $_SESSION['id_usuario']; ?>">Excluir Conta</a></li>
                                <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                            </ul>
                        </div>

                    </div>
                </nav>
            </header>
        </div>
    </div>
<?php } else { ?>
    <div class="row">
        <div class="col-xl-12">
            <header>
                <nav class="navbar navbar-expand-sm" style="background-color: var(--color-yellow);">
                    <div class="container border-bottom p-1 mb-2">
                        <a href="index.php" class="text-light link-body-emphasis text-decoration-none"><img class="navbar-brand me-3" src="./assets/img-system/logo_trans.png" width="30" height="auto">Início</a>
                        <ul class="navbar-nav text-end">
                            <li class="nav-item"><a class="nav-link link-body-emphasis text-light" href="cad_user.php">Cadastre-se</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
        </div>
    </div>
<?php } ?>