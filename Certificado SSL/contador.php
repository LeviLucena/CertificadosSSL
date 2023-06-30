<!DOCTYPE html>
<html>
<head>
    <title>Painel de Contagem</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        
        .panel {
            display: flex;
            flex-direction: column; /* Altera o fluxo para coluna */
            align-items: center; /* Centraliza horizontalmente */
            justify-content: center; /* Centraliza verticalmente */
            height: 100%;
            background-color: #f0f0f0;
        }
        
        .counter {
            text-align: center;
            padding: 20px;
            display: flex;
            flex-direction: column; /* Altera o fluxo para coluna */
            align-items: center; /* Centraliza horizontalmente */
            z-index: 2; /* Define a ordem de empilhamento */
            position: relative; /* Permite posicionar sobre as demais divs */
        }
        
        .counter h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .counter p {
            font-size: 18px;
            margin-bottom: 5px;
        }
        
        .category-container {
            display: flex;
            justify-content: center; /* Centraliza horizontalmente */
        }
        
        .category {
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            flex: 1;
            margin: 10px;
        }
        
        .category h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        
        /* Cores de fundo dos quadros */
        .category:nth-child(1) {
            background-color: #e6f2ff;
        }
        
        .category:nth-child(2) {
            background-color: #f2e6ff;
        }
        
        .category:nth-child(3) {
            background-color: #e6fff2;
        }
        
        .category:nth-child(4) {
            background-color: #ffe6f2;
        }
    </style>
</head>
<body>
    <div class="panel">
        <div class="counter">
            <h2>Painel de Contagem</h2>
        </div>

        <div class="category-container">
            <div class="category">
                <h3>URL</h3>
                <p>Total: <span id="URLCount">0</span></p>
            </div>

            <div class="category">
                <h3>Status</h3>
                <p>Certificado OK: <span id="statusCertificadoOkCount">0</span></p>
                <p>Certificado Inválido: <span id="statusCertificadoInvalidoCount">0</span></p>
            </div>

            <div class="category">
                <h3>Proxy</h3>
                <p>Local: <span id="proxyLocalCount">0</span></p>
                <p>Reverso: <span id="proxyReversoCount">0</span></p>
            </div>

            <div class="category">
                <h3>Domínio</h3>
                <p>Total: <span id="certificadoTotalCount">0</span></p>
                <p>Válido: <span id="certificadoValidoCount">0</span></p>
                <p>Inválido: <span id="certificadoInvalidoCount">0</span></p>
            </div>
        </div>
    </div>

    <script>
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
    </script>
</body>
</html>
