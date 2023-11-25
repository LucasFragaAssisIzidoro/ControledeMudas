<?php include 'bd/con.php'?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viveirinho</title>
    <!-- Adicione a linha abaixo para incluir o Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="text-center">

    <div class="container">
        <div class="py-5">
            <h1 class="mb-4">Sistema de Gerenciamento do Viveiro de Mudas</h1>
            
            <a href="lote/index.php" class="btn btn-primary btn-lg mb-3">Registro Lote</a>
            <a href="saidas_reservas/index.php" class="btn btn-primary btn-lg mb-3">Registro de Saídas e Reservas</a>
            <a href="mudas_substratos/index.php" class="btn btn-primary btn-lg mb-3">Registro de Mudas e Substratos</a>
        </div>
    </div>

    <!-- Adicione a linha abaixo para incluir o Bootstrap JS e o jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
