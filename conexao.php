<?php

// Conexão com Banco de Dados

$hostname = "localhost";
$user = "root";
$password = "";
$database = "estagio";
$conexao = mysqli_connect($hostname, $user, $password, $database);

if(!$conexao) {
    print "Falha na conexão com o Banco de Dados.";
} else {}

?>