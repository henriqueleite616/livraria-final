<?php

//Conetando ao Banco de Dados
include_once("ADD/conexao.php");

//Requerindo Arquivos
require 'OBJ/functions.php';
require 'OBJ/livro.php';

//Criando os objetos
$OBJlivro = new Livro;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
    $title = "Livraria | Lista de Livros";
    include "ADD/config.php"; 
    ?>
</head>
<body>
    
    <!-- Barra de Navegação -->
    
<?php
    include "ADD/heater.php";
?>
 
    <!-- Consultar Gênero -->
    
<section id="box">
    <div class="container">
        <h1>Lista de Livros</h1>
        
            <!-- Barra de Pesquisa -->
        
        <form method="post" action="">
            <b>FILTRAR POR NOME: </b><input type="text" name="filtro" class="campo" required autofocus> <input type="submit" value="Pesquisar" class="btn-pesq">
        </form> 
        
        <?php
        
        //Define e Exibe o Numero Total de Autores
        $numLiv = $OBJlivro->numeroLivros();
        echo "<br><h6>$numLiv livros encontrados</h6>";

        //Define e Exibe os Dados dos Autores
        $result = $OBJlivro->searchLiv();
        foreach ($result as $dados) {
            $created = dateConvert($dados['created']);
            $modified = dateConvert($dados['modified']);
            echo "<article><div class='row'><div class='col-md-6 aut-info'>";
            echo "<p><b>Nome:</b> ".$dados['nome']."</p><br><p><b>Autor:</b> ".$dados['autor']."</p><br><p><b>Gênero:</b> ".$dados['genero']."</p><br><p><b>Sub-Gênero:</b> ".$dados['subgen1']."</p><br><p><b>Sub-Gênero:</b> ".$dados['subgen2']."</p><br><p><b>ISBN:</b> ".$dados['isbn']."</p><br><p><b>Estoque:</b>  ".$dados['qntest']."</p><br><p><b>Alugados:</b> ".$dados['qntloc']."</p><br><p><b>Adicionado em:</b> $created </p><br><p><b>Modificado em:</b> $modified </p><br><a class='btn-alug' href='edit-liv.php?id=".$dados['id']."'>Editar</a><br>";
            echo "</div><div class='col-md-6 aut-info'>";
            echo "<p><b>Descrição:</b><br> ".$dados['descricao']."</p><br>";
            echo "</div></div></article>";
        }            
        
        //Paginação
        //Declarando Varaveis
        $num = $OBJlivro->numeroLivros();
        $page = pagina()[0];
        $resultMax = pagina()[1];
        $total_pages = ceil($num / $resultMax);

        //Botões
        echo '<div class="paginacao">';
                        
            for ($i=1; $i <= $total_pages; $i++) {
                if ($i==$page){
                    echo '<a class="btn-act">'.$i.'</a>  ';
                } else {
                    echo '<a class="btn-pag" href="con-livro.php?page='.$i.'">'.$i.'</a>';
                }
            }
                        
        echo '</div>';

        ?>
        
    </div>
</section>
</body>
</html>