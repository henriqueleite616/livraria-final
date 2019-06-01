<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php 
    $title = "Livraria | Cadastrar Autor";
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
        <h1>Cadastrar Autor</h1>
                <form method="post" class="cad-form" action="index.php">
                    <div class="form-group">
                        <input type="text" name="aut" class="form-control" placeholder="Nome Completo" maxlength="100" required autofocus>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <a href="index.php" class="btn btn-danger">Cancelar</a><br><br>
                </form>
    </div>
</section>
    
</body>
</html>