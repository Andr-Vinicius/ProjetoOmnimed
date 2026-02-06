<?php

    class Paciente{
        private $pac_id;
        private $pac_email;
        private $fk_usuario_comum;



        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $value){
            $this->$name = $value;
        }


    }



?>