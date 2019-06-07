# livraria

Projeto para o Processo Seletivo - Estágio e Desenvolvimento de Sistemas

Descrição:

    Características obrigatórias do sistema:
    - O sistema deve conter telas para o cadastro de Livros, Genêros e Autores
    - Deve ser respeitado o relacionamento entre as entidades. Sendo que:
        - 1 livro pode ter vários gêneros e 1 gênero pode representar vários livros
        - 1 autor pode ter vários livros, mas cada livro pode ter somente 1 autor
    - No cadastro de livros deve haver um espaço para informar vários gêneros. Fica aberto a forma como será feita (Javascript ou texto)
    - Deve haver uma tela para consulta de livros disponíveis para "locação", de forma que se todos os exemplares de um título estiverem "locados", o sistema deverá exibir estes livros juntamente com uma informação dizendo que o livro existe mas não está disponível no momento.
    - Na tela de consulta deve haver dois botões onde um informará a locação do livro e outro informará a devolução do livro.
    - Para o front end pode utilizar um template bootstrap ou outro qualquer (a vontade).
    - O sistema deve ser feito utilizando estrutura orientada a objetos
    - Utilizar banco de dados MySQL e disponibilizar sua estrutura juntamente com o projeto

    Diferenciais:

    - Implementar paginação na tela de consulta.
    - Criar filtro de livros por título na tela de consulta.
    - Utilizar o framework CakePHP na sua versão 2
    - Implementar controle de usuários com login do CakePHP

Infelizmente, não consegui dar um jeito de adicionar os botões de "Alugar" e "Devolver" na tela de consulta.
Ao me deparar com este problema, pensei em outro jeito de resolve-lo: Adicionar uma tela de edição, e lá, permitir que sejam alugados e devolvidos varios livros de uma unica vez.

Lista das funções do sistema:

    -Feito com Orientação de Objetos
    -Contém telas para o CADASTRO de LIVROS, GENÊROS e AUTORES
    -Respeita o relacionamento entre as entidades. Sendo que:
        -1 livro pode ter vários gêneros e 1 gênero pode representar vários livros
        -1 autor pode ter vários livros, mas cada livro pode ter somente 1 autor
    -No cadastro de livros há um espaço para informar vários gêneros (Cadastro de 1 a 3 gêneros)
    -Há uma tela para consulta de livros, exibindo a QUANTIDADE NO ESTOQUE e QUANTIDADE DE LIVROS LOCADOS
    -Filtro de livros por título na tela de consulta
    -Utiliza banco de dados MySQL (disponibilizado juntamente com o projeto)
    -Contém paginação

Manual de instalação:

    //Preparação
    -Instalar o XAMPP (https://www.apachefriends.org/pt_br/download.html)
    -Criar a pasta "livraria" dentro da pasta "htdocs" (C:\xampp\htdocs)
    -Adicionar os arquivos a pasta "livraria" (C:\xampp\htdocs\livraria)
    //Adicionando o Bando de Dados
    -Ir ao site: http://localhost/phpmyadmin/
    -Importar o arquivo "estagio.sql"
    //Iniciando o site
    -Iniciar o XAMPP
    -Executar o "Apache" e "MySQL"
    -Ir ao site: http://localhost/livraria/

Para ALUGAR ou DEVOLVER livros:

    -Vá em "Consultar Livros"
    -Clique em "Editar" no livro escolhido
    -Para alugar:
        -Na opção de "Adicionar Exemplares Alugados", insira a quantidade de livros alugados.
    -Para devolver:
        -Na opção de "Adicionar Exemplares Devolvidos", insira a quantidade de livros devolvidos.
    -Sendo que a QUANTIDADE DE LIVROS ALUGADOS não pode ser maior do que a QUANTIDADE DE LIVROS
    NO ESTOQUE e a QUANTIDADE DE LIVROS DEVOLVIDOS não pode ser maior do que a QUANTIDADE DE LIVROS
    ALUGADOS, ou a operação não será concluida e aparecerá uma tela de erro.
