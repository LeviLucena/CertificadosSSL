<!DOCTYPE html>
<html>
<head>
    <title>Certificados SSL - [Wiki SESSP]</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>

</head>
<body class="zoom-90">
<div class="conteudo text-center">
    <img src="https://www.zarphost.com.br/wp-content/uploads/2020/01/certificado-ssl.png" class="imagem">
    <h1>Gerenciamento de Certificados SSL</h1>
</div>

<div class="form-container text-center">
    <h2>Inserir Novo Certificado</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="insert-form" class="form-inline">
        <div class="form-group">
            <label for="URL" class="control-label">URL:</label>
            <input type="text" class="form-control" name="URL" required>
        </div>

        <div class="form-group">
            <label for="STATUS" class="control-label">Status:</label>
            <select class="form-control" name="STATUS" required>
                <option value="" disabled selected>Selecione...</option>
                <option value="Certificado OK">Certificado OK</option>
                <option value="Certificado Inválido">Certificado Inválido</option>
            </select>
        </div>

        <div class="form-group">
            <label for="DOMINIO" class="control-label">Domínio:</label>
            <input type="text" class="form-control" name="DOMINIO" required>
        </div>

        <div class="form-group">
            <label for="INICIO" class="control-label">Data de Início:</label>
            <input type="date" class="form-control" name="INICIO" required>
        </div>

        <div class="form-group">
            <label for="FIM" class="control-label">Data de Término:</label>
            <input type="date" class="form-control" name="FIM" required>
        </div>

        <div class="form-group">
            <label for="PROXY" class="control-label">Proxy:</label>
            <select class="form-control" name="PROXY" required>
                <option value="" disabled selected>Selecione...</option>
                <option value="Local">Local</option>
                <option value="Reverso">Reverso</option>
            </select>
        </div>

        <div class="form-group">
            <label for="OBS" class="control-label">Observações:</label>
            <input type="text" class="form-control" name="OBS">
        </div>

        <button type="submit" name="submit_insert" class="btn btn-primary" onclick="inserirRegistro()">
            <span class="glyphicon glyphicon-plus"></span> Inserir
        </button>

    </form>

    <h2>Registros</h2>
    <table class="form-group">
        <thead>
        <tr>
            <th>ID</th>
            <th>URL</th>
            <th>Status</th>
            <th>Domínio</th>
            <th>Início</th>
            <th>Término</th>
            <th>Proxy</th>
            <th>Observações</th>
            <th>Ações</th>
        </tr>
        <tr id="filter-row">
            <th></th>
            <th><input type="text" id="filter-URL" placeholder="Filtrar URL"></th>
            <th><input type="text" id="filter-STATUS" placeholder="Filtrar Status"></th>
            <th><input type="text" id="filter-DOMINIO" placeholder="Filtrar Domínio"></th>
            <th><input type="text" id="filter-INICIO" placeholder="Filtrar Início"></th>
            <th><input type="text" id="filter-FIM" placeholder="Filtrar Término"></th>
            <th><input type="text" id="filter-PROXY" placeholder="Filtrar Proxy"></th>
            <th><input type="text" id="filter-OBS" placeholder="Filtrar Observações"></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Configurações de conexão com o banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "certificado";

        // Cria a conexão com o banco de dados
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica se ocorreu algum erro na conexão
        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Função para obter os registros do banco de dados e retornar a tabela HTML
        function getRecordsHTML($conn)
        {
            $query = "SELECT * FROM sites";
            $result = $conn->query($query);

            // Variável para controlar a alternância das cores das linhas
            $rowColor = false;

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Verificar se a cor da linha deve ser cinza ou branca
                    $rowClass = $rowColor ? 'gray-row' : 'white-row';

                    echo "<tr class='" . $rowClass . "'>";
                    echo "<td class='text-left'>" . $row["ID"] . "</td>";
                    echo "<td class='text-left'>" . $row["URL"] . "</td>";
                    echo "<td class='text-left'>" . $row["STATUS"] . "</td>";
                    echo "<td class='text-left'>" . $row["DOMINIO"] . "</td>";
                    echo "<td class='text-left'>" . formatDate($row["INICIO"]) . "</td>";
                    echo "<td class='text-left'>" . formatDate($row["FIM"]) . "</td>";

                    // Verifica se a chave "proxy" existe no array $row
                    if (isset($row["PROXY"])) {
                        echo "<td class='text-left'>" . $row["PROXY"] . "</td>";
                    } else {
                        echo "<td>N/A</td>"; // Ou qualquer outra mensagem que você desejar exibir
                    }

                    echo "<td class='text-left'>" . $row["OBS"] . "</td>";
                    echo "<td>";
                    echo "<button class='btn btn-primary btn-sm' onclick='editRecord(" . $row['ID'] . ")'>";
                    echo "<span class='glyphicon glyphicon-pencil'></span> Editar";
                    echo "</button>";
                    echo "<button class='btn btn-danger btn-sm' onclick='deleteRecord(" . $row['ID'] . ")'>";
                    echo "<span class='glyphicon glyphicon-trash'></span> Apagar";
                    echo "</button>";
                    echo "</td>";
                    echo "</tr>";

                    // Alterna a cor da próxima linha
                    $rowColor = !$rowColor;
                }
            } else {
                echo "<tr><td colspan='9'>Nenhum registro encontrado.</td></tr>";
            }
            
        }

    function formatDate($date)
    {
        return date("d/m/Y", strtotime($date));
    }

        // Exibe a tabela de registros
        getRecordsHTML($conn);

        if (isset($_POST['submit_insert'])) {
            // Insira os dados no banco de dados usando o arquivo insert.php
            include_once("insert.php");

            // Redirecione de volta para a página index.php
            header("Location: index.php");
            exit();
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
        ?>
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Capturar o formulário de inserção
        var form = document.getElementById('insert-form');

        // Adicionar um ouvinte de evento para o evento de envio do formulário
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Impedir o envio do formulário padrão

            // Obter os dados do formulário
            var formData = new FormData(form);

            // Enviar uma requisição AJAX para o arquivo insert.php
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'insert.php', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Se a inserção for bem-sucedida, atualizar a página
                    location.reload();
                }
            };
            xhr.send(formData);
        });
    });
    
</script>

<div class=" form-container">Desenvolvido por Levi Lucena - linkedin.com/in/levilucena</div>

</body>
</html>
