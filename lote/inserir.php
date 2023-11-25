<?php 

include 'topo.php';


$muda = $_POST['muda'];
$substrato = $_POST['substrato'];
$dataPlantio = $_POST['dataPlantio'];
$dataColheita = $_POST['dataColheita'];
$quantidade = $_POST['quantidade'];

//inserindo os dados do form na tabela
$query = "INSERT INTO lote(muda, subs, dataPlantio, dataColheita, quantidade) VALUES ( '$muda', '$substrato', '$dataPlantio', '$dataColheita', '$quantidade')";

if ($mysqli->query($query) === TRUE) {
    echo "Dados inseridos com sucesso!";
    header('Location: index.php');
} else {
    echo "Erro na inserção: " . $mysqli->error;
}

$mysqli->close();
?>
