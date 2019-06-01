<?php

//Requerindo Arquivos
require 'OBJ/functions.php';
require 'OBJ/genero.php';

//Criando novos Objetos
$OBJgenero = new Genero;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
    $title = "Livraria | Gêneros";
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
        <h1>Lista de Gêneros</h1>
        
            <!-- Barra de Pesquisa -->
        
        <form method="post" action="">
            <b>FILTRAR POR NOME: </b><input type="text" name="filtro" class="campo" required autofocus> <input type="submit" value="Pesquisar" class="btn-pesq">
        </form>
        
        <?php
        
        //Define e Exibe o Numero Total de Gêneros
        $numGen = $OBJgenero->numeroGeneros();
        echo "<br><h6>$numGen generos encontrados</h6>";

        //Define e Exibe os Dados dos Gêneros
        $result = $OBJgenero->searchGen();
        foreach ($result as $dados) {
            $created = dateConvert($dados['created']);
            $modified = dateConvert($dados['modified']);
            echo "<article><div class='row'><div class='col-md-6 aut-info'>";
            echo "<p><b>Nome:</b> ".$dados['genero']."</p><br><p><b>Descrição:</b> ".$dados['descric']."</p><br>";
            echo "</div><div class='col-md-6 aut-info'>";
            echo "<p><b>Adicionado em:</b> ".$created."</p><br><p><b>Modificado em:</b> ".$modified."</p><br><a class='btn-alug' href='edit-gen.php?id=".$dados['id']."'>Editar</a>";
            echo "</div></div></article>";
        }
        
        //Paginação
        //Declarando Varaveis
        $num = $OBJgenero->numeroGeneros();
        $page = pagina()[0];
        $resultMax = pagina()[1];
        $total_pages = ceil($num / $resultMax);

        //Botões
        echo '<div class="paginacao">';
                        
            for ($i=1; $i <= $total_pages; $i++) {
                if ($i==$page){
                    echo '<a class="btn-act">'.$i.'</a>  ';
                } else {
                    echo '<a class="btn-pag" href="con-gen.php?page='.$i.'">'.$i.'</a>';
                }
            }
                        
        echo '</div>';

        ?>
    </div>
</section>
    
</body>
</html>