<?php

    class ValoresDependentes {
        
        private $id;
        private $valor;
        private $idade_minima;
        private $idade_maxima;
        private $plano;

        public function __construct() {
            $this->id = null;
            $this->valor = null;
            $this->idade_minima = null;
            $this->idade_maxima = null;
            $this->plano = null;
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