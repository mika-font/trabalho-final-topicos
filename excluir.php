<?php
include_once("conectar.php");
$conectar = conectar();

$id = $_GET['id'];
$sql = "DELETE FROM instrumento WHERE id = $id";
$resultado = mysqli_query($conectar, $sql);

if($resultado == true){
    echo '{"id":"' . $id . '"}';
} else {
    die("Erro ao deletar um instrumento" . mysqli_errno($conectar) . ": " . mysqli_error($conectar));
}

?>