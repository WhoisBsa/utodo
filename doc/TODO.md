# TRABALHO DE DESENVOLVIMENTO WEB

## RESUMO

Este projeto é um simples ToDo list compartilhado, em que ao criar uma tarefa o usuário pode adicionar outros usuários para interagirem com o mesmo ToDo.

## REQUISITOS DO TRABALHO

- [x] O sistema deve ser responsivo e possuir tratamento do design via CSS e JavaScript.
- [x] O sistema precisa ter banco de dados.
- [x] O sistema deve possuir cadastro de usuários e um mecanismo de login e senha.
- [x] O sistema precisa fornecer pelo menos 1 CRUD completo de alguma tabela do banco (Inserção, alteração, remoção e seleção), que não seja a dos usuários.
- [x] As inserções, alterações e remoções obviamente devem ser seletivas (aplicadas em algum objeto específico), porém o sistema deve ter pelo menos 1 seleção seletiva (mostrar algum dado específico caso o usuário queira), que não seja a dos usuários.
- [x] O sistema deve possuir algum tipo de associação muitos para muitos no banco de dados.
- [x] O sistema precisa ter algum tipo de manipulação de diretórios e arquivos.
- [x] O sistema precisa ter tratamento de exceções.
- [x] O sistema deve ter um nome e uma logomarca exclusiva.
- [x] O sistema deve possuir pelo menos uma galeria de fotos.

## REQUISITOS DO PROJETO

- MySQL
- PHP 7
- XAMPP

## COMO RODAR O PROJETO

1. Execute o script de banco de dados no SGBD
    ```
    .
    |
    ├ sql
    │   └── TODO.sql
    ```
    **Obs.**: Alguns usuários e ToDo's são inseridos para teste.
2. Configure o arquivo conf.json com o ip, usuário, senha e nome do banco.
3. Copie todo projeto para o diretório htdocs do XAMPP e reinicie o servidor.
4. Alguns sistemas operacionais, solicitam permissão para ler e escrever arquivos. Pode ser necessário para o diretório **relatórios** que é gerada para os relatórios do usuário.