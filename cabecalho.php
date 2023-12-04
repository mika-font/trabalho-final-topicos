<?php if (isset($_SESSION['id_usuario'])) { ?>
    <div class="row">
        <div class="col-xl-12">
            <header>
                <nav class="navbar navbar-expand-sm" style="background-color: var(--color-yellow);">
                    <div class="container border-bottom p-1 mb-2">
                        <a href="index.php" class="text-light link-body-emphasis text-decoration-none"><img class="navbar-brand me-3" src="./assets/img-system/logo_trans.png" width="50" height="auto">Início</a>
                        <ul class="navbar-nav text-end">
                            <li class="nav-item"><a class="nav-link link-body-emphasis text-light" href="cad_user.php">Cadastre-se</a></li>
                        </ul>
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
                        <a href="index.php" class="text-light link-body-emphasis text-decoration-none"><img class="navbar-brand me-3" src="./assets/img-system/logo_trans.png" width="50" height="auto">Início</a>
                        <ul class="navbar-nav text-end">
                            <li class="nav-item"><a class="nav-link link-body-emphasis text-light" href="cad_user.php">Cadastre-se</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
        </div>
    </div>
<?php } ?>