<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
    $title = "Livraria | Cadastrar Gênero";
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
        <h1>Cadastrar Gênero</h1>
                <form method="post" class="cad-form" action="index.php">
                    <div class="form-group">
                        <input type="text" name="genero" class="form-control" placeholder="Gênero" maxlength="20" required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="descric" class="form-control" placeholder="Descrição" maxlength="250">
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <a href="index.php" class="btn btn-danger">Cancelar</a><br><br>
                </form>
    </div>
</section>
    
</body>
</html>