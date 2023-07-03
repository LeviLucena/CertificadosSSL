<!DOCTYPE html>
<html>
<head>
    <title>[Wiki SESSP] - Editar Certificado SSL</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
<body>

<div class="form-container text-center">
    <h2>Editar Registro</h2>
    <form method="POST" action="update.php" id="edit-form" class="form-inline">
        <input type="hidden" name="ID" id="ID" value="">
        <div class="form-group">
            <label for="URL" class="control-label">URL:</label>
            <input type="text" class="form-control" name="URL" id="URL" required>
        </div>

        <div class="form-group">
            <label for="STATUS" class="control-label">Status:</label>
            <select class="form-control" name="STATUS" id="STATUS" required>
                <option value="" disabled selected>Selecione...</option>
                <option value="Certificado OK">Certificado OK</option>
                <option value="Certificado Inválido">Certificado Inválido</option>
            </select>
        </div>

        <div class="form-group">
            <label for="DOMINIO" class="control-label">Domínio:</label>
            <input type="text" class="form-control" name="DOMINIO" id="DOMINIO" required>
        </div>

        <div class="form-group">
            <label for="INICIO" class="control-label">Data de Início:</label>
            <input type="date" class="form-control" name="INICIO" id="INICIO" required>
        </div>

        <div class="form-group">
            <label for="FIM" class="control-label">Data de Término:</label>
            <input type="date" class="form-control" name="FIM" id="FIM" required>
        </div>

        <div class="form-group">
            <label for="PROXY" class="control-label">Proxy:</label>
            <select class="form-control" name="PROXY" id="PROXY" required>
                <option value="" disabled selected>Selecione...</option>
                <option value="Local">Local</option>
                <option value="Reverso">Reverso</option>
            </select>
        </div>

        <div class="form-group">
        <label for="OBS" class="control-label">Observações:</label>
            <input type="text" class="form-control" name="OBS id="OBS">
        </div>

        <button type="submit" name="submit_update" class="btn btn-primary" onclick="updateRecord()">
            <span class="glyphicon glyphicon-floppy-disk"></span> Atualizar
        </button>
    </form>
</div>

<script>
    $(document).ready(function() {
        // Função para carregar os dados do registro
        function loadRecord(ID) {
            $.ajax({
                url: 'get_record.php',
                type: 'GET',
                data: {ID: ID},
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        var record = response.data;
                        $('#ID').val(record.ID);
                        $('#URL').val(record.URL);
                        $('#STATUS').val(record.STATUS);
                        $('#DOMINIO').val(record.DOMINIO);
                        $('#INICIO').val(record.INICIO);
                        $('#FIM').val(record.FIM);
                        $('#PROXY').val(record.PROXY);
                        $('#OBS').val(record.OBS);
                    } else {
                        alert('Falha ao carregar o registro.');
                    }
                },
                error: function() {
                    alert('Erro de comunicação com o servidor.');
                }
            });
            
        }

        // Função para obter o ID do registro a ser editado
        function editRecord(ID) {
            loadRecord(ID);
        }

        // Obter o ID do registro a ser editado a partir da URL
        var urlParams = new URLSearchParams(window.location.search);
        var ID = urlParams.get('ID');

        // Carregar os dados do registro
        if (ID) {
            loadRecord(ID);
        }
    });

</script>  


</body>
</html>
