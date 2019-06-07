<?php

include_once 'OBJ/functions.php';

class Genero {

    //Função que Seleciona Todos os Gêneros
    public function genAll(){
        $dbc = dbConnect();

        $sql = "SELECT * FROM generos ORDER BY genero";

        $stmt = $dbc->prepare($sql);
        $stmt->execute();

        $all = $stmt->fetchAll();

        return $all;
    }

    //Função para Adicionar um Novo Gênero
    public function addGen() {
        $dbc = dbConnect();

        if(!isset($_GET['id'])) {
            if(isset($_POST['descric'])) {
                $stmt = $dbc->prepare("INSERT INTO generos (genero, descric) VALUES (:genero, :descric)");
                $stmt->bindParam(':genero', $_POST['genero']);
                $stmt->bindParam(':descric', $_POST['descric']);
                $stmt->execute();
            }
        }

        $dbc = dbDisconnect();
        $mensagem = 3;
    }

    //Função que Seleciona um Gênero
    public function selectGen(){
        $dbc = dbConnect();

        $sql = "SELECT * FROM generos WHERE id = :id ORDER BY genero";

        $stmt = $dbc->prepare($sql);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();

        $select = $stmt->fetchAll();

        return $select;
    }

    //Função para Editar um Gênero
    public function upGen() {
        $dbc = dbConnect();

        $sql = "UPDATE generos SET genero = :genero, descric = :descric WHERE id = :id";

        if(isset($_GET['id'])) {
            if(isset($_POST['genero'])) {
                if(isset($_POST['descric'])) {
    
            $idGen = $_GET['id'];
            $genero = $_POST['genero'];
            $descric = $_POST['descric'];
            
            $stmt = $dbc->prepare($sql);
            $stmt->bindParam(':id', $_GET['id']);
            $stmt->bindParam(':genero', $_POST['genero']);
            $stmt->bindParam(':descric', $_POST['descric']);
            $stmt->execute();
                
            $dbc = dbDisconnect();
            $mensagem = 1;
                }
            }
        }
    }

    //Função para buscar um Gênero
    public function searchGen() {

        //Informações sobre Limites (Mais info: OBJ/function.php)
        $page = pagina()[0];
        $results_pagina = pagina()[1];
        $limite_pagina = pagina()[2];

        //Caso haja alguma pesquisa: Exibe o Resultado da Busca
        if(isset($_POST['filtro'])){
            //Conectando ao banco de dados e escolhendo os generos referentes a pagina
            $dbc = dbConnect();
            $sql = "SELECT * FROM generos WHERE genero LIKE :filtro ORDER BY genero LIMIT ".$limite_pagina.",".$results_pagina."";
            $filtro = addslashes($_POST['filtro']);

            $stmt = $dbc->prepare($sql);
            $stmt->bindValue(':filtro', '%' . $filtro . '%', PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;

        //Caso não haja nenhuma pesquisa: Exibe todos os gêneros
        } else if(!isset($_POST['filtro'])){
            //Conectando ao banco de dados e escolhendo os gêneros referentes a pagina
            $dbc = dbConnect();
            $sql = "SELECT * FROM generos ORDER BY genero LIMIT ".$limite_pagina.",".$results_pagina."";

            $stmt = $dbc->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;
        }
    }

    //Função para Exibir o Numero de generoes
    public function numeroGeneros() {
        $dbc = dbConnect();
        $sql = "SELECT * FROM generos ORDER BY genero";
            
        $stmt = $dbc->prepare($sql);
        $stmt->execute();

        $count = $stmt->rowCount();

        return $count;
    }
}

?>