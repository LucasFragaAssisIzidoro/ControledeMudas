
<?php
include 'topo.php';

$nomesubs = $_POST['subs'];


$mysqli->query("INSERT INTO substrato (nomesubs) VALUES ('$nomesubs')");

header("Location: index.php");