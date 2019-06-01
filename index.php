<?php

//Conetando ao Banco de Dados
include_once("ADD/conexao.php");

//Objetos
require_once 'OBJ/autor.php';
require_once 'OBJ/genero.php';
require_once 'OBJ/livro.php';

//Sistema Anti-Erros
$mensagem = 0;
$erro = 0;

//Atualiza ou Cadastra um Autor
$aut = new Autor;
if(!isset($_GET['id'])){
    if(isset($_POST['aut'])){
        $aut -> addAut();
    }
} else if(isset($_GET['id'])){
    if(isset($_POST['aut'])){
        $aut -> upAut();
    }
}

//Atualiza o Gênero depois da edição
$gen = new Genero;
if(!isset($_GET['id'])){
    if(isset($_POST['descric'])){
        $gen->addGen();
    }
} else if(isset($_GET['id'])){
    if(isset($_POST['descric'])){
        $gen->upGen();
    }
}

//Atualiza o Livro depois da edição
$liv = new Livro;
if(!isset($_GET['id'])){
    if(isset($_POST['nome'])){
        $liv->addLiv();
    }
} else if(isset($_GET['id'])){
    if(isset($_POST['nome'])){
        $liv->upLiv();
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
    if($erro == 0 && $mensagem == 0){
        $title = "Livraria";
    } else if($erro == 0 && $mensagem == 1){
        $title = "Livraria | Edição concluida";
    } else if($erro == 0 && $mensagem == 2){
        $title = "Livraria | Autor Adicionado";
    } else if($erro == 0 && $mensagem == 3){
        $title = "Livraria | Gênero Adicionado";
    } else if($erro == 0 && $mensagem == 4){
        $title = "Livraria | Livro Adicionado";
    } else if($erro == 1 || $erro == 2){
        $title = "Livraria | Falha na Edição";
    }
    include "ADD/config.php"; 
    ?>
</head>
<body>
    
    <!-- Barra de Navegação -->
    
<?php
    include "ADD/heater.php";
?>
 
    <!-- Escolher Tipo de Cadastro -->

<section id="esc-cad">
    <div class="container">
        
        <?php
        if($erro == 1) {
            echo "<h1>Erro ao atualizar!</h1><br>
            <h3>A quantidade de <u>Livros Devolvidos</u> é maior que a de <u>Livros Alugados</u>!</h3><br><br><br>
            <a class='btn-erro' href='edit-liv.php?id=$idLivro'>Tentar Novamente</a>";
        } else if($erro == 2) {
            echo "<h1>Erro ao atualizar!</h1><br>
            <h3>A quantidade de <u>Livros Alugados</u> é maior que a de <u>Livros no Estoque</u>!</h3><br><br><br>
            <a class='btn-erro' href='edit-liv.php?id=$idLivro'>Tentar Novamente</a>";
        } else if ($erro == 0 && $mensagem == 0){
            echo '<h1>O que deseja fazer?</h1>';
        } else if ($erro == 0 && $mensagem == 1){
            echo '<h1>Edição concluida! O que deseja fazer agora?</h1>';
        } else if ($erro == 0 && $mensagem == 2){
            echo '<h1>Cadastro de Autor concluido! O que deseja fazer agora?</h1>';
        } else if ($erro == 0 && $mensagem == 3){
            echo '<h1>Cadastro de Gênero concluido! O que deseja fazer agora?</h1>';
        } else if ($erro == 0 && $mensagem == 4){
            echo '<h1>Cadastro de Livro concluido! O que deseja fazer agora?</h1>';
        } else {}
        ?>
        
        <div class="row">
            <div class="col-md-4">
            <div class="esc-cad-box">
                <div class="esc-cad-head">
                    <h2>Autor</h2>
                </div>
                <div class="esc-cad-content">
                    <ul>
                        
                    </ul>
                </div>
                <div class="planos-btn">
                    <a class="btn-padrao" href="cad-autor.php">Cadastrar</a><br><br>
                    <a class="btn-padrao" href="con-autor.php">Consultar</a>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="esc-cad-box">
                <div class="esc-cad-head">
                    <h2>Gênero</h2>
                </div>
                <div class="esc-cad-content">
                    <ul>
                        
                    </ul>
                </div>
                <div class="planos-btn">
                    <a class="btn-padrao" href="cad-gen.php">Cadastrar</a><br><br>
                    <a class="btn-padrao" href="con-gen.php">Consultar</a>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="esc-cad-box">
                <div class="esc-cad-head">
                    <h2>Livro</h2>
                </div>
                <div class="esc-cad-content">
                    <ul>
                        
                    </ul>
                </div>
                <div class="planos-btn">
                    <a class="btn-padrao" href="cad-livro.php">Cadastrar</a><br><br>
                    <a class="btn-padrao" href="con-livro.php">Consultar</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
    
</body>
</html>