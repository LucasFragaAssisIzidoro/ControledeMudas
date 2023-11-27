<?php
include "topo.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['termo'])) {
    $termo = $_POST['termo'];
    $query = "SELECT * FROM substrato WHERE nomesubs LIKE '%$termo%'";
    $result = $mysqli->query($query);

    if ($result) {
        $output = ''; 
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $output .= "<p>" . $row['nomesubs'] . "</p>"; 
            }
        } else {
            $output = "<p>Nenhum resultado encontrado.</p>";
        }
        echo $output; 
    } else {
        echo "Erro na consulta: " . $mysqli->error;
    }
    exit(); 
}
?>

<div class="container mt-5"> 
    <div class="row mt-3">
        <div class="col-md-6">
            <form method="post" action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Pesquisar" name="termo" id="termo">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h4>Resultados da pesquisa:</h4>
            <div id="resultados">
            
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#termo').on('input', function() {
        var termoPesquisa = $(this).val();
        $.ajax({
            method: 'POST',
            url: '', 
            data: { termo: termoPesquisa },
            success: function(response) {
                var $temp = $('<div>').append(response); 
                var paragraphs = $temp.find('p').map(function() {
                    return $(this).text();
                }).get(); 
                var paragraphsWithBreaks = paragraphs.join('<br>'); 
                $('#resultados').html(paragraphsWithBreaks); 
            },
            error: function(xhr, status, error) {
                console.error(status + ": " + error);
            }
        });
    });
});

</script>

</body>
</html>
