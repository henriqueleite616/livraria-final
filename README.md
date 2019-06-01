# livraria

Projeto para o Processo Seletivo - Estágio e Desenvolvimento de Sistemas

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

Tutorial para fazer a instalação SEM WINRAR:

    -Instalar o XAMPP (https://www.apachefriends.org/pt_br/download.html)
    -Criar a pasta "livraria" dentro da pasta "htdocs" (C:\xampp\htdocs)
    -Criar as pastas "ADD", "CSS" e "OBJ" dentro da pasta "livraria"
    -Adicionar os arquivos "book.png", "config.php" e "heater.php" na pasta "ADD" (C:\xampp\htdocs\livraria\ADD)
    -Adicionar o arquivo "style.css" na pasta "CSS" (C:\xampp\htdocs\livraria\CSS)
    -Adicionar os arquivos "autor.php", "functions.php", "genero.php" e "livro.php" na pasta "OBJ" (C:\xampp\htdocs\livraria\OBJ)
    -Adicionar o restante dos arquivos na pasta "livraria" (C:\xampp\htdocs\livraria)
    -Iniciar o XAMPP
    -Executar o "Apache" e "MySQL"
    -Ir ao site: http://localhost/livraria/
    
Tutorial para fazer a instalação COM WINRAR:

    -Instalar o XAMPP (https://www.apachefriends.org/pt_br/download.html)
    -Extrair o arquivo "livraria.rar" para a pasta "htdocs" (C:\xampp\htdocs)
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

Edit: Consegui aprender Orientação de Objetos e Atualizei o Projeto.
