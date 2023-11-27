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
                <button type="submit" class="btn btn-primary">Reservar</button>
            </form>
        </div>
        <div class="col-md-6">
            <div class="resultado mt-3 p-3 border">
            <?php 
                $query = "SELECT status, id_reserva, destinatario, id_lote, quantidade FROM reservas WHERE status = 'pendente'";
                $result = $mysqli->query($query);
                        
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="resultado-item">';
                        echo 'Lote: ' . $row['id_lote'] . ' - Destinatário: ' . $row['destinatario'] . ' - Qtde de Mudas: ' . $row['quantidade'] . ' - Status: ' . $row['status'];
                        echo '<form method="post" action="">';
                        echo '<input type="hidden" name="id_reserva" value="' . $row['id_reserva'] . '">';
                        echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmarModal' . $row['id_reserva'] . '">';
                        echo 'Mudar Status';
                        echo '</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '<div class="modal fade" id="confirmarModal' . $row['id_reserva'] . '" tabindex="-1" role="dialog" aria-labelledby="confirmarModalLabel' . $row['id_reserva'] . '" aria-hidden="true">';
                        echo '<div class="modal-dialog" role="document">';
                        echo '<div class="modal-content">';
                        echo '<div class="modal-header">';
                        echo '<h5 class="modal-title" id="confirmarModalLabel' . $row['id_reserva'] . '">Confirmar Mudança de Status</h5>';
                        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">';
                        echo '<span aria-hidden="true">&times;</span>';
                        echo '</button>';
                        echo '</div>';
                        echo '<div class="modal-body">';
                        echo 'Tem certeza que deseja mudar o status de pendente para entregue?';
                        echo '</div>';
                        echo '<div class="modal-footer">';
                        echo '<form method="post" action="mudarstatus.php">';
                        echo '<input type="hidden" name="id_reserva" value="' . $row['id_reserva'] . '">';
                        echo '<button type="submit" name="mudar_status_confirmado" class="btn btn-primary">Sim</button>';
                        echo '</form>';
                        echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo 'Nenhuma reserva encontrada.';
                }
            ?>
            <div class="modal fade" id="confirmarModal<?= $row['id_reserva']; ?>" tabindex="-1" role="dialog" aria-labelledby="confirmarModalLabel<?= $row['id_reserva']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmarModalLabel<?= $row['id_reserva']; ?>">Confirmar Mudança de Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja mudar o status de pendente para entregue?
                </div>
                <div class="modal-footer">
                    <form method="post" action="">
                        <input type="hidden" name="id_reserva" value="<?= $row['id_reserva']; ?>">
                        <button type="submit" name="mudar_status_confirmado" class="btn btn-primary">Sim</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                </div>
            </div>
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

