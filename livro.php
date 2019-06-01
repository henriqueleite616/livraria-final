<?php

include_once 'OBJ/functions.php';

class Livro {

    //Função para Adicionar um Livro
    public function addLiv() {
        $dbc = dbConnect();

        $sql = "INSERT INTO livros (nome, genero, subgen1, subgen2, autor, qntest, qntloc, descricao, isbn) VALUES (:nome, :genero, :subgen1, :subgen2, :autor, :qntest, :qntloc, :descricao, :isbn)";
        $qntLoc = 0;

        if(!isset($_GET['id'])) {
            $stmt = $dbc->prepare($sql);
            $stmt->bindValue(':nome', $_POST['nome']);
            $stmt->bindValue(':genero', $_POST['genero']);
            $stmt->bindValue(':subgen1', $_POST['subgen1']);
            $stmt->bindValue(':subgen2', $_POST['subgen2']);
            $stmt->bindValue(':autor', $_POST['autor']);
            $stmt->bindValue(':qntest', $_POST['qntest']);
            $stmt->bindValue(':qntloc', $qntLoc);
            $stmt->bindValue(':descricao', $_POST['descricao']);
            $stmt->bindValue(':isbn', $_POST['isbn']);
            $stmt->execute();
        }

        $dbc = dbDisconnect();
        $mensagem = 4;
    }

    //Função que Seleciona um Livro
    public function selectLiv(){
        $dbc = dbConnect();

        $sql = "SELECT * FROM livros WHERE id = :id";

        $stmt = $dbc->prepare($sql);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();

        $select = $stmt->fetchAll();

        return $select;
    }

    //Função para Editar um Livro
    public function upLiv() {
        $dbc = dbConnect();

        if(isset($_GET['id'])) {
            if(isset($_POST['isbn'])) {

                $sql = "UPDATE livros SET nome=:nome, genero=:genero, subgen1=:subgen1, subgen2=:subgen2, autor=:autor, qntest=:qntest, qntloc=:qntloc, descricao=:descricao, isbn=:isbn WHERE id=:id";

                //Define variaveis necessarias para os calculos
                $addEst = $_POST['addEst'];
                $locCont = $_POST['locCont'];
                $devCont = $_POST['devCont'];
            
                //Caso Nenhuma quantidade (Alugados / Estoque / Devolvidos) seja alterada, define seus valores como 0
                if (empty($_POST['addEst'])) {
                    $addEst= 0;
                } else {}
                if (empty($_POST['locCont'])) {
                    $locCont= 0;
                } else {}
                if (empty($_POST['devCont'])) {
                    $devCont= 0;
                } else {}  
                
                //Seleciona a Quantidade De Livros Alugados e a Quantidade De Livros no Estoque e Converte eles de STRING para INT
                $select = "SELECT qntest, qntloc FROM livros WHERE id = :id";

                $selStmt = $dbc->prepare($select);
                $selStmt->bindValue(':id', $_GET['id']);
                $selStmt->execute();

                $estStr = $selStmt->fetchColumn();
                $algStr = $selStmt->fetchColumn();
                $est = (int)$estStr;
                $alg = (int)$algStr;

                //Evita que Livro Alugados > Livros no Estoque & que Livros Devolvidos > Livros Alugados & Salva
                if ( $alg >= $devCont && $alg >= 0 && $est >= $locCont && $est >= 0 ) {
                    $qntEstFim = $est - $locCont + $devCont + $addEst;
                    $qntLocFim = $alg + $locCont - $devCont;

                    $stmt = $dbc->prepare($sql);
                    $stmt->bindParam(':nome', $_POST['nome']);
                    $stmt->bindParam(':genero', $_POST['genero']);
                    $stmt->bindParam(':subgen1', $_POST['subgen1']);
                    $stmt->bindParam(':subgen2', $_POST['subgen2']);
                    $stmt->bindParam(':autor', $_POST['autor']);
                    $stmt->bindParam(':qntest', $qntEstFim);
                    $stmt->bindParam(':qntloc', $qntLocFim);
                    $stmt->bindParam(':descricao', $_POST['descricao']);
                    $stmt->bindParam(':isbn', $_POST['isbn']);
                    $stmt->bindParam(':id', $_GET['id']);
                    $stmt->execute();
                    
                } else if ( $devCont > $alg ) {
                    $erro = 1;
                } else if ( $locCont > $est ) {
                    $erro = 2;
                } else {}
            }
        } else {}

            $dbc = dbDisconnect();
            $mensagem = 1;
    }

    //Função para buscar um Livro
    public function searchLiv() {

        //Informações sobre Limites (Mais info: OBJ/function.php)
        $page = pagina()[0];
        $results_pagina = pagina()[1];
        $limite_pagina = pagina()[2];

        //Caso haja alguma pesquisa: Exibe o Resultado da Busca
        if(isset($_POST['filtro'])){
            //Conectando ao banco de dados e escolhendo os livros referentes a pagina
            $dbc = dbConnect();
            $sql = "SELECT * FROM livros WHERE nome LIKE :filtro ORDER BY nome LIMIT ".$limite_pagina.",".$results_pagina."";
            $filtro = addslashes($_POST['filtro']);

            $stmt = $dbc->prepare($sql);
            $stmt->bindValue(':filtro', '%' . $filtro . '%', PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;

        //Caso não haja nenhuma pesquisa: Exibe todos os livros
        } else if(!isset($_POST['filtro'])){
            //Conectando ao banco de dados e escolhendo os livros referentes a pagina
            $dbc = dbConnect();
            $sql = "SELECT * FROM livros ORDER BY nome LIMIT ".$limite_pagina.",".$results_pagina."";

            $stmt = $dbc->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;
        }
    }

    //Função para Exibir o Numero de Livros
    public function numeroLivros() {
        $dbc = dbConnect();
        $sql = "SELECT * FROM livros ORDER BY nome";

        $stmt = $dbc->prepare($sql);
        $stmt->execute();

        $count = $stmt->rowCount();

        return $count;
    }
}

?>