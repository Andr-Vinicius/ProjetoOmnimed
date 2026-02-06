<?php

class ConexaoMod1{
    private $hostname;
    private $username;
    private $password;
    private $database;
    private $conn;

    public function __construct(){
        $this->hostname = "localhost"; //se você estiver usando servidor local
        $this->username = "root"; // usuario root
        $this->password = ""; // meu banco nao possui senha, então fica em branco
        $this->database = "omnimed"; //adiciona o banco de dados 
        $this->conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);


        try{
            $this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->database;", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }catch(PDOException $e){
            echo "ERRO: ".$e->getMessage(). "<br/>";
        }

        
    }

    public function getConexao(){
        return $this->conn;
    }



}

?>