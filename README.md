# Gerenciamento de Certificados SSL - Projeto

Este projeto é um sistema simples para gerenciar certificados SSL de sites. Ele permite adicionar, editar e excluir registros de certificados SSL, bem como exibir uma lista de todos os certificados armazenados no banco de dados.

![Captura de Tela - Gerenciamento de Certificado SSL (2)](https://github.com/LeviLucena/CertificadosSSL/assets/34045910/0045df0a-d38b-4b86-a75c-b9cf7733b9f0)

Funcionalidades Principais:
- Adicionar novos certificados SSL, fornecendo informações como URL, status, domínio, datas de início e término, proxy e observações.
- Editar certificados existentes para atualizar suas informações.
- Excluir certificados indesejados.
- Visualizar uma tabela contendo todos os certificados SSL armazenados no banco de dados.

Requisitos do Sistema:
- Servidor web (por exemplo, Apache, Nginx) com suporte a PHP.
- Banco de dados MySQL ou MariaDB.
- Conexão à internet para carregar bibliotecas e recursos externos (Bootstrap, jQuery).

Instruções de Instalação:
1. Clone ou faça o download deste repositório para o seu ambiente local.
2. Certifique-se de ter um servidor web configurado com suporte a PHP e um banco de dados MySQL ou MariaDB.
3. Crie um banco de dados para o projeto e importe o arquivo `database.sql` para criar a tabela necessária.
4. Abra o arquivo `conexao.php` e atualize as configurações de conexão com o banco de dados para corresponder às suas credenciais.
5. Coloque os arquivos do projeto em um diretório acessível pelo servidor web.
6. Abra o arquivo `index.php` em seu navegador e comece a usar o sistema.

Personalização:
- Você pode personalizar a aparência do sistema editando o arquivo `style.css` para ajustar o layout e os estilos conforme suas preferências.
- Se desejar adicionar mais campos ou recursos ao sistema, você pode modificar os arquivos `index.php`, `edit.php` e `insert.php` de acordo com suas necessidades.

Observações Importantes:
- Este projeto é fornecido como exemplo e não deve ser usado em um ambiente de produção sem realizar as devidas melhorias e implementações de segurança.
- Certifique-se de seguir as melhores práticas de segurança ao lidar com informações sensíveis, como certificados SSL. Isso inclui criptografar as informações armazenadas, limitar o acesso aos dados e implementar medidas para proteger contra ataques de injeção de SQL.

Licença:
Este projeto não é licenciado e pode ser usado, modificado e distribuído livremente de acordo com os termos da licença.

Contribuição:
Contribuições para aprimorar este projeto são bem-vindas. Sinta-se à vontade para enviar solicitações de pull com melhorias, correções de bugs ou novos recursos.

Autor: [![Linkedin Badge](https://img.shields.io/badge/-LinkedIn-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/levilucena/)](https://www.linkedin.com/in/levilucena/)

