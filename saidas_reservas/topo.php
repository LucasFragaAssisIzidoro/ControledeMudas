<?php include 'topo.php'?>
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
        <a class="navbar-brand" href="#">Sistema de Mudas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Página Inicial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mudas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Substrato</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="py-5">
            <h1 class="mb-4">Sistema de Gerenciamento do Viveiro de Mudas</h1>
            
            <a href="PaginaLOTE-RECIPIENTE/intermediarias/Pagina-inter-Lote.php" class="btn btn-primary btn-lg mb-3">Página Lote</a>
            <a href="PaginaSaidasReservas/Pagina-inter-Desti.php" class="btn btn-danger btn-lg mb-3">Página Destino</a>
            <a href="PaginaMudas-Substrato/Pagina-inter-Mudas.php" class="btn btn-warning btn-lg mb-3">Página Mudas</a>
        </div>
    </div>

    <!-- Adicione a linha abaixo para incluir o Bootstrap JS e o jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
