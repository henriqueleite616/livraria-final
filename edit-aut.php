<?php

//Requerindo Arquivos
require 'OBJ/autor.php';

//Seleciona o Autor
$OBJautor = new Autor;
$result = $OBJautor->selectAut();
$id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
    $title = "Livraria | Editar Autor";
    include "ADD/config.php"; 
    ?>

</head>
<body>
    
    <!-- Barra de Navegação -->
    
<?php
    include "ADD/heater.php";
?>
 
    <!-- Cadastrar Autor -->
    
<section id="box1">
    <div class="container">
        <h1>Editar Autor</h1>
        <?php
            echo "<form method='post' class='cad-form' action='index.php?id=$id'>";

                foreach ($result as $dados) {
                    echo "
                    <div class='form-group'>
                    Nome:
                    <input type='text' name='aut' class='form-control' maxlength='100' value='".$dados['autor']."' required autofocus>
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