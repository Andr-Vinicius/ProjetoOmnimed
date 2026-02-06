<?php

class PlanosMedicos {

    private $id;
    private $instituicao;
    private $nome;
    private $preco;

    public function __construct() {
        $this->id = null;
        $this->instituicao = null;
        $this->nome = null;
        $this->preco = null;
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