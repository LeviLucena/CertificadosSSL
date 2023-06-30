<?php
include 'conexao.php';

// Verifica se o ID foi fornecido na requisição GET
if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];

    // Consulta SQL para obter o registro com base no ID fornecido
    $query = "SELECT * FROM sites WHERE ID='$ID'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Retorna os dados do registro como uma resposta JSON
        $response = array(
            'status' => 'success',
            'data' => $row
        );
        echo json_encode($response);
    } else {
        // Registro não encontrado
        $response = array(
            'status' => 'error',
            'message' => 'Registro não encontrado.'
        );
        echo json_encode($response);
    }
} else {
    // ID não fornecido
    $response = array(
        'status' => 'error',
        'message' => 'ID não fornecido.'
    );
    echo json_encode($response);
}
?>
