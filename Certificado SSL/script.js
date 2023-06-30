$(document).ready(function() {
    // Captura os elementos de filtro
    var $filterURL = $('#filter-URL');
    var $filterStatus = $('#filter-STATUS');
    var $filterDOMINIO = $('#filter-DOMINIO');
    var $filterInicio = $('#filter-INICIO');
    var $filterFim = $('#filter-FIM');
    var $filterProxy = $('#filter-PROXY');
    var $filterObs = $('#filter-OBS');

    // Captura as linhas da tabela
    var $rows = $('tbody tr');

    // Evento de digitação nos campos de filtro
    $filterURL.on('input', filterTable);
    $filterStatus.on('input', filterTable);
    $filterDOMINIO.on('input', filterTable);
    $filterInicio.on('input', filterTable);
    $filterFim.on('input', filterTable);
    $filterProxy.on('input', filterTable);
    $filterObs.on('input', filterTable);

    // Função para filtrar a tabela
    function filterTable() {
        var URLFilter = $filterURL.val().toLowerCase();
        var statusFilter = $filterStatus.val().toLowerCase();
        var DOMINIOFilter = $filterDOMINIO.val().toLowerCase();
        var inicioFilter = $filterInicio.val().toLowerCase();
        var fimFilter = $filterFim.val().toLowerCase();
        var proxyFilter = $filterProxy.val().toLowerCase();
        var obsFilter = $filterObs.val().toLowerCase();

        $rows.each(function() {
            var $row = $(this);
            var URLValue = $row.find('td:nth-child(2)').text().toLowerCase();
            var statusValue = $row.find('td:nth-child(3)').text().toLowerCase();
            var DOMINIOValue = $row.find('td:nth-child(4)').text().toLowerCase();
            var inicioValue = $row.find('td:nth-child(5)').text().toLowerCase();
            var fimValue = $row.find('td:nth-child(6)').text().toLowerCase();
            var proxyValue = $row.find('td:nth-child(7)').text().toLowerCase();
            var obsValue = $row.find('td:nth-child(8)').text().toLowerCase();

            if (URLValue.indexOf(URLFilter) > -1 &&
                statusValue.indexOf(statusFilter) > -1 &&
                DOMINIOValue.indexOf(DOMINIOFilter) > -1 &&
                inicioValue.indexOf(inicioFilter) > -1 &&
                fimValue.indexOf(fimFilter) > -1 &&
                proxyValue.indexOf(proxyFilter) > -1 &&
                obsValue.indexOf(obsFilter) > -1) {
                $row.show();
            } else {
                $row.hide();
            }
        });
    }
});


