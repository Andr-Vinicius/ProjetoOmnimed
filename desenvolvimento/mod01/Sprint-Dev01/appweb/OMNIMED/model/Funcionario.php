<?php

    class Funcionario{
        private $fun_id;
        private $fun_prontuario;
		private $fk_usuario_comum;

        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $value){
            $this->$name = $value;
        }


    }



?>