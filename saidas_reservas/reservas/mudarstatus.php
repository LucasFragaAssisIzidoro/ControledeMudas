
<?php 

include 'topo.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mudar_status_confirmado'])) {
    $id_reserva = $_POST['id_reserva'];

    // Query para atualizar o status para 'entregue'
    $stmt = $mysqli->prepare("UPDATE reservas SET status = 'entregue' WHERE id_reserva = ?");
    $stmt->bind_param("i", $id_reserva);

    if ($stmt->execute()) {
        echo "Status alterado para 'entregue' com sucesso!";
        header("Location: index.php");
    } else {
        echo "Erro ao alterar o status: " . $mysqli->error;
    }
    $stmt->close();
    $mysqli->close();
} else {
    exit;
}
?>