function inserirRegistro() {
    // Obtenha os valores dos campos do formulário
    var URL = document.getElementById("URL").value;
    var STATUS = document.getElementById("STATUS").value;
    var DOMINIO = document.getElementById("DOMINIO").value;
    var INICIO = document.getElementById("INICIO").value;
    var FIM = document.getElementById("FIM").value;
    var PROXY = document.getElementById("PROXY").value;
    var OBS = document.getElementById("OBS").value;

    // Crie um objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Defina a URL e o método da requisição
    var url = "insert.php";
    var method = "POST";

    // Defina a função de callback para tratar a resposta da requisição
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Sucesso na requisição
            console.log(xhr.responseText); // Exemplo: exibe a resposta no console
            // Outras ações que você deseja realizar após a inserção dos dados.
        } else {
            // Erro na requisição
            console.log("Erro na requisição. Status: " + xhr.status);
        }
    };

    // Prepare os dados a serem enviados
    var data = "URL=" + encodeURIComponent(URL) + "&STATUS=" + encodeURIComponent(STATUS) + "&DOMINIO=" + encodeURIComponent(DOMINIO) + "&INICIO=" + encodeURIComponent(INICIO) + "&FIM=" + encodeURIComponent(FIM) + "&PROXY=" + encodeURIComponent(PROXY) + "&OBS=" + encodeURIComponent(OBS);

    // Envie a requisição
    xhr.open(method, url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(data);

    // Após enviar os dados, você pode limpar os campos do formulário
    document.getElementById("URL").value = "";
    document.getElementById("STATUS").value = "";
    document.getElementById("DOMINIO").value = "";
    document.getElementById("INICIO").value = "";
    document.getElementById("FIM").value = "";
    document.getElementById("PROXY").value = "";
    document.getElementById("OBS").value = "";

    return false; // Evita o envio do formulário e recarregamento da página.
}

    function editRecord(ID) {
        // Obtém as dimensões da janela atual
        var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        var height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
      
        // Calcula as dimensões da nova janela
        var newWidth = Math.floor(width * 0.8); // 30% da largura da janela atual
        var newHeight = Math.floor(height * 0.2); // 60% da altura da janela atual
      
        // Calcula a posição da nova janela para centralizá-la
        var left = Math.floor((width - newWidth) / 2);
        var top = Math.floor((height - newHeight) / 2);
      
        // Define as opções da nova janela
        var options = "width=" + newWidth + ",height=" + newHeight + ",top=" + top + ",left=" + left + ",scrollbars=yes,resizable=yes";
      
        // Abre a nova janela com as dimensões e posição automáticas
        var newWindow = window.open("edit.php?id=" + ID, "_blank", options);
      
        // Aguarda o carregamento da nova janela
        newWindow.addEventListener('DOMContentLoaded', 
        
        //function() {
        
        // Centraliza o conteúdo na nova janela
        //   var formContainer = newWindow.document.querySelector('.form-container');
        //    formContainer.style.position = 'absolute';
        //    formContainer.style.top = '50%';
        //    formContainer.style.left = '50%';
        //    formContainer.style.transform = 'translate(-50%, -50%)';

        //}

        );
    }
    
    // Código JavaScript para atualizar os contadores
        
        // Função para obter a contagem de registros por tipo do banco de dados (exemplo)
        function getCounts() {
            // Supondo que você tenha uma função em PHP para obter as contagens dos registros
            // Aqui, estou apenas simulando os valores
            
            var counts = {
                URL: 10,
                statusCertificadoOk: 7,
                statusCertificadoInvalido: 3,
                proxyLocal: 5,
                proxyReverso: 2,
                certificadoTotal: 10,
                certificadoValido: 7,
                certificadoInvalido: 3
            };
            
            return counts;
        }
        
        // Atualiza os contadores no painel
        function updateCounters() {
            var counts = getCounts();
            
            document.getElementById("URLCount").textContent = counts.URL;
            document.getElementById("statusCertificadoOkCount").textContent = counts.statusCertificadoOk;
            document.getElementById("statusCertificadoInvalidoCount").textContent = counts.statusCertificadoInvalido;
            document.getElementById("proxyLocalCount").textContent = counts.proxyLocal;
            document.getElementById("proxyReversoCount").textContent = counts.proxyReverso;
            document.getElementById("certificadoTotalCount").textContent = counts.certificadoTotal;
            document.getElementById("certificadoValidoCount").textContent = counts.certificadoValido;
            document.getElementById("certificadoInvalidoCount").textContent = counts.certificadoInvalido;
        }
        
        // Atualiza os contadores quando a página carrega
        window.addEventListener("load", updateCounters);
      

    document.addEventListener('DOMContentLoaded', function() {
        // Capturar o formulário de inserção
        var form = document.getElementById('insert-form');

        // Adicionar um ouvinte de evento para o evento de envio do formulário
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Impedir o envio do formulário padrão

            // Obter os dados do formulário
            var formData = new FormData(form);

            // Enviar uma requisição AJAX para o arquivo insert.php
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'insert.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Se a inserção for bem-sucedida, atualizar a página
                    location.reload();
                }
            };
            xhr.send(formData);
        });
    });
    
    function populateForm(data) {
  // Preenche o formulário de edição com os dados recebidos
    $('#ID').val(data.ID);
    $('#URL').val(data.URL);
    $('#STATUS').val(data.STATUS);
    $('#DOMINIO').val(data.DOMINIO);
    $('#INICIO').val(data.INICIO);
    $('#FIM').val(data.FIM);
    $('#PROXY').val(data.PROXY);
    $('#OBS').val(data.OBS);

    }
    
    function deleteRecord(ID) {
        // Implemente a função de exclusão do registro
        console.log("Excluir registro com ID: " + ID);
    
        // Confirma a exclusão com o usuário
        if (window.confirm("Tem certeza de que deseja excluir este registro?")) {
            // Faz uma requisição AJAX para excluir o registro
            fetch("/api/records/" + ID, { method: "DELETE" })
                .then(function(response) {
                    if (response.ok) {
                        // O registro foi excluído com sucesso
                        console.log("Registro excluído com sucesso");
                    } else {
                        // Ocorreu um erro ao excluir o registro
                        console.error("Erro ao excluir o registro:", response.statusText);
                    }
                })
                .catch(function(error) {
                    // Ocorreu um erro na requisição AJAX
                    console.error("Erro na requisição AJAX:", error);
                });
        }
    }
    