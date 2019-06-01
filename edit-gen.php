<?php

//Requerindo Arquivos
require 'OBJ/genero.php';

//Seleciona o Autor
$OBJgenero = new Genero;
$result = $OBJgenero->selectGen();
$id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
    $title = "Livraria";
    include "ADD/config.php"; 
    ?>
</head>
<body>
    
    <!-- Barra de Navegação -->
    
<?php
    include "ADD/heater.php";
?>
 
    <!-- Cadastrar Gênero -->
    
<section id="box1">
    <div class="container">
        <h1>Editar Gênero</h1>
        <?php
            echo "<form method='post' class='cad-form' action='index.php?id=$id'>";
                
                foreach ($result as $dados) {
                    echo "
                    <div class='form-group'>
                    Nome:
                    <input type='text' name='genero' class='form-control' maxlength='100' value='".$dados['genero']."' required autofocus>
                    </div>";
                    echo "
                    <div class='form-group'>
                    Descrição:
                    <textarea name='descric' class='form-control' maxlength='100' required>".$dados['descric']."</textarea>
                    </div>";
                }

            echo "
            <input type='submit' value='Atualizar' class='btn btn-primary'>
            <a href='con-gen.php' class='btn btn-danger'>Cancelar</a><br><br>
            ";

        ?>
            </form>
    </div>
</section>
    
</body>
</html>