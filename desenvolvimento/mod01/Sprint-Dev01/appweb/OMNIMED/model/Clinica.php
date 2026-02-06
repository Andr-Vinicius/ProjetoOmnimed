<?php

    class Clinica{
        private $cli_id; 
        private $cli_razao;
        private $cli_data_fundacao; 
        private $cli_cnpj;
        private $cli_prontuario;
        private $cli_logradouro; 
        private $cli_numero; 
        private $cli_bairro; 
        private $cli_cidade; 
        private $cli_estado; 
        private $cli_contato1; 
        private $cli_contato2; 
        private $cli_fk_adm;

        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $value){
            $this->$name = $value;
        }


    }



?>