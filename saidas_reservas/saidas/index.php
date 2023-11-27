<?php include 'topo.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <form action ="inserir.php" method = "POST">
                <div class="mb-3">
                    <label for="destinatario" class="form-label">Destinatário:</label>
                    <input type="text" class="form-control" id="destinatario" name="destinatario" placeholder="Informe o destinatário">
                </div>
                <div class="mb-3">
                    <label for="lote" class="form-label">Selecione o lote:</label>
                    <select id="lote" name="lote" class="form-control">
                        <option value="">Selecione um lote</option> 
                        <?php
                        $result = $mysqli->query("SELECT id_lote, muda, quantidade FROM lote");
                        if ($result) {
                            while ($lote = $result->fetch_object()) {
                                $selected = ($lote->id_lote == $row['id_lote']) ? 'selected' : '';
                                echo '<option value="' . $lote->id_lote . '" ' . $selected . '>Lote: ' . $lote->id_lote . ' - Muda: ' . $lote->muda . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="quantidade" class="form-label">Quantidade de mudas :  <strong><span id="maxQuantidade"></span> </strong></label>
                    <label for=""><strong>NÃO EXCEDA O MAXIMO!</strong></label>
                    <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Informe a quantidade ">
                </div>
                <button type="submit" class="btn btn-primary">Registrar saída</button>
            </form>
        </div>
    </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#lote').change(function() {
            var loteId = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'obtermax.php', 
                data: { lote_id: loteId },
                success: function(response) {

                    var lines = response.split('\n');
                    var lastLine = lines[lines.length - 1];
                    $('#maxQuantidade').text(lastLine.trim());
                }
            });
        });
    });
</script>

