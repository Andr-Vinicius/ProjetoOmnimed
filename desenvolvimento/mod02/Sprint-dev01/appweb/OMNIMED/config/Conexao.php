<?php

class Conexao{

    private $server;
    private $user;
    private $password;
    private $database;
    private $conn;

    public function __construct(){

        $this->server = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->database = "projeto";

        try{
            $this->conn = new PDO("mysql:host=$this->server;dbname=$this->database",$this->user,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo "ERRO:" . $e->getMessage() . "<br/>";
        }
        
    } 

    public function getConexao(){
        return $this->conn;
    }

}