<?php include 'topo.php'; ?>

<div class="container mt-5">
    <h2>Pesquisa de Colheita</h2>
    <p>A data de colheita estará entre:</p>
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="">
                <div class="form-group">
                    <label for="dataInicio">Data de Início:</label>
                    <input type="date" class="form-control" id="dataInicio" name="dataInicio">
                </div>
                <div class="form-group">
                    <label for="dataFim">Data de Fim:</label>
                    <input type="date" class="form-control" id="dataFim" name="dataFim">
                </div>
                <div class="form-group">
                    <label for="nome">Muda:</label>
                    <select id="muda" name="muda" class="form-control">
                        <?php
                        $result = $mysqli->query("SELECT muda FROM lote");
                        if ($result) {
                            echo '<option value=""' . (empty($row['muda']) ? ' selected' : '') . '>Deixar em Branco</option>';
                            
                            while ($nome = $result->fetch_object()) {
                                $selected = ($nome->muda == $row['muda']) ? 'selected' : '';
                                echo '<option value="' . $nome->muda . '" ' . $selected . '>' . $nome->muda . '</option>';
                            }
                            $result->close();
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </form>
        </div>
        <div class="col-md-6">
            <div class="resultados">
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $dataInicio = $_POST['dataInicio'];
                        $dataFim = $_POST['dataFim'];
                        $nome = $_POST['muda'];
                
                        $sql = "SELECT * FROM lote WHERE 1=1"; 
                        if (!empty($dataInicio) && !empty($dataFim)) {
                            $sql .= " AND dataColheita BETWEEN '$dataInicio' AND '$dataFim'";
                        }
                
                        if (!empty($nome)) {
                            $sql .= " AND muda LIKE '%$nome%'";
                        }
                
                        $result = $mysqli->query($sql);

                    if ($result) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "Lote: " . $row["id_lote"] . " - Muda: " . $row["muda"] . " - Data Plantio: " . $row["dataPlantio"] . " - Data Colheita: " . $row["dataColheita"] . "<br>";
                            }
                        } else {
                            echo "Nenhum resultado encontrado.";
                        }
                    } else {
                        echo "Erro na consulta: " . $mysqli->error;
                    }
                    }
                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>
