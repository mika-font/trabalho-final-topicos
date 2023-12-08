<?php
include_once ("conectar.php");
$conexao = conectar();

$sql = "SELECT * FROM instrumento ORDER BY id ASC";
$resultado = mysqli_query($conexao, $sql);

if($resultado == true){
    $instrumentos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    echo json_encode($instrumentos);
} else {
    die("Erro ao listar" . mysqli_errno($conexao) . ": " . mysqli_error($conexao));
}
