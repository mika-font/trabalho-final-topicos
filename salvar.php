<?php
include_once ("conectar.php");
$conexao = conectar();
$instru = json_decode(file_get_contents("php://input"));

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sql = "INSERT INTO instrumento (nome, marca, valor, categoria, descricao) VALUES ('$instru->nome', '$instru->marca', '$instru->valor', '$instru->categoria', '$instru->descricao')";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado == true) {
        $instru->id = mysqli_insert_id($conexao); 
        echo json_encode($instru);
    } else {
        die("Problemas ao inserir um instrumento. Erro: " . mysqli_errno($conexao) . " " . mysqli_error($conexao));
    }
} else if ($_SERVER['REQUEST_METHOD'] == "PUT"){
    $sql = "UPDATE instrumento SET nome='$instru->nome', marca='$instru->marca', valor='$instru->valor', categoria='$instru->categoria', descricao='$instru->descricao' WHERE id ='$instru->id'";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado == true) {
        echo json_encode($instru);
    } else {
        die("Problemas ao alterar um instrumento. Erro: " . mysqli_errno($conexao) . " " . mysqli_error($conexao));
    }
}