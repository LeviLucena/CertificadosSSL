<?php
$servername = "localhost"; // nome do servidor
$username = "root"; // nome de usuário do banco de dados
$password = ""; // senha do banco de dados
$dbname = "certificado"; // nome do banco de dados

// Estabelece a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi estabelecida corretamente
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Função para formatar a data no formato dd/mm/aaaa
function formatDate($date) {
    $formattedDate = date("d/m/Y", strtotime($date));
    return $formattedDate;
}

// Função para obter registros do banco de dados e retornar o HTML da tabela
function getRecordsHTML($conn) {
    $html = "";
    $sql = "SELECT * FROM sites";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= "<tr class='table-row'>";
            $html .= "<td>" . $row['ID'] . "</td>";
            $html .= "<td>" . $row['URL'] . "</td>";
            $html .= "<td>" . $row['STATUS'] . "</td>";
            $html .= "<td>" . $row['DOMINIO'] . "</td>";
            $html .= "<td>" . date_format(date_create($row['INICIO']), 'd/m/Y') . "</td>";
            $html .= "<td>" . date_format(date_create($row['FIM']), 'd/m/Y') . "</td>";
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
    }
    return $html;
}

?>
