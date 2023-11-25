
<?php
include 'topo.php';

$nomemuda = $_POST['muda'];
$tempProd = $_POST['tempoProd'];

$mysqli->query("INSERT INTO muda (nomemuda, tempProd) VALUES ('$nomemuda', '$tempProd')");

header("Location: index.php");