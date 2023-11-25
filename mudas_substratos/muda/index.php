<?php include 'topo.php'?>
<link rel="stylesheet" href="../muda/muda.css">
   
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <form action="inserir.php" method="POST">
                    <div class="editable-boxes">
                        <input type="text" class="editable-box" name="muda" placeholder="Nome da Muda" required >
                        <input type="text" class="editable-box" name="tempoProd" placeholder="Tempo de produção em dias" required >
                    </div>
                    
                    <div class="button-container">
                        <button class="btn btn-primary submit-button" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <div class="square">
                    <?php 
                        $query = "SELECT nomemuda, tempProd FROM muda";
                        $result = $mysqli->query($query);
                        
                        if ($result && $result->num_rows > 0) {
                            foreach ($result as $row) {
                                $linha_formatada = 'Muda: ' . $row['nomemuda'] . ' - Tempo de Producao: ' . $row['tempProd'].' dias';
                                echo '<div class="resultado-item">' . $linha_formatada . '</div>';
                            }
                        } else {
                            echo 'Nenhum resultado encontrado.';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
