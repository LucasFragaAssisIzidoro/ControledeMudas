<?php
include 'topo.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destinatario = $_POST['destinatario'];
    $loteId = $_POST['lote'];
    $quantidade = $_POST['quantidade'];
    $status = "pendente";
    $consultaLote = $mysqli->query("SELECT quantidade FROM lote WHERE id_lote = $loteId");
    $lote = $consultaLote->fetch_assoc();
    $quantidadeAtual = $lote['quantidade'];

    if ($quantidade <= $quantidadeAtual) {
        $novaQuantidade = $quantidadeAtual - $quantidade;
        $stmtUpdate = $mysqli->prepare("UPDATE lote SET quantidade = ? WHERE id_lote = ?");
        $stmtUpdate->bind_param("ii", $novaQuantidade, $loteId);

        $mysqli->begin_transaction();
        $stmtUpdate->execute();

        if ($stmtUpdate->affected_rows > 0) {
            $mysqli->commit();
            echo "Quantidade atualizada com sucesso!";
        } else {
            $mysqli->rollback();
            echo "Erro ao atualizar a quantidade do lote: " . $mysqli->error;
        }

        $stmtUpdate->close();
    } else {
        echo "Quantidade insuficiente no estoque!";
    }

    $mysqli->close();
} else {
    header("Location: index.php");
    exit;
}
?>

