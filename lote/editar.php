<?php 


include 'topo.php';
var_dump($_POST);

$idlote = $_POST['idlote'];
$muda = $_POST['muda'];
$substrato = $_POST['subs'];
$dataPlantio = $_POST['dataPlantio'];
$dataColheita = $_POST['dataColheita'];
$quantidade = $_POST['quantidade'];


$query = "UPDATE lote SET 
            muda = '$muda', 
            subs = '$substrato', 
            dataPlantio = '$dataPlantio', 
            dataColheita = '$dataColheita', 
            quantidade = '$quantidade' 
          WHERE id_lote = '$idlote'";

if ($mysqli->query($query) === TRUE) {
    echo "Dados atualizados com sucesso!";
   
    header('Location: index.php');
} else {
    echo "Erro na atualização: " . $mysqli->error;
}

$mysqli->close();
?>