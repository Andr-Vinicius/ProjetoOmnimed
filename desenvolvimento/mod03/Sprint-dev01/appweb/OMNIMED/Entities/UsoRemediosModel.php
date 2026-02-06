<?php

    class UsoRemedios {
        
        private $id;
        private $finalidade;
        private $remedio;

        public function __construct() {
            $this->id = null;
            $this->finalidade = null;
            $this->remedio = null;
        }

        // Método mágico, utiliza-se como $dado = $classe->atributoDaClasse; por exemplo
        public function &__get( $name ) {
            return $this->$name;
        }

        // Método mágico, utiliza-se como $classe->atributoDaClasse = $valor; por exemplo
        public function __set( $name, $value ) {
            $this->$name = $value;
        }

    }

?>