<?php

    class FinalidadesRemedios {
        
        private $id;
        private $descricao;

        public function __construct() {
            $this->id = null;
            $this->descricao = null;
        }

        // Método mágico, utiliza-se como $dado = $finalidade->descricao; por exemplo
        public function &__get( $name ) {
            return $this->$name;
        }


        // Método mágico, utiliza-se como $finalidade->descricao = $valor; por exemplo
        public function __set( $name, $value ) {
            $this->$name = $value;
        }

    }

?>