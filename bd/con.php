<?php 

$host = 'localhost'; 
$nome = 'root'; 
$senha = ''; 
$database = 'viveiro'; 


$mysqli = new mysqli($host, $nome, $senha, $database);


if ($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}