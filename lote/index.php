<?php include 'topo.php';?>


<body>
<div class="container mt-4">
  <div class="row">
    <div class="col-md-6">
      <form method="post" action="inserir.php">
        <div class="form-group editable-boxes">
          <div class="form-row">
            <div class="col">
              <select id="muda" name="muda" class="form-control">
              <option value="" disabled selected>Selecione a muda</option>
                <?php
                $result = $mysqli->query("SELECT nomemuda FROM muda");
                if ($result) {
                  while ($nome = $result->fetch_object()) {
                    echo '<option value="' . $nome->nomemuda . '">' . $nome->nomemuda . '</option>';
                  }
                  $result->close();
                }
                ?>
              </select>
            </div>
            <div class="col">
            <select id="substrato" name="substrato" class="form-control">
            <option value="" disabled selected>Selecione o substrato</option>
                <?php
                $result = $mysqli->query("SELECT nomesubs FROM substrato");
                if ($result) {
                  while ($nome = $result->fetch_object()) {
                    echo '<option value="' . $nome->nomesubs . '">' . $nome->nomesubs . '</option>';
                  }
                  $result->close();
                }
                ?>
              </select>
            </div>
          </div>
          <label for="dataPlantio" class="Label">Data Plantio:</label>
          <input type="date" id="dataPlantio" name="dataPlantio" class="form-control editable-box" placeholder="Data do Plantio">
          <label for="dataColheita" class="Label">Data Finalização:</label>
          <input type="date" name="dataColheita" id="dataColheita" class="form-control editable-box" placeholder="Data Colheita">
          <label for="quantidade" class="Label">Quantidade:</label>
          <input type="number" name="quantidade" id="quantidade" class="form-control editable-box" placeholder="Quantidade">
        </div>

        <div class="form-group button-container">
          <button type="submit" class="btn btn-primary submit-button">Enviar</button>
          <button class="btn btn-secondary clear-button">Limpar</button>
        </div>
      </form>
    </div>

    <div class="col-md-6">
      <div class="square">
        <?php
        $query = "SELECT id_lote, muda, subs, dataPlantio, dataColheita, quantidade FROM lote";
        $result = $mysqli->query($query);

         if ($result && $result->num_rows > 0): ?>
            <div class="resultado-container">
                <?php foreach ($result as $row): ?>
                    <div class="resultado-item">
                        <?php
                        $linha_formatada = 'Lote: ' . $row['id_lote'] . '-' . $row['muda'] . '-SUBS: ' . $row['subs'] . '-PLAN: ' . $row['dataPlantio'];
                        echo $linha_formatada;
                        ?>
                        <div class="btn-group ml-2">
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editarModal<?= $row['id_lote'] ?>">Editar</button>
                        </div>
                        <div class="btn-group ml-2">
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#excluirModal<?= $row['id_lote'] ?>">Excluir</button>
                        </div>
                    </div>
        
                  
                    <div class="modal fade" id="editarModal<?= $row['id_lote'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Lote</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form method="post" action="editar.php">
                                    <div class="form-group editable-boxes">
                                    <div class="form-row">
                                        <div class="col">
                                        <select id="muda" name="muda" class="form-control">
                                            <option value="" disabled><?= $row['muda'] ?></option>
                                            <?php
                                            $result = $mysqli->query("SELECT nomemuda FROM muda");
                                            if ($result) {
                                                while ($nome = $result->fetch_object()) {
                                                    $selected = ($nome->nomemuda == $row['muda']) ? 'selected' : '';
                                                    echo '<option value="' . $nome->nomemuda . '" ' . $selected . '>' . $nome->nomemuda . '</option>';
                                                }
                                                $result->close();
                                            }
                                            ?>
                                        </select>
                                        </div>

                                        <div class="col">
                                        <select id="subs" name="subs" class="form-control">
                                            <option value="" disabled><?= $row['subs'] ?></option>
                                            <?php
                                            $result = $mysqli->query("SELECT nomesubs FROM substrato");
                                            if ($result) {
                                                while ($nome = $result->fetch_object()) {
                                                    $selected = ($nome->nomesubs == $row['subs']) ? 'selected' : '';
                                                    echo '<option value="' . $nome->nomesubs . '" ' . $selected . '>' . $nome->nomesubs . '</option>';
                                                }
                                                $result->close();
                                            }
                                            ?>
                                        </select>
                                        </div>
                                    </div>
                                    <label for="dataPlantio" class="Label">Data Plantio:</label>
                                    <input type="date" id="dataPlantio" name="dataPlantio" class="form-control editable-box" placeholder="Data do Plantio" value="<?= $row['dataPlantio'] ?>">
                                    <label for="dataColheita" class="Label">Data Finalização:</label>
                                    <input type="date" name="dataColheita" id="dataColheita" class="form-control editable-box" placeholder="Data Colheita" value="<?= $row['dataColheita'] ?>">
                                    <label for="quantidade" class="Label">Quantidade:</label>
                                    <input type="number" name="quantidade" id="quantidade" class="form-control editable-box" placeholder="Quantidade" value="<?= $row['quantidade'] ?>">
                                    </div>
                                    <input type="hidden" name="idlote" value="<?= $row['id_lote'] ?>">
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                </div>
                            </form>
                            </div> 
                        </div>
                    </div>
                    </div>
        
                    
                    <div class="modal fade" id="excluirModal<?= $row['id_lote'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Excluir Lote</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Tem certeza de que deseja excluir este lote?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="excluir.php" method="post">
                                        <input type="hidden" name="idlote" value="<?=$row['id_lote']?>">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                </div>
                             </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="resultado-item">Nenhum resultado encontrado.</div>
        <?php endif; ?>
    
        
      </div>
    </div>
  </div>
</div>