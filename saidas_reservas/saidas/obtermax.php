<?php include 'topo.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['lote_id'])) {
        $loteId = $_POST['lote_id'];

        $query = "SELECT quantidade FROM lote WHERE id_lote = $loteId";
        $result = $mysqli->query($query);

        if ($result && $result->num_rows > 0) {
            $loteInfo = $result->fetch_assoc();
            $maxQuantidade = $loteInfo['quantidade'];
            echo "(máx: " . $maxQuantidade . ")"; 
        } else {
            echo "(máx: 0)"; 
        }
    }
}

$mysqli->close();
?>