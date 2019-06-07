<?php

//Função para conectar ao Banco de Dados
function dbConnect() {
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "estagio";

    try {
        $pdo = new PDO('mysql:host='.$hostname.';dbname='.$database.'', $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;

    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

//Encerra a Conecão com o Bando de Dados
function dbDisconnect() {
    $pdo = null;
    return $pdo;
}

//Função de conversão de data
function dateConvert($date){
    sscanf($date, '%d-%d-%d', $y, $m, $d);
    return sprintf('%02d/%02d/%04d', $d, $m, $y);
}

//Dados sobre: ID da Pagina | Atigos por Pagina | Limite de Paginas
function pagina(){
    //Sistema para começar na pagina 1
    if (!isset($_GET['page'])){
        $page = 1;
    } else{
        $page = $_GET['page'];
    }

    //Definindo o limite de Artigos/Pagina e N°/Paginas
    $results_pagina = 5;
    $limite_pagina = ($page - 1) * $results_pagina;

    return array($page, $results_pagina, $limite_pagina);
}

?>