<?php

include_once 'OBJ/functions.php';

class Autor {

    //Função que Seleciona Todos os Gêneros
    public function autAll(){
        $dbc = dbConnect();

        $sql = "SELECT * FROM autores ORDER BY autor";

        $stmt = $dbc->prepare($sql);
        $stmt->execute();

        $all = $stmt->fetchAll();

        return $all;
    }

    //Função para Adicionar um Autor 
    public function addAut() {
        $dbc = dbConnect();

        $sql = "INSERT INTO autores (autor) VALUES (:autor)";

        if(!isset($_GET['id'])) {
            if(isset($_POST['aut'])) {
                $stmt = $dbc->prepare($sql);
                $stmt->bindParam(':autor', $_POST['aut']);
                $stmt->execute();
            }
        }

        $dbc = dbDisconnect();
        $mensagem = 2;
    }

    //Função que Seleciona um Autor
    public function selectAut(){
        $dbc = dbConnect();

        $sql = "SELECT * FROM autores WHERE id = :id ORDER BY autor";

        $stmt = $dbc->prepare($sql);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();

        $select = $stmt->fetchAll();

        return $select;
    }

    //Função para Editar um Autor
    public function upAut() {
        $dbc = dbConnect();

        $sql = "UPDATE autores SET autor = :aut WHERE id = :id";

        if(isset($_GET['id'])) {
            if(isset($_POST['aut'])) {
    
            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(':id', $_GET['id']);
            $stmt->bindParam(':aut', $_POST['aut']);
            $stmt->execute();

            $dbc = dbDisconnect();
            $mensagem = 1;
            } else {}
        }
    }

    //Função para buscar um Autor
    public function searchAut() {

        //Informações sobre Limites (Mais info: OBJ/function.php)
        $page = pagina()[0];
        $results_pagina = pagina()[1];
        $limite_pagina = pagina()[2];

        //Caso haja alguma pesquisa: Exibe o Resultado da Busca
        if(isset($_POST['filtro'])){
            //Conectando ao banco de dados e escolhendo os autores referentes a pagina
            $dbc = dbConnect();
            $sql = "SELECT * FROM autores WHERE autor LIKE :filtro ORDER BY autor LIMIT ".$limite_pagina.",".$results_pagina."";
            $filtro = addslashes($_POST['filtro']);

            $stmt = $dbc->prepare($sql);
            $stmt->bindValue(':filtro', '%' . $filtro . '%', PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;

        //Caso não haja nenhuma pesquisa: Exibe todos os autores
        } else if(!isset($_POST['filtro'])){
            //Conectando ao banco de dados e escolhendo os autores referentes a pagina
            $dbc = dbConnect();
            $sql = "SELECT * FROM autores ORDER BY autor LIMIT ".$limite_pagina.",".$results_pagina."";

            $stmt = $dbc->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;
        }
    }

    //Função para Exibir o Numero de Autores
    public function numeroAutores() {
        $dbc = dbConnect();
        $sql = "SELECT * FROM autores ORDER BY autor";

        $stmt = $dbc->prepare($sql);
        $stmt->execute();

        $count = $stmt->rowCount();

        return $count;
    }
}

?>