<?php 
include_once("controle.php");
$id_usuario = $_POST['id_usuario'];
$sql = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
$result = mysqli_query($conexao, $sql);
if($result == TRUE){
    $dados = mysqli_fetch_assoc($result);
} else {
    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
}


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/pacote.css">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <title>Editar Usuário</title>
</head>
<body>
<?php include_once('cabecalho.php'); ?>
    <main class="container">
        <form method="post" action="">
            <label for="nome">Nome:</label><br>
            <input type="text" id="email" name="nome" value="<?= $dados['nome']; ?>" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?= $dados['email']; ?>"  required><br>
            <label for="senha">Senha:</label><br>
            <input type="password" id="senha" name="senha" required><br>
            <label for="fone">Telefone:</label><br>
            <input type="text" id="fone" name="fone" value="<?= $dados['telefone']; ?>"  required><br>
            <button type="submit" name="login">Acessar</button>
        </form>
    </main>
    <?php include_once('rodape.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>
</html>