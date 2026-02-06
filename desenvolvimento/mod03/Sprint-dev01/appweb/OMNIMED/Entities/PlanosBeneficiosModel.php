<?php

class PlanosBeneficios {

    private $id;
    private $beneficio;
    private $plano;
    private $valor;

    public function __construct() {
        $this->id = null;
        $this->beneficio = null;
        $this->plano = null;
        $this->valor = null;
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