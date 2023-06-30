<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'conexao.php';

if (isset($_POST['submit_insert'])) {
    // Obtenha os valores dos campos do formulário
    $URL = $_POST['URL'];
    $STATUS = $_POST['STATUS'];
    $DOMINIO = $_POST['DOMINIO'];
    $INICIO = $_POST['INICIO'];
    $FIM = $_POST['FIM'];
    $PROXY = $_POST['PROXY'];
    $OBS = $_POST['OBS'];

    // Insira o código para salvar os dados no banco de dados aqui
    $query = "INSERT INTO sites (URL, STATUS, DOMINIO, INICIO, FIM, PROXY, OBS) VALUES ('$URL', '$STATUS', '$DOMINIO', '$INICIO', '$FIM', '$PROXY', '$OBS')";
    $result = mysqli_query($conn, $query);
  
    if ($result) {
        // Inserção bem-sucedida
        echo "Dados inseridos com sucesso!";
    } else {
        // Ocorreu um erro ao inserir os dados no banco de dados
        echo "Erro ao inserir os dados. Por favor, tente novamente.";
    }
}

// Após salvar os dados, obtenha novamente os registros atualizados do banco de dados
$html = getRecordsHTML($conn);
echo $html;

// Função para obter registros do banco de dados e retornar o HTML da tabela
function getRecordsHTML($conn) {
    $html = "";
    $sql = "SELECT * FROM sites";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= "<tr>";
            $html .= "<td>" . $row['ID'] . "</td>";
            $html .= "<td>" . $row['URL'] . "</td>";
            $html .= "<td>" . $row['STATUS'] . "</td>";
            $html .= "<td>" . $row['DOMINIO'] . "</td>";
            $html .= "<td>" . $row['INICIO'] . "</td>";
            $html .= "<td>" . $row['FIM'] . "</td>";
            $html .= "<td>" . $row['PROXY'] . "</td>";
            $html .= "<td>" . $row['OBS'] . "</td>";
            $html .= "<td>";
            $html .= "<button class='btn btn-primary btn-sm' onclick='editRecord(" . $row['ID'] . ")'>";
            $html .= "<span class='glyphicon glyphicon-pencil'></span> Editar";
            $html .= "</button>";
            $html .= "<button class='btn btn-danger btn-sm' onclick='deleteRecord(" . $row['ID'] . ")'>";
            $html .= "<span class='glyphicon glyphicon-trash'></span> Apagar";
            $html .= "</button>";
            $html .= "</td>";
            $html .= "</tr>";
        }
    } else {
        $html .= "<tr><td colspan='9'>Nenhum registro encontrado.</td></tr>";
    }
    return $html;
}
?>
