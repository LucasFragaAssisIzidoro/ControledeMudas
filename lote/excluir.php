<?php 


include 'topo.php';

$idlote = $_POST['idlote'];

$query = "DELETE FROM lote WHERE id_lote = '$idlote'";

if ($mysqli->query($query) === TRUE) {
    echo "Dados removidos com sucesso!";
    header('Location: index.php');
} else {
    echo "Erro na inserção: " . $mysqli->error;
}

$mysqli->close();
?>

