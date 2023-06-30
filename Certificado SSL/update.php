<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'conexao.php';

if (isset($_POST['submit_update'])) {
    // Obtenha o ID do registro a ser atualizado
    $ID = $_POST['ID'];

    // Obtenha os novos valores dos campos do formulário
    $URL = $_POST['URL'];
    $STATUS = $_POST['STATUS'];
    $DOMINIO = $_POST['DOMINIO'];
    $INICIO = $_POST['INICIO'];
    $FIM = $_POST['FIM'];
    $PROXY = $_POST['PROXY'];
    $OBS = $_POST['OBS'];

    // Atualize os dados no banco de dados
    $query = "UPDATE sites SET URL='$URL', STATUS='$STATUS', DOMINIO='$DOMINIO', INICIO='$INICIO', FIM='$FIM', PROXY='$PROXY', OBS='$OBS' WHERE ID='$ID'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Atualização bem-sucedida
        echo "Dados atualizados com sucesso!";
    } else {
        // Ocorreu um erro ao atualizar os dados no banco de dados
        echo "Erro ao atualizar os dados. Por favor, tente novamente.";
    }
}

// Após a atualização dos dados, obtenha novamente os registros atualizados do banco de dados
$html = getRecordsHTML($conn);
echo $html;

?>
