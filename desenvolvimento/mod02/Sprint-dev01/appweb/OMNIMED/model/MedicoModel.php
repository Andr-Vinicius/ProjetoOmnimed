<?php

class Medico{

    private $med_id;
    private $med_nome;

    function &__get($atributo){
        return $this->$atributo;
    }

    function &__set($atributo, $valor){
        $this->$atributo = $valor;
    }
}

?>