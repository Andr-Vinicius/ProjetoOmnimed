<?php

class Paciente{

    private $pac_id;
    private $pac_nome_completo;

    function &__get($atributo){
        return $this->$atributo;
    }

    function &__set($atributo, $valor){
        $this->$atributo = $valor;
    }
}

?>