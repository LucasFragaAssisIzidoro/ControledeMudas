<?php include '../bd/con.php'?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viveiro</title>
    <!-- Adicione a linha abaixo para incluir o Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="muda/index.php"> Registrar Mudas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="substrato/index.php">Registrar Substratos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="muda/filtrar.php"> Filtrar Mudas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="substrato/filtrar.php">Filtrar Substratos</a>
                </li>
            </ul>
        </div>
    </nav>


