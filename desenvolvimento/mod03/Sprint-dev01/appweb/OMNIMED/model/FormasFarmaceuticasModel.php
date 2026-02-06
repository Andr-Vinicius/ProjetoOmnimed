<?php

    class FormasFarmaceuticas {
        
        private $id;
        private $descricao;

        public function __construct() {
            $this->id = null;
            $this->descricao = null;
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