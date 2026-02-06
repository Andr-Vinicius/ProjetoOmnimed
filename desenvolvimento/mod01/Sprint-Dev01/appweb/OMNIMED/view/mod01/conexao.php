<?php

$hostname = "localhost"; //se você estiver usando servidor local
$user = "127.0.0.1; // usuario root
$password = ""; // meu banco nao possui senha, então fica em branco
$database = "bd_mod01"; //adiciona o banco de dados 
$conexao = mysqli_connect($hostname,$user,$password,$database);

if (!$conexao){
    print "falha na conexao com o BD";
}

?>