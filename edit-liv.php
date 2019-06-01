<?php

//Requerindo Arquivos
require 'OBJ/autor.php';
require 'OBJ/genero.php';
require 'OBJ/livro.php';

//Define o ID do Livro
$id = $_GET['id'];

//Seleciona os Autores
$OBJautor = new Autor;
$allAut = $OBJautor->autAll();
$rowAut = $OBJautor->numeroAutores();

//Seleciona os Gêneros
$OBJgenero = new Genero;
$allGen = $OBJgenero->genAll();
$rowGen = $OBJgenero->numeroGeneros();

//Seleciona o Livro
$OBJlivro = new Livro;
$livro = $OBJlivro->selectLiv();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
    $title = "Livraria | Editar Livro";
    include "ADD/config.php"; 
    ?>
</head>
<body>
    
    <!-- Barra de Navegação -->
    
<?php
    include "ADD/heater.php";
?>
 
    <!-- Cadastro de Livro -->
    
<section id="box">
    <div class="container">
        <h1>Editar Livro</h1>
        <?php
            echo "<form method='post' class='cad-form' action='index.php?id=$id'>";

            foreach ($livro as $dados) {
//  NOME
            echo "
            <div class='form-group'>
            Nome do Livro:
            <input type='text' name='nome' class='form-control' maxlength='100' value='".$dados['nome']."' required autofocus>
            </div>";
//  ISBN
            echo "
            <div class='form-group'>
            ISBN:
            <input type='number' name='isbn' class='form-control' minlength='10' maxlength='15' value='".$dados['isbn']."' required>
            </div>";
//  AUTOR
            echo "
            <div class='form-group'>
            Autor:";
                foreach ($livro as $dadosAut1) {
                    echo "
                    <select name='autor' class='form-control' required>
                    <option value='".$dadosAut1['autor']."'>Manter: ".$dadosAut1['autor']."</option>";
                    if ($rowAut > 0) {
                        foreach ($allAut as $dadosAut2){
                            echo "<option value='".$dadosAut2['autor']."' name='autor'>".$dadosAut2['autor']."</option>";
                        }
                    } else {
                        echo "<option value=''>Autores não disponiveis.</option>";
                    }
                    echo "</select>";
                }
            echo "</div>";
//  GENERO
            echo "
            <div class='form-group'>
            Gênero:";
                foreach ($livro as $dadosGen1) {
                    echo "
                    <select name='genero' class='form-control' required>
                    <option value='".$dadosGen1['genero']."'>Manter: ".$dadosGen1['genero']."</option>";
                    if ($rowGen > 0) {
                        foreach ($allGen as $dadosGen2){
                            echo "<option value='".$dadosGen2['genero']."' name='genero'>".$dadosGen2['genero']."</option>";
                        }
                    } else {
                        echo "<option value=''>Gêneros não disponiveis.</option>";
                    }
                    echo "</select>";
                }
            echo "</div>";
//  SUB-GENERO 1
            echo "
            <div class='form-group'>
            Sub-Gênero:";
                foreach ($livro as $dadosSubGen1) {
                    echo "
                    <select name='subgen1' class='form-control'>
                    <option value='".$dadosSubGen1['subgen1']."'>Manter: ".$dadosSubGen1['subgen1']."</option>";
                    if ($rowGen > 0) {
                        foreach ($allGen as $dadosSubGen2){
                            echo "<option value='".$dadosSubGen2['genero']."' name='subgen1'>".$dadosSubGen2['genero']."</option>";
                        }
                    } else {
                        echo "<option value=''>Gêneros não disponiveis.</option>";
                    }
                    echo "</select>";
                }
            echo "</div>";
//  SUB-GENERO 2
            echo "
            <div class='form-group'>
            Sub-Gênero:";
                foreach ($livro as $dadosSubGen1) {
                    echo "
                    <select name='subgen2' class='form-control'>
                    <option value='".$dadosSubGen1['subgen2']."'>Manter: ".$dadosSubGen1['subgen2']."</option>";
                    if ($rowGen > 0) {
                        foreach ($allGen as $dadosSubGen2){
                            echo "<option value='".$dadosSubGen2['genero']."' name='subgen2'>".$dadosSubGen2['genero']."</option>";
                        }
                    } else {
                        echo "<option value=''>Gêneros não disponiveis.</option>";
                    }
                    echo "</select>";
                }
            echo "</div>";
//  DESCRICAO
            echo "
            <div class='form-group'>
            Descricao:
            <textarea name='descricao' class='form-control' maxlength='1000' required>".$dados['descricao']."</textarea>
            </div>";
//  ESTOQUE
            echo "
            <div class='form-group'>
            Adicionar Exemplares ao Estoque:
            <input type='number' name='addEst' class='form-control' value='' placeholder='Estoque atual: ".$dados['qntest']."'>
            </div>";
//  ALUGADOS
            echo "
            <div class='form-group'>
            Adicionar Exemplares Alugados:
            <input type='number' name='locCont' class='form-control' value='' placeholder='Locação atual: ".$dados['qntloc']."'>
            </div>";
//  DEVOLVIDOS
            echo "
            <div class='form-group'>
            Adicionar Exemplares Devolvidos:
            <input type='number' name='devCont' class='form-control' value='' placeholder='0'>
            </div>";
            }
//  BOTOES
            echo "
            <input type='submit' value='Atualizar' class='btn btn-primary'>
            <a href='con-livro.php' class='btn btn-danger'>Cancelar</a><br><br>
            </form>";
        ?>
        
    </div>
</section>
    
</body>
</html>